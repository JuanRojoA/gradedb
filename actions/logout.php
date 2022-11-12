<?php
session_start();
session_destroy();
header('Location: /crudnotas/index.php');
