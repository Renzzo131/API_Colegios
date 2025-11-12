<?php
require_once "../library/conexion.php";

class ApiModel
{

    private $conexion;
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }
    public function registrarCliente($ruc, $razon_social, $correo, $telefono)
    {
        $sql = $this->conexion->query("INSERT INTO client_api (ruc, razon_social, telefono, correo) VALUES ('$ruc','$razon_social','$telefono','$correo')");
        if ($sql) {
            $sql = $this->conexion->insert_id;
        } else {
            $sql = 0;
        }
        return $sql;
    }
    public function registrarToken($cliente, $token_final, $estado)
    {
        $sql = $this->conexion->query("INSERT INTO tokens (id_cliente, token,estado) VALUES ('$cliente','$token_final','$estado')");
        if ($sql) {
            $sql = $this->conexion->insert_id;
        } else {
            $sql = 0;
        }
        return $sql;
    }
    public function buscarClientes()
    {
        $arrRespuesta = array();
        $sql = $this->conexion->query("SELECT * FROM client_api");
        while ($objeto = $sql->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }
    public function buscarClienteByRuc($ruc)
    {
        $sql = $this->conexion->query("SELECT * FROM client_api WHERE ruc='$ruc'");
        $sql = $sql->fetch_object();
        return $sql;
    }
    public function buscarClienteById($id)
    {
        $sql = $this->conexion->query("SELECT * FROM client_api WHERE id='$id'");
        $sql = $sql->fetch_object();
        return $sql;
    }
    public function actualizarCliente($id, $ruc, $razon_social, $correo, $telefono, $estado)
    {
        $sql = $this->conexion->query("UPDATE client_api SET ruc='$ruc',razon_social='$razon_social',correo='$correo',telefono='$telefono',estado ='$estado' WHERE id='$id'");
        return $sql;
    }
    public function actualizarToken($id, $estado)
    {
        $sql = $this->conexion->query("UPDATE tokens SET estado ='$estado' WHERE id='$id'");
        return $sql;
    }
    public function buscarClientesOrderByApellidosNombres_tabla_filtro($busqueda_tabla_ruc, $busqueda_tabla_razon, $busqueda_tabla_estado)
    {
        //condicionales para busqueda
        $condicion = "";
        $condicion .= " ruc LIKE '$busqueda_tabla_ruc%' AND razon_social LIKE '$busqueda_tabla_razon%'";
        if ($busqueda_tabla_estado != '') {
            $condicion .= " AND estado = '$busqueda_tabla_estado'";
        }
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM client_api WHERE $condicion ORDER BY razon_social");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }
    public function buscarClientesOrderByApellidosNombres_tabla($pagina, $cantidad_mostrar, $busqueda_tabla_ruc, $busqueda_tabla_razon, $busqueda_tabla_estado)
    {
        //condicionales para busqueda
        $condicion = "";
        $condicion .= " ruc LIKE '$busqueda_tabla_ruc%' AND razon_social LIKE '$busqueda_tabla_razon%'";
        if ($busqueda_tabla_estado != '') {
            $condicion .= " AND estado = '$busqueda_tabla_estado'";
        }
        $iniciar = ($pagina - 1) * $cantidad_mostrar;
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM client_api WHERE $condicion ORDER BY razon_social LIMIT $iniciar, $cantidad_mostrar");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }

    public function buscarTokensOrderByfecha_tabla_filtro($busqueda_tabla_cliente, $busqueda_tabla_estado)
    {
        //condicionales para busqueda
        $condicion = "";
        if ($busqueda_tabla_cliente != '') {
            $condicion .= " id_cliente ='$busqueda_tabla_cliente'";
        }
        if ($busqueda_tabla_estado != '' && $condicion != '') {
            $condicion .= " AND estado = '$busqueda_tabla_estado'";
        } else {
            $condicion .= " estado = '$busqueda_tabla_estado'";
        }
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM tokens WHERE $condicion ORDER BY fecha_registro DESC");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }
    public function buscarTokensOrderByfecha_tabla($pagina, $cantidad_mostrar, $busqueda_tabla_cliente, $busqueda_tabla_estado)
    {
        //condicionales para busqueda
        $condicion = "";
        if ($busqueda_tabla_cliente != '') {
            $condicion .= " id_cliente ='$busqueda_tabla_cliente'";
        }
        if ($busqueda_tabla_estado != '' && $condicion != '') {
            $condicion .= " AND estado = '$busqueda_tabla_estado'";
        } else {
            $condicion .= " estado = '$busqueda_tabla_estado'";
        }
        $iniciar = ($pagina - 1) * $cantidad_mostrar;
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM tokens WHERE $condicion ORDER BY fecha_registro DESC LIMIT $iniciar, $cantidad_mostrar");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }

    public function buscarColegioByDistrito($data)
    {
        $arrRespuesta = array();
        $sql = $this->conexion->query("SELECT * FROM centros_educativos WHERE distrito LIKE '%$data%'");
        while ($objeto = $sql->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }

    public function buscarTokenActivo($token)
    {
        $sql = $this->conexion->query("SELECT * FROM tokens WHERE token='$token' AND estado=1");
        $sql = $sql->fetch_object();
        return $sql;
    }

    public function obtenerTokenPorCliente($id)
    {
        $sql = $this->conexion->query("SELECT token FROM tokens WHERE id_cliente = '$id' AND estado = 1 ORDER BY fecha_registro DESC LIMIT 1");
        if ($sql && $row = $sql->fetch_assoc()) {
            return $row['token'];
        }
        return null;
    }
}
