<?php

require_once 'conexion.php';

function cargarLogs() {
    try {
        $query = Conexion::conectar()->prepare('select u.nombre as usuario, l.descripcion as descripcion, l.fecha as fecha from logs as l inner join usuarios as u on l.id_usuario = u.id order by l.id desc');
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $e) {
        throw $e;
    } finally {
        Conexion::desconectar();
    }
}

function cargarLogsPorUsuario($usuarioId) {
    try {
        $query = Conexion::conectar()->prepare('select u.nombre as usuario, l.descripcion as descripcion, l.fecha as fecha from logs as l inner join usuarios as u on l.id_usuario = u.id where u.id = ? order by l.id desc');
        $query->bindParam(1, $usuarioId);
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $e) {
        throw $e;
    } finally {
        Conexion::desconectar();
    }
}

function guardarLog($id, $descripcion) {
    try {

        $query = Conexion::conectar()->prepare("insert into logs(id_usuario, descripcion, fecha) values(?, ?, concat(curdate(), ' ', curtime()))");
        $query->bindParam(1, $id);
        $query->bindParam(2, $descripcion);
        $query->execute();
    } catch (Exception $e) {
        throw $e;
    } finally {
        Conexion::desconectar();
    }
}

if (isset($_GET['idusuariologs'])) {
    $id = $_GET['idusuariologs'];
    echo json_encode(cargarLogsPorUsuario($id));
} elseif (isset($_GET['accion'])) {
    echo json_encode(cargarLogs());
}
