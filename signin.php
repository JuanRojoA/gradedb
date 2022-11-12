<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <title>Registrarse | Sistema de registro de notas</title>
</head>

<body>
  <?php include './includes/navbar.php'; ?>

  <main class="container my-5">
    <div class="row">
      <div class="col">
        <h1>Nuevo registro de usuario</h1>
      </div>
    </div>

    <div class="row my-2">
      <div class="col">
        <form action="./actions/signinsql.php" method="POST" class="row g-3" autocomplete="off">

          <h2>Datos basicos</h2>

          <div class="col-md-6">
            <label for="id" class="form-label">Documento de identidad</label>
            <input type="number" id="id-input" name="id" class="form-control" required autofocus>
          </div>

          <div class="col-md-6">
            <label for="name" class="form-label">Nombre(s)</label>
            <input type="text" id="name-input" name="name" class="form-control" required>
          </div>

          <div class="col-md-6">
            <label for="surname" class="form-label">Apellido(s)</label>
            <input type="text" id="surname-input" name="surname" class="form-control" required>
          </div>

          <div class="col-md-6">
            <label for="email" class="form-label">Correo Electronico</label>
            <input type="email" id="email-input" name="email" class="form-control" required>
          </div>

          <div class="col-md-6">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" id="password-input" name="password" class="form-control" required>
          </div>

          <div class="col-md-6">
            <label for="phone" class="form-label">Número de celular</label>
            <input type="number" id="phone-input" name="phone" class="form-control" required>
          </div>

          <div class="col-md-6">
            <label for="address" class="form-label">Dirección</label>
            <input type="text" id="address-input" name="address" class="form-control" required>
          </div>

          <div class="col-md-6">
            <p>Seleccione el tipo de usuario a registrar</p>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="tipoUsuario" id="radio1" value="profesor">
              <label class="form-check-label" for="radio1">
                Profesor
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="tipoUsuario" id="radio2" value="estudiante">
              <label class="form-check-label" for="radio2">
                Estudiante
              </label>
            </div>
          </div>

          <div class="col-md-12">
            <a href="index.php" class="btn btn-primary">Regresar</a>
            <button type="submit" class="btn btn-success">Registrarse</button>
          </div>
        </form>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>