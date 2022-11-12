<?php
require '../config/database.php';
$db = new Database();
$con = $db->connection();

session_start();

$id = $_POST['id'];
$email = $_POST['email'];
$password = $_POST['password'];
$tipoUsuario = isset($_POST['tipoUsuario']) ? $_POST['tipoUsuario'] : 0;

if ($tipoUsuario != 0) {
  if ($tipoUsuario == 'profesor') {
    $query = $con->prepare("SELECT cedula FROM profesores WHERE cedula=? AND email=? AND contrasena=?");
    $_SESSION['role'] = 'profesor';
  } elseif ($tipoUsuario == 'estudiante') {
    $query = $con->prepare("SELECT cedula FROM estudiantes WHERE cedula=? AND email=? AND contrasena=?");
    $_SESSION['role'] = 'estudiante';
  }
}

$query->execute([$id, $email, $password]);

$answer = $query->fetch(PDO::FETCH_ASSOC);

if (!$answer) {
  echo "Select fallido";
} else {
  $cedula = $answer['cedula'];
  $_SESSION['id'] = $cedula;
  if ($tipoUsuario == 'profesor') {
    header('Location: /crudnotas/profesor.php');
  } elseif ($tipoUsuario == 'estudiante') {
    header('Location: /crudnotas/estudiante.php');
  }
}
