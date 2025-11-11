<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

require_once('../model/admin-apiModel.php');
require_once('../model/admin-sesionModel.php');
require_once('../model/admin-usuarioModel.php');
require_once('../model/adminModel.php');
$tipo = $_GET['tipo'];

//instanciar la clase categoria model
$objApi = new ApiModel();
$objSesion = new SessionModel();
$objUsuario = new UsuarioModel();
$objAdmin = new AdminModel();

//variables de sesion
$token = $_POST['token'];
$tipo = $_POST['tipo'] ?? null;

if ($tipo == "verColegioApiByDistrito") {

    // Verificar si llegó el token
    if (empty($token)) {
        echo json_encode(['status' => false, 'msg' => 'Token no proporcionado.']);
        exit;
    }

    // Buscar token en la base de datos
    $arr_Token = $objApi->buscarTokenActivo($token);

    // Si no existe o no está activo
    if (!$arr_Token) {
        echo json_encode(['status' => false, 'msg' => 'Token inválido o inactivo.']);
        exit;
    }

    // (Opcional) Verificar si el token ha expirado
    $fechaActual = date('Y-m-d H:i:s');
    if (!empty($arr_Token->fecha_fin) && $fechaActual > $arr_Token->fecha_fin) {
        echo json_encode(['status' => false, 'msg' => 'El token ha expirado.']);
        exit;
    }

    // Verificar que el cliente esté activo
    $id_cliente = $arr_Token->id_cliente;
    $arr_Cliente = $objApi->buscarClienteById($id_cliente);

    if (!$arr_Cliente || !$arr_Cliente->estado) {
        echo json_encode(['status' => false, 'msg' => 'Cliente no activo.']);
        exit;
    }

    // Ejecutar la búsqueda si todo está correcto
    $data = $_POST['data'] ?? null;
    $arr_bienes = $objApi->buscarColegioByDistrito($data);

    $arr_Respuesta = [
        'status' => true,
        'msg' => '',
        'contenido' => $arr_bienes
    ];

    echo json_encode($arr_Respuesta);
}

