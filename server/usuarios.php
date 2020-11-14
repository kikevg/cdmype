<?php

session_start();

require_once 'conexion.php';
require_once 'log.php';

function cargarUsuarios() {
    try {
        $query = Conexion::conectar()->prepare('select * from usuarios');
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $e) {
        throw $e;
    } finally {
        Conexion::desconectar();
    }
}

function cargarPerfil($id) {
    try {
        $query = Conexion::conectar()->prepare('select * from usuarios where id = ?');
        $query->bindParam(1, $id);
        $query->execute();
        return $query->fetch();
    } catch (Exception $e) {
        throw $e;
    } finally {
        Conexion::desconectar();
    }
}

function guardarUsuario($nombre, $email, $usuario, $clave) {
    try {
        $query = Conexion::conectar()->prepare('insert into usuarios(nombre, email, usuario, clave) values(?, ?, ?, ?)');
        $query->bindParam(1, $nombre);
        $query->bindParam(2, $email);
        $query->bindParam(3, $usuario);
        $query->bindParam(4, $clave);
        $query->execute();

        $id = $_SESSION['usuario']['id'];
        guardarLog($id, "Guardó un usuario");

        echo 'ok';
    } catch (Exception $e) {
        throw $e;
    } finally {
        Conexion::desconectar();
    }
}

function eliminarUsuario($id) {
    try {
        $query = Conexion::conectar()->prepare('delete from usuarios where id = ?');
        $query->bindParam(1, $id);
        $query->execute();

        echo 'ok';
    } catch (Exception $e) {

    } finally {

    }
}

function editarUsuario($nombre, $email, $usuario, $id) {
    try {
        $query = Conexion::conectar()->prepare('update usuarios set nombre=?, email=?, usuario=? where id=?');
        $query->bindParam(1, $nombre);
        $query->bindParam(2, $email);
        $query->bindParam(3, $usuario);
        $query->bindParam(4, $id);
        $query->execute();

        $id = $_SESSION['usuario']['id'];
        guardarLog($id, "Editó su perfil");

        echo 'ok';
    } catch (Exception $e) {
        throw $e;
    } finally {
        Conexion::desconectar();
    }
}

function cambiarClave($clave, $nuevaClave, $id) {
    try {

        $query = Conexion::conectar()->prepare('select * from usuarios where id = ?');
        $query->bindParam(1, $id);
        $query->execute();
        $usuario = $query->fetch();

        if (password_verify($clave, $usuario['clave'])) {

            $query = Conexion::conectar()->prepare('update usuarios set clave=? where id=?');
            $query->bindParam(1, $nuevaClave);
            $query->bindParam(2, $id);
            $query->execute();

            $id = $_SESSION['usuario']['id'];
            guardarLog($id, "Editó su contraseña");

            echo 'ok';

        } else {
            echo 'La constraseña antigua es incorrecta';
        }

    } catch (Exception $e) {
        throw $e;
    } finally {
        Conexion::desconectar();
    }
}


if (isset($_POST['accion'])) {

    $accion = $_POST['accion'];

    switch ($accion) {
        case 'guardar':
            $nombre = '';
            $email = '';
            $usuario = '';
            $clave = '';

            if ($_POST['nombre'])
                $nombre = $_POST['nombre'];
            if ($_POST['email'])
                $email = $_POST['email'];
            if ($_POST['usuario'])
                $usuario = $_POST['usuario'];
            if ($_POST['clave'])
                $clave = $_POST['clave'];
            
            $contra = password_hash($clave, PASSWORD_DEFAULT);

            guardarUsuario($nombre, $email, $usuario, $contra);

            break;
        case 'eliminar':
            $id = '';
            if (isset($_POST['id']))
                $id = $_POST['id'];
            eliminarUsuario($id);
            break;
        case 'editar_usuario':

            $nombre = '';
            $email = '';
            $usuario = '';
            $id = '';

            if ($_POST['nombre'])
                $nombre = $_POST['nombre'];
            if ($_POST['email'])
                $email = $_POST['email'];
            if ($_POST['usuario'])
                $usuario = $_POST['usuario'];
            if ($_POST['id'])
                $id = $_POST['id'];

            editarUsuario($nombre, $email, $usuario, $id);
            break;
        case 'editar_clave':
            $clave = '';
            $nuevaClave1 = '';
            $nuevaClave2 = '';
            $id = '';

            if ($_POST['clave'])
                $clave = $_POST['clave'];
            if ($_POST['nuevaClave1'])
                $nuevaClave1 = $_POST['nuevaClave1'];
            if ($_POST['nuevaClave2'])
                $nuevaClave2 = $_POST['nuevaClave2'];
            if ($_POST['id'])
                $id = $_POST['id'];

            if ($nuevaClave1 == $nuevaClave2) {

                $pass = password_hash($nuevaClave1, PASSWORD_DEFAULT);
                cambiarClave($clave, $pass, $id);

            } else {
                echo 'La nueva contraseña no coincide';
            }
            break;
    }

} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        echo json_encode(cargarPerfil($id));
    } else {
        echo json_encode(cargarUsuarios());
    }
}
