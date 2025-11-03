<!-- start page title -->
<div class="container mt-4 position-relative" style="min-height: 80vh;">
  <div class="row align-items-center">
    <!-- Imagen a la izquierda -->
    <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
      <img src="https://cdn-icons-png.flaticon.com/512/9070/9070269.png" 
           alt="Administrador de colegios del Perú"
           class="img-fluid rounded-4 shadow-sm" 
           style="max-width: 400px;">
    </div>

    <!-- Texto a la derecha -->
    <div class="col-md-6">
      <h2 class="fw-bold mb-3 text-primary">Sistema Administrador de Colegios del Perú</h2>
      <p class="text-muted mb-4">
        Bienvenido al panel principal del sistema. Aquí podrás gestionar usuarios, centros educativos, 
        clientes y tokens del API, además de realizar pruebas de conexión con las peticiones 
        integradas al servicio. Este panel sirve como punto de control general para el manejo del sistema.
      </p>

      <h5 class="fw-semibold mb-3 text-secondary">📘 Módulos del API:</h5>
      <ul class="list-unstyled mb-4">
        <li>✅ <strong>Usuarios del sistema</strong> – Administración y permisos.</li>
        <li>🏫 <strong>Centros educativos</strong> – Registro y control de instituciones.</li>
        <li>🔑 <strong>Clientes del API</strong> – Aplicaciones registradas.</li>
        <li>🧩 <strong>Tokens del API</strong> – Autenticación segura.</li>
        <li>🧪 <strong>API Request</strong> – Pruebas y validación de endpoints.</li>
      </ul>
    </div>
  </div>

  <!-- Botones distribuidos con separación -->
  <div class="d-flex justify-content-around flex-wrap mt-5 mb-2 border-top pt-4" style="gap: 1rem;">
    <a href="<?php echo BASE_URL; ?>usuarios" class="btn btn-primary text-center py-3 px-4 fw-semibold shadow-sm flex-grow-1 mx-2">
      <i class="mdi mdi-account-group"></i> Usuarios
    </a>
    <a href="<?php echo BASE_URL; ?>colegios" class="btn btn-success text-center py-3 px-4 fw-semibold shadow-sm flex-grow-1 mx-2">
      <i class="mdi mdi-domain"></i> Centros Educativos
    </a>
    <a href="<?php echo BASE_URL; ?>api-client" class="btn btn-info text-white text-center py-3 px-4 fw-semibold shadow-sm flex-grow-1 mx-2">
      <i class="mdi mdi-application"></i> Clientes API
    </a>
    <a href="<?php echo BASE_URL; ?>api-token" class="btn btn-warning text-dark text-center py-3 px-4 fw-semibold shadow-sm flex-grow-1 mx-2">
      <i class="mdi mdi-key-variant"></i> Tokens API
    </a>
    <a href="<?php echo BASE_URL; ?>api-request" class="btn btn-dark text-center py-3 px-4 fw-semibold shadow-sm flex-grow-1 mx-2">
      <i class="mdi mdi-rocket-launch"></i> API Request
    </a>
  </div>
</div>
<!-- end page title -->
