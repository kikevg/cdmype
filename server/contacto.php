<?php


$nombre = '';
$email = '';
$asunto = '';
$mensaje = '';
$destino = '';

if ($_POST['nombre'])
    $nombre = $_POST['nombre'];
if ($_POST['email'])
    $email = $_POST['email'];
if ($_POST['asunto'])
    $asunto = $_POST['asunto'];
if ($_POST['mensaje'])
    $mensaje = $_POST['mensaje'];
if ($_POST['destino'])
    $destino = $_POST['destino'];

$contenido = "nombre: " . $nombre . "\nEmail: " . $email . "\nAsunto: " . $asunto . "\nMensaje: " . $mensaje;

if (mail($destino, $asunto, $contenido))
    echo 'ok';
