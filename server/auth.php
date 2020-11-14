<?php

require_once 'conexion.php';
require_once 'log.php';

function login($usuario, $clave) {
    try {

        $query = Conexion::conectar()->prepare('select * from usuarios where usuario = ?');
        $query->bindParam(1, $usuario);
        $query->execute();
        $usuario = $query->fetch();
        if ($usuario != null) {
            if (password_verify($clave, $usuario['clave'])) {
                session_start();
                $_SESSION['usuario'] = $usuario;

                guardarLog($_SESSION['usuario']['id'], 'Inició sesision');

                echo 'ok';
            } else {
                echo 'Usuario o contraseña incorrecto';
            }
        } else {
            echo 'El usuario no existe';
        }
    } catch (Exception $e) {
        throw $e;
    } finally {
        Conexion::desconectar();
    }
}

if (isset($_POST['usuario']) && isset($_POST['clave'])) {

    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    login($usuario, $clave);

}
