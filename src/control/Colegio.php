<?php
session_start();
require_once('../model/admin-sesionModel.php');
require_once('../model/admin-colegioModel.php');
require_once('../model/admin-usuarioModel.php');
require_once('../model/adminModel.php');
$tipo = $_GET['tipo'];

//instanciar la clase categoria model
$objSesion = new SessionModel();
$objColegio = new ColegioModel();
$objUsuario = new UsuarioModel();

//variables de sesion
$id_sesion = $_REQUEST['sesion'];
$token = $_REQUEST['token'];

if ($tipo == "listar_colegios") {
    $arr_Respuesta = array('status' => false, 'msg' => 'Error_Sesion');
    if ($objSesion->verificar_sesion_si_activa($id_sesion, $token)) {
        //print_r($_POST);
        $pagina = $_POST['pagina'];
        $cantidad_mostrar = $_POST['cantidad_mostrar'];
        $busqueda_tabla_codigo = $_POST['busqueda_tabla_codigo'];
        $busqueda_tabla_nombre = $_POST['busqueda_tabla_nombre'];
        $busqueda_tabla_departamento = $_POST['busqueda_tabla_departamento'];
        $busqueda_tabla_provincia = $_POST['busqueda_tabla_provincia'];
        $busqueda_tabla_distrito = $_POST['busqueda_tabla_distrito'];
        $busqueda_tabla_nivel = $_POST['busqueda_tabla_nivel'];
        $busqueda_tabla_atencion = $_POST['busqueda_tabla_atencion'];
        $busqueda_tabla_gestion = $_POST['busqueda_tabla_gestion'];
        //repuesta
        $arr_Respuesta = array('status' => false, 'contenido' => '');
        $busqueda_filtro = $objColegio->buscarColegios_tabla_filtro($busqueda_tabla_codigo, $busqueda_tabla_nombre, $busqueda_tabla_departamento, $busqueda_tabla_provincia, $busqueda_tabla_distrito, $busqueda_tabla_nivel, $busqueda_tabla_atencion, $busqueda_tabla_gestion);
        $total_filtro = $objColegio->contarColegios_tabla_filtro($busqueda_tabla_codigo, $busqueda_tabla_nombre, $busqueda_tabla_departamento, $busqueda_tabla_provincia, $busqueda_tabla_distrito, $busqueda_tabla_nivel, $busqueda_tabla_atencion, $busqueda_tabla_gestion);
        $arr_Colegio = $objColegio->buscarColegios_tabla($pagina, $cantidad_mostrar, $busqueda_tabla_codigo,  $busqueda_tabla_nombre, $busqueda_tabla_departamento, $busqueda_tabla_provincia, $busqueda_tabla_distrito, $busqueda_tabla_nivel, $busqueda_tabla_atencion, $busqueda_tabla_gestion);

        $arr_contenido = [];
        if (!empty($arr_Colegio)) {
            // recorremos el array para agregar las opciones de las categorias
            for ($i = 0; $i < count($arr_Colegio); $i++) {
                // definimos el elemento como objeto
                $arr_contenido[$i] = (object) [];
                // agregamos solo la informacion que se desea enviar a la vistaz
                $arr_contenido[$i]->codigo_modular   = $arr_Colegio[$i]->codigo_modular;
                $arr_contenido[$i]->nombre_ie        = $arr_Colegio[$i]->nombre_ie;
                $arr_contenido[$i]->nivel_modalidad  = $arr_Colegio[$i]->nivel_modalidad;
                $arr_contenido[$i]->detalle_nivel    = $arr_Colegio[$i]->detalle_nivel;
                $arr_contenido[$i]->forma_atencion   = $arr_Colegio[$i]->forma_atencion;
                $arr_contenido[$i]->genero_alumnos   = $arr_Colegio[$i]->genero_alumnos;
                $arr_contenido[$i]->gestion          = $arr_Colegio[$i]->gestion;
                $arr_contenido[$i]->dependencia      = $arr_Colegio[$i]->dependencia;
                $arr_contenido[$i]->director         = $arr_Colegio[$i]->director;
                $arr_contenido[$i]->telefono         = $arr_Colegio[$i]->telefono;
                $arr_contenido[$i]->direccion_local  = $arr_Colegio[$i]->direccion_local;
                $arr_contenido[$i]->localidad        = $arr_Colegio[$i]->localidad;
                $arr_contenido[$i]->centro_poblado   = $arr_Colegio[$i]->centro_poblado;
                $arr_contenido[$i]->area_censo       = $arr_Colegio[$i]->area_censo;
                $arr_contenido[$i]->departamento     = $arr_Colegio[$i]->departamento;
                $arr_contenido[$i]->provincia        = $arr_Colegio[$i]->provincia;
                $arr_contenido[$i]->distrito         = $arr_Colegio[$i]->distrito;
                $arr_contenido[$i]->region           = $arr_Colegio[$i]->region;
                $arr_contenido[$i]->ugel             = $arr_Colegio[$i]->ugel;
                $arr_contenido[$i]->turno            = $arr_Colegio[$i]->turno;
                $arr_contenido[$i]->ruc              = $arr_Colegio[$i]->ruc;
                $arr_contenido[$i]->razon_social     = $arr_Colegio[$i]->razon_social;
                $arr_contenido[$i]->estado           = $arr_Colegio[$i]->estado;
                $arr_contenido[$i]->total_secciones  = $arr_Colegio[$i]->total_secciones;

                $opciones = '<button type="button" title="Editar" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".modal_editar' . $arr_Colegio[$i]->codigo_modular . '"><i class="fa fa-edit"></i></button>';
                $arr_contenido[$i]->options = $opciones;
            }
            $arr_Respuesta['total'] = $total_filtro;
            $arr_Respuesta['status'] = true;
            $arr_Respuesta['contenido'] = $arr_contenido;
        }
    }
    echo json_encode($arr_Respuesta);
}


if ($tipo == "registrar") {
    $arr_Respuesta = array('status' => false, 'msg' => 'Error_Sesion');

    if ($objSesion->verificar_sesion_si_activa($id_sesion, $token)) {

        if ($_POST) {
            // Capturar variables del formulario
            $codigo_modular = $_POST['codigo_modular'];
            $nombre_ie = $_POST['nombre_ie'];
            $nivel_modalidad = $_POST['nivel_modalidad'];
            $detalle_nivel = $_POST['detalle_nivel'];
            $forma_atencion = $_POST['forma_atencion'];
            $genero_alumnos = $_POST['genero_alumnos'];
            $gestion = $_POST['gestion'];
            $dependencia = $_POST['dependencia'];
            $director = $_POST['director'];
            $telefono = $_POST['telefono'];
            $direccion_local = $_POST['direccion_local'];
            $localidad = $_POST['localidad'];
            $centro_poblado = $_POST['centro_poblado'];
            $area_censo = $_POST['area_censo'];
            $departamento = $_POST['departamento'];
            $provincia = $_POST['provincia'];
            $distrito = $_POST['distrito'];
            $region = $_POST['region'];
            $ugel = $_POST['ugel'];
            $turno = $_POST['turno'];
            $ruc = $_POST['ruc'];
            $razon_social = $_POST['razon_social'];
            $estado = $_POST['estado'];
            $total_secciones = $_POST['total_secciones'];

            // Validar campos obligatorios
            if (
                $codigo_modular == "" || $nombre_ie == "" || $nivel_modalidad == "" ||
                $detalle_nivel == "" || $forma_atencion == "" || $genero_alumnos == "" ||
                $gestion == "" || $dependencia == "" || $director == "" || $telefono == "" ||
                $direccion_local == "" || $localidad == "" || $centro_poblado == "" ||
                $departamento == "" || $provincia == "" || $distrito == "" ||
                $region == "" || $ugel == "" || $ruc == "" || $razon_social == ""
            ) {
                $arr_Respuesta = array('status' => false, 'mensaje' => 'Error, campos vacíos');
            } else {
                // Verificar si el colegio ya existe por su código modular o RUC
                $arr_Colegio = $objColegio->buscarColegioByCodigoRuc($codigo_modular, $ruc);

                if ($arr_Colegio) {
                    $arr_Respuesta = array('status' => false, 'mensaje' => 'Registro fallido, el centro educativo ya se encuentra registrado');
                } else {
                    // Registrar nuevo colegio
                    $registrado = $objColegio->registrarColegio(
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
                    );

                    if ($registrado) {
                        $arr_Respuesta = array('status' => true, 'mensaje' => 'Registro Exitoso');
                    } else {
                        $arr_Respuesta = array('status' => false, 'mensaje' => 'Error al registrar el centro educativo');
                    }
                }
            }
        }
    }

    echo json_encode($arr_Respuesta);
}


if ($tipo == "actualizar") {
    $arr_Respuesta = array('status' => false, 'msg' => 'Error_Sesion');

    if ($objSesion->verificar_sesion_si_activa($id_sesion, $token)) {
        if ($_POST) {
            // Datos enviados desde el formulario
            $codigo_modular   = $_POST['codigo_modular'];
            $nombre_ie        = $_POST['nombre_ie'];
            $nivel_modalidad  = $_POST['nivel_modalidad'];
            $detalle_nivel    = $_POST['detalle_nivel'];
            $forma_atencion   = $_POST['forma_atencion'];
            $genero_alumnos   = $_POST['genero_alumnos'];
            $gestion          = $_POST['gestion'];
            $dependencia      = $_POST['dependencia'];
            $director         = $_POST['director'];
            $telefono         = $_POST['telefono'];
            $direccion_local  = $_POST['direccion_local'];
            $localidad        = $_POST['localidad'];
            $centro_poblado   = $_POST['centro_poblado'];
            $area_censo       = $_POST['area_censo'];
            $departamento     = $_POST['departamento'];
            $provincia        = $_POST['provincia'];
            $distrito         = $_POST['distrito'];
            $region           = $_POST['region'];
            $ugel             = $_POST['ugel'];
            $turno            = $_POST['turno'];
            $ruc              = $_POST['ruc'];
            $razon_social     = $_POST['razon_social'];
            $estado           = $_POST['estado'];
            $total_secciones  = $_POST['total_secciones'];

            // Validación básica de campos vacíos
            if (
                $codigo_modular == "" || $nombre_ie == "" || $departamento == "" ||
                $provincia == "" || $distrito == "" || $director == ""
            ) {
                $arr_Respuesta = array('status' => false, 'mensaje' => 'Error, hay campos obligatorios vacíos');
            } else {
                // Buscar si el colegio existe
                $colegio = $objColegio->buscarColegioByCodigo($codigo_modular);

                if (!$colegio) {
                    $arr_Respuesta = array('status' => false, 'mensaje' => 'Colegio no encontrado');
                } else {
                    // Actualizar registro
                    $consulta = $objColegio->actualizarColegio(
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
                    );

                    if ($consulta) {
                        $arr_Respuesta = array('status' => true, 'mensaje' => 'Centro Educativo actualizado correctamente');
                    } else {
                        $arr_Respuesta = array('status' => false, 'mensaje' => 'Error al actualizar el registro');
                    }
                }
            }
        }
    }

    echo json_encode($arr_Respuesta);
}
