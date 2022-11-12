<?php

session_start();
require '../config/database.php';
$db = new Database();
$con = $db->connection();

$id = isset($_SESSION['id']) ? $_SESSION['id'] : 0;

if ($id) {
  if ($_SESSION['role'] == 'profesor') {
    $query = $con->prepare("DELETE FROM profesores WHERE cedula=?");
  } elseif ($_SESSION['role'] == 'estudiante') {
    $query = $con->prepare("DELETE FROM estudiantes WHERE cedula=?");
  }
}

$query->execute([$id]);


session_destroy();

header('Location: /crudnotas/index.php');
