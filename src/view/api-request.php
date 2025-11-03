<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <label for="ruta_api" class="form-label mt-3">Ruta API:</label>
    <input type="text" class="col-12 form-control" id="ruta_api" value="https://apicolegios.serviciosvirtuales.com.pe/">
    <form action="" id="frmApi">
        <label for="token" class="form-label mt-3">Token:</label>
        <input type="text" class="col-5 form-control" value="41aaebfb74a990aa5e7d1bb49bae390f-20251102-1" name="token" id="token">
        <label for="data" class="form-label mt-3">Ingrese Distrito</label>
        <input type="text" class="col-5 form-control" name="data" id="data">
        <br>
    </form>
    <button id="btn_buscar" class="btn btn-warning" onclick="llamar_api();">Buscar</button>
    <br><br>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>Nro</th>
                <th>Codigo Modular</th>
                <th>Nombre</th>
                <th>Departamento</th>
                <th>Provincia</th>
                <th>Distrito</th>
            </tr>
        </thead>
        <tbody id="contenido">

        </tbody>
    </table>
</body>
<script src="<?php echo BASE_URL; ?>src/view/js/api.js"></script>

</html>