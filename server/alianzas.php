<?php

session_start();

require_once 'conexion.php';
require_once 'log.php';

function cargarAlianzas() {
    try {

        $query = Conexion::conectar()->prepare('select * from alianzas');
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $e) {
        throw $e;
    } finally {
        Conexion::desconectar();
    }
}

function guardarAlianza($file, $nombre, $descripcion) {

    try {

        $fileName = $file['name'];
        $ext = '.' . explode('.', $fileName)[1];
        $nuevoNombre = md5(time() . $fileName);
        $nuevoNombre .= $ext;
        $dest = '../assets/uploads/' . $nuevoNombre;
        
        if (move_uploaded_file($file['tmp_name'], $dest)) {

            $url = 'assets/uploads/' . $nuevoNombre;
            $query = Conexion::conectar()->prepare('insert into alianzas(nombre, descripcion, url) values(?, ?, ?)');
            $query->bindParam(1, $nombre);
            $query->bindParam(2, $descripcion);
            $query->bindParam(3, $url);
            $query->execute();

            $id = $_SESSION['usuario']['id'];
            guardarLog($id, "Guardó una alianza");

            echo 'ok';
        } else {
            echo 'Error';
        }

    } catch (Exception $e) {
        throw $e;
    } finally {
        Conexion::desconectar();
    }

}

function eliminarAlianza($id) {

    try {

        $query = Conexion::conectar()->prepare('select * from alianzas where id = ?');
        $query->bindParam(1, $id);
        $query->execute();
        $imagen = $query->fetch();

        if ($imagen['url'] != '') {
            $url = $imagen['url'];
            if(file_exists('../'.$url)) {
                unlink('../'.$url);
            } else {
                echo 'el archivo no existe';
            }
        }

        $query = Conexion::conectar()->prepare('delete from alianzas where id = ?');
        $query->bindParam(1, $imagen['id']);
        $query->execute();

        $id = $_SESSION['usuario']['id'];
        guardarLog($id, "Eliminó una alianza");

        echo 'ok';
    } catch (Exception $e) {
        throw $e;
    } finally {
        Conexion::desconectar();
    }

}

function cargarAlianzaPorId($id) {

    try {

        $query = Conexion::conectar()->prepare('select * from alianzas where id = ?');
        $query->bindParam(1, $id);
        $query->execute();
        return $query->fetch();
    } catch (Exception $e) {
        throw $e;
    } finally {
        Conexion::desconectar();
    }

}

function editarAlianza($nombre, $descripcion, $id, $file) {
    try {

        $query = Conexion::conectar()->prepare('update alianzas set nombre=?, descripcion=? where id=?');
        $query->bindParam(1, $nombre);
        $query->bindParam(2, $descripcion);
        $query->bindParam(3, $id);
        $query->execute();

        if ($file['error'] == 0) {

            $query = Conexion::conectar()->prepare('select * from alianzas where id = ?');
            $query->bindParam(1, $id);
            $query->execute();
            $imagen = $query->fetch();

            if ($imagen['url'] != '') {
                $url = $imagen['url'];
                if(file_exists('../'.$url)) {
                    unlink('../'.$url);
                }
            }

            $fileName = $file['name'];
            $ext = '.' . explode('.', $fileName)[1];
            $nuevoNombre = md5(time() . $fileName);
            $nuevoNombre .= $ext;
            $dest = '../assets/uploads/' . $nuevoNombre;
            
            if (move_uploaded_file($file['tmp_name'], $dest)) {
    
                $url = 'assets/uploads/' . $nuevoNombre;
                $query = Conexion::conectar()->prepare('update alianzas set url=? where id=?');
                $query->bindParam(1, $url);
                $query->bindParam(2, $id);
                $query->execute();
            }
        }

        $id = $_SESSION['usuario']['id'];
        guardarLog($id, "Editó una alianza");

        echo 'ok';
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

            if (isset($_FILES['file'])) {

                $file = $_FILES['file'];
                $nombre = '';
                $descripcion = '';
        
                if (isset($_POST['nombre']))
                    $nombre = $_POST['nombre'];
        
                if (isset($_POST['descripcion']))
                    $descripcion = $_POST['descripcion'];
                
                guardarAlianza($file, $nombre, $descripcion);
            }

            break;
        case 'editar':
            $nombre = '';
            $descripcion = '';
            $id = -1;
    
            if (isset($_POST['nombre']))
                $nombre = $_POST['nombre'];
    
            if (isset($_POST['descripcion']))
                $descripcion = $_POST['descripcion'];

            if (isset($_POST['id']))
                $id = $_POST['id'];
            
            if (isset($_FILES['file'])) {
                $file = $_FILES['file'];
                editarAlianza($nombre, $descripcion, $id, $file);
            } else {
                editarAlianza($nombre, $descripcion, $id);
            }
            break;
        case 'borrar':
            $id = -1;
            if (isset($_POST['id']))
                $id = $_POST['id'];
            eliminarAlianza($id);
            break;
    }

} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        echo json_encode(cargarAlianzaPorId($id));
    } else {
        echo json_encode(cargarAlianzas());
    }
}
