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

if ($tipo == "verColegioApiByDistrito") {
    $token_arr = explode("-", $token);
    $id_cliente = $token_arr[2];

    // Verificar si el token pertenece al cliente y está activo
    $tokenValido = $objApi->verificarTokenActivoPorCliente($token, $id_cliente);

    if ($tokenValido) {
        // Verificar que el cliente también esté activo
        $arr_Cliente = $objApi->buscarClienteById($id_cliente);
        if ($arr_Cliente && $arr_Cliente->estado == 1) {
            $data = $_POST['data'];
            $arr_colegios = $objApi->buscarColegioByDistrito($data);
            $arr_Respuesta = array('status' => true, 'msg' => '', 'contenido' => $arr_colegios);
        } else {
            $arr_Respuesta = array('status' => false, 'msg' => 'Cliente no activo.');
        }
    } else {
        $arr_Respuesta = array('status' => false, 'msg' => 'Token inválido o inactivo.');
    }

    echo json_encode($arr_Respuesta);
}

