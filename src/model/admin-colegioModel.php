<?php
require_once "../library/conexion.php";

class ColegioModel
{

    private $conexion;
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }
    public function registrarInstitucion($beneficiario, $cod_modular, $ruc, $nombre)
    {
        $sql = $this->conexion->query("INSERT INTO institucion (beneficiario, cod_modular, ruc, nombre) VALUES ('$beneficiario','$cod_modular','$ruc','$nombre')");
        if ($sql) {
            $sql = $this->conexion->insert_id;
        } else {
            $sql = 0;
        }
        return $sql;
    }


    public function obtenerTodosLosColegios()
    {
        $arrRespuesta = array();

        $sql = $this->conexion->query("
        SELECT 
            c.codigo_modular, 
            c.nombre_ie, 
            c.departamento, 
            c.provincia, 
            c.distrito
        FROM centros_educativos c ORDER BY c.departamento ASC, c.provincia ASC, c.distrito ASC
    ");

        while ($objeto = $sql->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }

        return $arrRespuesta;
    }


    public function actualizarInstitucion($id, $beneficiario, $cod_modular, $ruc, $nombre)
    {
        $sql = $this->conexion->query("UPDATE institucion SET beneficiario= '$beneficiario', cod_modular='$cod_modular',ruc='$ruc',nombre='$nombre' WHERE id='$id'");
        return $sql;
    }
    public function buscarInstitucionOrdenado()
    {
        $sql = $this->conexion->query("SELECT * FROM institucion order by nombre ASC");
        $arrRespuesta = array();
        while ($objeto = $sql->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }
    public function buscarInstitucionById($id)
    {
        $sql = $this->conexion->query("SELECT * FROM institucion WHERE id='$id'");
        $sql = $sql->fetch_object();
        return $sql;
    }

    public function buscarInstitucionByCodigo($codigo)
    {
        $sql = $this->conexion->query("SELECT * FROM institucion WHERE cod_modular='$codigo'");
        $sql = $sql->fetch_object();
        return $sql;
    }
    public function buscarColegios_tabla_filtro($busqueda_tabla_codigo, $busqueda_tabla_nombre, $busqueda_tabla_departamento, $busqueda_tabla_provincia, $busqueda_tabla_distrito, $busqueda_tabla_nivel, $busqueda_tabla_atencion, $busqueda_tabla_gestion)
    {
        //condicionales para busqueda
        $condicion = "";
        $condicion .= " codigo_modular LIKE '$busqueda_tabla_codigo%' AND nombre_ie LIKE '$busqueda_tabla_nombre%' AND departamento LIKE '$busqueda_tabla_departamento%'AND provincia LIKE '$busqueda_tabla_provincia%'AND distrito LIKE '$busqueda_tabla_distrito%' AND detalle_nivel LIKE '$busqueda_tabla_nivel%' AND forma_atencion LIKE '$busqueda_tabla_atencion%' AND gestion LIKE '$busqueda_tabla_gestion%'";
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM centros_educativos WHERE $condicion ORDER BY departamento ASC, provincia ASC, distrito ASC, nombre_ie ASC");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }

    public function contarColegios_tabla_filtro($busqueda_tabla_codigo, $busqueda_tabla_nombre, $busqueda_tabla_departamento, $busqueda_tabla_provincia, $busqueda_tabla_distrito, $busqueda_tabla_nivel, $busqueda_tabla_atencion, $busqueda_tabla_gestion)
    {
        //condicionales para busqueda
        $condicion = "";
        $condicion .= " codigo_modular LIKE '$busqueda_tabla_codigo%' AND nombre_ie LIKE '$busqueda_tabla_nombre%' AND departamento LIKE '$busqueda_tabla_departamento%'AND provincia LIKE '$busqueda_tabla_provincia%'AND distrito LIKE '$busqueda_tabla_distrito%' AND detalle_nivel LIKE '$busqueda_tabla_nivel%' AND forma_atencion LIKE '$busqueda_tabla_atencion%' AND gestion LIKE '$busqueda_tabla_gestion%'";
        $sql = "SELECT COUNT(*) AS total FROM centros_educativos WHERE $condicion";
        $resultado = $this->conexion->query($sql);
        $fila = $resultado->fetch_object();

        return $fila->total;
    }


    public function buscarColegios_tabla($pagina, $cantidad_mostrar, $busqueda_tabla_codigo, $busqueda_tabla_nombre, $busqueda_tabla_departamento, $busqueda_tabla_provincia, $busqueda_tabla_distrito, $busqueda_tabla_nivel, $busqueda_tabla_atencion, $busqueda_tabla_gestion)
    {
        //condicionales para busqueda
        $condicion = "";
        $condicion .= " codigo_modular LIKE '$busqueda_tabla_codigo%' AND nombre_ie LIKE '$busqueda_tabla_nombre%' AND departamento LIKE '$busqueda_tabla_departamento%'AND provincia LIKE '$busqueda_tabla_provincia%'AND distrito LIKE '$busqueda_tabla_distrito%' AND detalle_nivel LIKE '$busqueda_tabla_nivel%' AND forma_atencion LIKE '$busqueda_tabla_atencion%' AND gestion LIKE '$busqueda_tabla_gestion%'";
        $iniciar = ($pagina - 1) * $cantidad_mostrar;
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM centros_educativos WHERE $condicion ORDER BY departamento ASC, provincia ASC, distrito ASC, nombre_ie ASC LIMIT $iniciar, $cantidad_mostrar");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }
    public function buscarColegioByCodigoRuc($codigo_modular, $ruc)
    {
        // Consulta para verificar si ya existe un colegio con el mismo código modular o RUC
        $sql = $this->conexion->query("SELECT * FROM centros_educativos WHERE codigo_modular = '$codigo_modular' OR ruc = '$ruc' LIMIT 1");

        if ($sql->num_rows > 0) {
            $resultado = $sql->fetch_object();
        } else {
            $resultado = null;
        }
        return $resultado;
    }


    public function registrarColegio(
        $codigo_modular,
        $nombre_ie,
        $nivel_modalidad,
        $detalle_nivel,
        $forma_atencion,
        $genero_alumnos,
        $gestion,
        $dependencia,
        $director,
        $telefono,
        $direccion_local,
        $localidad,
        $centro_poblado,
        $area_censo,
        $departamento,
        $provincia,
        $distrito,
        $region,
        $ugel,
        $turno,
        $ruc,
        $razon_social,
        $estado,
        $total_secciones
    ) {
        $sql = "INSERT INTO centros_educativos (
                codigo_modular,
                nombre_ie,
                nivel_modalidad,
                detalle_nivel,
                forma_atencion,
                genero_alumnos,
                gestion,
                dependencia,
                director,
                telefono,
                direccion_local,
                localidad,
                centro_poblado,
                area_censo,
                departamento,
                provincia,
                distrito,
                region,
                ugel,
                turno,
                ruc,
                razon_social,
                estado,
                total_secciones
            ) VALUES (
                '$codigo_modular',
                '$nombre_ie',
                '$nivel_modalidad',
                '$detalle_nivel',
                '$forma_atencion',
                '$genero_alumnos',
                '$gestion',
                '$dependencia',
                '$director',
                '$telefono',
                '$direccion_local',
                '$localidad',
                '$centro_poblado',
                '$area_censo',
                '$departamento',
                '$provincia',
                '$distrito',
                '$region',
                '$ugel',
                '$turno',
                '$ruc',
                '$razon_social',
                '$estado',
                '$total_secciones'
            )";

        $resultado = $this->conexion->query($sql);

        if ($resultado) {
            return $codigo_modular; // ya no hay id autoincremental
        } else {
            return 0;
        }
    }



    public function buscarColegioByCodigo($codigo_modular)
    {
        $sql = $this->conexion->query("SELECT * FROM centros_educativos WHERE codigo_modular = '$codigo_modular' LIMIT 1");
        $resultado = $sql ? $sql->fetch_object() : null;
        return $resultado;
    }


    public function actualizarColegio(
        $codigo_modular,
        $nombre_ie,
        $nivel_modalidad,
        $detalle_nivel,
        $forma_atencion,
        $genero_alumnos,
        $gestion,
        $dependencia,
        $director,
        $telefono,
        $direccion_local,
        $localidad,
        $centro_poblado,
        $area_censo,
        $departamento,
        $provincia,
        $distrito,
        $region,
        $ugel,
        $turno,
        $ruc,
        $razon_social,
        $estado,
        $total_secciones
    ) {
        $sql = "UPDATE centros_educativos SET
                nombre_ie        = '$nombre_ie',
                nivel_modalidad  = '$nivel_modalidad',
                detalle_nivel    = '$detalle_nivel',
                forma_atencion   = '$forma_atencion',
                genero_alumnos   = '$genero_alumnos',
                gestion          = '$gestion',
                dependencia      = '$dependencia',
                director         = '$director',
                telefono         = '$telefono',
                direccion_local  = '$direccion_local',
                localidad        = '$localidad',
                centro_poblado   = '$centro_poblado',
                area_censo       = '$area_censo',
                departamento     = '$departamento',
                provincia        = '$provincia',
                distrito         = '$distrito',
                region           = '$region',
                ugel             = '$ugel',
                turno            = '$turno',
                ruc              = '$ruc',
                razon_social     = '$razon_social',
                estado           = '$estado',
                total_secciones  = '$total_secciones'
            WHERE codigo_modular = '$codigo_modular'";

        $resultado = $this->conexion->query($sql);
        return $resultado;
    }
}
