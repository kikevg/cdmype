<?php

session_start();

require_once 'conexion.php';
require_once './log.php';

function cargarServicios($contexto) {
    try {
        $query = Conexion::conectar()->prepare("select * from servicios where contexto = ?");
        $query->bindParam(1, $contexto);
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $e) {
        throw $e;
    }
}

function guardarServicio($nombre, $icono = null, $color = null, $descripcion, $contexto) {

    $colores = ['text-success', 'text-primary', 'text-orange', 'text-danger'];

    try {
        $query = Conexion::conectar()->prepare("insert into servicios(nombre, descripcion, icono, color, contexto) values(?, ?, ?, ?, ?)");
        $query->bindParam(1, $nombre);
        $query->bindParam(2, $descripcion);
        $query->bindParam(3, $icono);
        $query->bindParam(4, $colores[$color]);
        $query->bindParam(5, $contexto);
        $query->execute();

        $id = $_SESSION['usuario']['id'];
        guardarLog($id, "Guardó un servicio");


        echo 'ok';
    } catch (Exception $e) {
        throw $e;
    } finally {
        Conexion::desconectar();
    }
}

function borrarServicio($id) {
    try {
        $query = Conexion::conectar()->prepare("delete from servicios where id = ?");
        $query->bindParam(1, $id);
        $query->execute();

        $id = $_SESSION['usuario']['id'];
        guardarLog($id, "Eliminó un servicio");

        echo 'ok';
    } catch (Exception $e) {
        throw $e;
    } finally {
        Conexion::desconectar();
    }
}

function cargarServicioPorId($id) {
    try {
        $query = Conexion::conectar()->prepare("select * from servicios where id = ?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query->fetch();
    } catch (Exception $e) {
        throw $e;
    }
}

function editarServicio($nombre, $icono = null, $color = null, $descripcion, $id) {

    $colores = ['text-success', 'text-primary', 'text-orange', 'text-danger'];

    try {
        $query = Conexion::conectar()->prepare("update servicios set nombre=?, icono=?, color=?, descripcion=? where id=?");
        $query->bindParam(1, $nombre);
        $query->bindParam(2, $icono);
        $query->bindParam(3, $colorres[$color]);
        $query->bindParam(4, $descripcion);
        $query->bindParam(5, $id);
        $query->execute();

        $id = $_SESSION['usuario']['id'];
        guardarLog($id, "Editó un servicio");

        echo 'ok';
    } catch (Exception $e) {
        throw $e;
    } finally {
        Conexion::desconectar();
    }
}

if (isset($_POST['accion'])) {

    $accion = $_POST['accion'];
    $nombre = '';
    $icono = '';
    $color = '';
    $descripcion = '';
    $id = '';
    $contexto = '';

    if (isset($_POST['icono']) && isset($_POST['color'])) {
        $icono = $_POST['icono'];
        $color = $_POST['color'];
    }

    if (isset($_POST['nombre']) && isset($_POST['descripcion'])) {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
    }

    if (isset($_POST['contexto']))
        $contexto = $_POST['contexto'];

    switch ($accion) {
        case 'guardar':
            guardarServicio($nombre, $icono, $color, $descripcion, $contexto);
            break;
        case 'editar':
            $id = $_POST['id'];
            editarServicio($nombre, $icono, $color, $descripcion, $id);
            break;
        case 'borrar':
            $id = $_POST['id'];
            borrarServicio($id);
            break;
    }

} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        echo json_encode(cargarServicioPorId($id));
    } else {
        if (isset($_GET['contexto'])) {
            $contexto = $_GET['contexto'];
            echo json_encode(cargarServicios($contexto));
        }
    }
}

