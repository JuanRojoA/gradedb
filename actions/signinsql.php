<?php
require '../config/database.php';

$db = new Database();
$con = $db->connection();

session_start();

$success = false;
$user = isset($_GET['user']) ? $_GET['user'] : null;
$cod = isset($_GET['cod']) ? $_GET['cod'] : null;
$id = $_POST['id'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$tipoUsuario = isset($_POST['tipoUsuario']) ? $_POST['tipoUsuario'] : 0;


if ($cod) {
  if ($user == 'profesor') {
    $query = $con->prepare("UPDATE profesores SET cedula=?, nombre=?, apellido=?, email=?, contrasena=?, telefono=?, direccion=? WHERE cedula=?");
  } elseif ($user == 'estudiante') {
    $query = $con->prepare("UPDATE estudiantes SET cedula=?, nombre=?, apellido=?, email=?, contrasena=?, telefono=?, direccion=? WHERE cedula=?");
  }
  $result = $query->execute([$id, $name, $surname, $email, $password, $phone, $address, $cod]);
  if ($result) {
    $success = true;
    if ($user == 'profesor') {
      header("Location: /crudnotas/profesor.php");
    } elseif ($user == 'estudiante') {
      header("Location: /crudnotas/estudiante.php");
    }
  }
  $_SESSION['id'] = $id;
} else {
  if ($tipoUsuario != 0) {
    if ($tipoUsuario == 'profesor') {
      $query = $con->prepare("INSERT INTO profesores (cedula, nombre, apellido, email, contrasena, telefono, direccion) VALUES (?,?,?,?,?,?,?)");
    } elseif ($tipoUsuario == 'estudiante') {
      $query = $con->prepare("INSERT INTO estudiantes (cedula, nombre, apellido, email, contrasena, telefono, direccion) VALUES (?,?,?,?,?,?,?)");
    }
  }
  $result = $query->execute([$id, $name, $surname, $email, $password, $phone, $address]);
  if ($result) {
    $success = true;
    header("Location: /crudnotas/login.php");
  }
}
