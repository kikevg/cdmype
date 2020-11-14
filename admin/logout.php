<?php

require_once '../server/log.php';

session_start();

$id = $_SESSION['usuario']['id'];
guardarLog($id, 'Cerró la sesion');

session_unset();
header('Location: index.php');

