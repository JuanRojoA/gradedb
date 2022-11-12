<?php

require './config/database.php';
$db = new Database();
$con = $db->connection();

session_start();
$teacherID = $_SESSION['id'];

$query1 = $con->prepare("SELECT * FROM estudiantes");
$query1->execute();

$rowStudent = $query1->fetchAll(PDO::FETCH_ASSOC);

$query2 = $con->prepare("SELECT * FROM profesores WHERE cedula=?");
$query2->execute([$teacherID]);

$rowTeacher = $query2->fetch(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>

  <!-- Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalTitle">Editar Notas Estudiantes</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <?php include './includes/navbar.php' ?>

  <main>
    <div class="container-fluid my-5 ">
      <div class="row">
        <div class="col-md-6 col-lg-8">
          <table class="table table-striped ">
            <thead>
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Nota 1</th>
                <th scope="col">Nota 2</th>
                <th scope="col">Nota 3</th>
                <th scope="col">Promedio</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($rowStudent as $item) : ?>
                <tr>
                  <td><?php echo $item['nombre'] ?></td>
                  <td><?php echo $item['apellido'] ?></td>
                  <td><?php echo $item['nota1'] ?></td>
                  <td><?php echo $item['nota2'] ?></td>
                  <td><?php echo $item['nota3'] ?></td>
                  <th><?php echo $item['promedio'] ?></th>
                  <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal">
                      Editar
                    </button>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="container">
            <h1 class="fw-bold fs-2 mb-3 border-bottom pb-3">Datos del docente</h1>
            <form action="./actions/signinsql.php?cod=<?php echo $rowTeacher['cedula'] ?>&user=profesor" method="POST" class="row g-3" autocomplete="off" class="row">

              <h2 class="fs-3">Datos basicos</h2>

              <div class="col-12">
                <label for="id" class="form-label">Documento de identidad</label>
                <input type="number" value="<?php echo $rowTeacher['cedula'] ?>" id="id-input" name="id" class="form-control" required>
              </div>

              <div class="col-12">
                <label for="name" class="form-label">Nombre(s)</label>
                <input type="text" value="<?php echo $rowTeacher['nombre'] ?>" id="name-input" name="name" class="form-control" required>
              </div>

              <div class="col-12">
                <label for="surname" class="form-label">Apellido(s)</label>
                <input type="text" value="<?php echo $rowTeacher['apellido'] ?>" id="surname-input" name="surname" class="form-control" required>
              </div>

              <div class="col-12">
                <label for="email" class="form-label">Correo Electronico</label>
                <input type="email" value="<?php echo $rowTeacher['email'] ?>" id="email-input" name="email" class="form-control" required>
              </div>

              <div class="col-12">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" value="<?php echo $rowTeacher['contrasena'] ?>" id="password-input" name="password" class="form-control" required>
              </div>

              <div class="col-12">
                <label for="phone" class="form-label">Número de celular</label>
                <input type="number" value="<?php echo $rowTeacher['telefono'] ?>" id="phone-input" name="phone" class="form-control" required>
              </div>

              <div class="col-12">
                <label for="address" class="form-label">Dirección</label>
                <input type="text" value="<?php echo $rowTeacher['direccion'] ?>" id="address-input" name="address" class="form-control" required>
              </div>

              <div class="col-md-4">
                <button type="submit" class="btn btn-success">Guardar Cambios</button>
              </div>
              <div class="col-md-4">
                <a href="./actions/delete.php" class="btn btn-danger">Eliminar</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>

</html>