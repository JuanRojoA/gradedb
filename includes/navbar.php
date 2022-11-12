<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand fs-3 fw-bolder" href="index.php">SRN</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
        <?php
        if (isset($_SESSION['id'])) {
        ?>
          <a class="nav-link" href="
          <?php if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == 'estudiante') {
              echo 'estudiante.php';
            } elseif ($_SESSION['role'] == 'profesor') {
              echo 'profesor.php';
            }
          } ?>
          ">Datos y Notas</a>
          <a class="nav-link" href="actions/logout.php">Cerrar Sesión</a>
        <?php } else { ?>
          <a class="nav-link" href="index.php">Inicio</a>
          <a class="nav-link" href="login.php">Iniciar Sesión</a>
          <a class="nav-link" href="signin.php">Registrarse</a>
        <?php } ?>
      </div>
    </div>
  </div>
</nav>