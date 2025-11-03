<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Arial', sans-serif;
      min-height: 100vh;
      display: flex;
      background: url('<?php echo BASE_URL ?>src/view/include/ninos.png') no-repeat center center;
      background-size: cover;
      position: relative;
    }

    body::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(255, 255, 255, 0.1);
    }

    .header-bar {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      background: white;
      padding: 15px 30px;
      display: flex;
      align-items: center;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      z-index: 10;
    }

    .header-bar img {
      height: 60px;
      margin-right: 20px;
    }

    .header-titles {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .header-titles h2 {
      font-size: 1.3rem;
      color: #333;
      font-weight: bold;
    }

    .sigof-title {
      background: linear-gradient(135deg, #D91F5A, #E94A7A);
      color: white;
      padding: 20px 40px;
      border-radius: 0 0 20px 20px;
      box-shadow: 0 4px 10px rgba(217, 31, 90, 0.3);
      min-width: 500px;
    }

    .sigof-title h1 {
      font-size: 1.5rem;
      margin-bottom: 5px;
      font-weight: normal;
    }

    .sigof-title .sigof-text {
      font-size: 3rem;
      font-weight: bold;
      text-align: right;
      letter-spacing: 2px;
    }

    .login-container {
      position: absolute;
      right: 100px;
      top: 50%;
      transform: translateY(-50%);
      background: white;
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      width: 350px;
      z-index: 5;
    }

    .login-container .logo {
      text-align: center;
      margin-bottom: 20px;
    }

    .login-container .logo img {
      max-width: 200px;
      height: auto;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      color: #333;
      font-size: 0.9rem;
      margin-bottom: 5px;
      font-weight: 600;
    }

    .form-group input {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 1rem;
      outline: none;
      transition: border-color 0.3s;
    }

    .form-group input:focus {
      border-color: #D91F5A;
    }

    .captcha-box {
      background: #f5f5f5;
      padding: 10px;
      border-radius: 5px;
      text-align: center;
      margin-bottom: 15px;
      min-height: 50px;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 1px solid #ddd;
    }

    .captcha-box img {
      max-width: 100%;
      height: auto;
    }

    .btn-container {
      display: flex;
      gap: 10px;
      margin-top: 20px;
    }

    .btn {
      flex: 1;
      padding: 12px;
      border: none;
      border-radius: 5px;
      font-size: 1rem;
      cursor: pointer;
      transition: all 0.3s;
      font-weight: 600;
    }

    .btn-login {
      background: #D91F5A;
      color: white;
    }

    .btn-login:hover {
      background: #B91849;
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(217, 31, 90, 0.3);
    }

    .btn-recover {
      background: #f0f0f0;
      color: #666;
    }

    .btn-recover:hover {
      background: #e0e0e0;
    }

    @media (max-width: 1200px) {
      .login-container {
        right: 50px;
      }
    }

    @media (max-width: 768px) {
      .header-bar {
        flex-direction: column;
        padding: 10px;
      }

      .header-titles {
        flex-direction: column;
        gap: 10px;
        text-align: center;
      }

      .sigof-title {
        min-width: auto;
        width: 100%;
      }

      .login-container {
        position: relative;
        right: auto;
        top: auto;
        transform: none;
        margin: 150px auto 50px;
        width: 90%;
        max-width: 350px;
      }
    }
  </style>
  <!-- Sweet Alerts css -->
  <link href="<?php echo BASE_URL ?>src/view/pp/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
  <script>
    const base_url = '<?php echo BASE_URL; ?>';
    const base_url_server = '<?php echo BASE_URL_SERVER; ?>';
  </script>
</head>

<body>
  <div class="header-bar">
    <img src="<?php echo BASE_URL ?>src/view/include/logo.png" alt="Logo IES">
    <div class="header-titles">
      <h3>SISTEMA DE ADMINISTRACIÓN DE COLEGIOS DEL PERÚ</h3>
    </div>
  </div>

  <div class="login-container">    
    <form id="frm_login">
      <div class="form-group">
        <label for="dni">Usuario:</label>
        <input type="text" name="dni" id="dni" placeholder="Ingrese su DNI" required>
      </div>

      <div class="form-group">
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" placeholder="Ingrese su contraseña" required>
      </div>

      <div class="btn-container">
        <button type="submit" class="btn btn-login">Ingresar</button>
        <button type="button" class="btn btn-recover">Recuperar contraseña</button>
      </div>
    </form>
  </div>
</body>

<script src="<?php echo BASE_URL; ?>src/view/js/sesion.js"></script>
<!-- Sweet Alerts Js-->
<script src="<?php echo BASE_URL ?>src/view/pp/plugins/sweetalert2/sweetalert2.min.js"></script>

</html>