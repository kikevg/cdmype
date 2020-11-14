<?php

session_start();

require_once 'conexion.php';
require_once 'log.php';

function cargarEmpresas() {
    try {

        $query = Conexion::conectar()->prepare('select * from empresas');
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $e) {
        throw $e;
    } finally {
        Conexion::desconectar();
    }
}

function guardarEmpresa($file, $nombre, $descripcion, $fundacion, $propietario, $website = '') {

    try {

        $fileName = $file['name'];
        $ext = '.' . explode('.', $fileName)[1];
        $nuevoNombre = md5(time() . $fileName);
        $nuevoNombre .= $ext;
        $dest = '../assets/uploads/' . $nuevoNombre;
        
        if (move_uploaded_file($file['tmp_name'], $dest)) {

            $url = 'assets/uploads/' . $nuevoNombre;
            $query = Conexion::conectar()->prepare('insert into empresas(nombre, descripcion, url, fundacion, propietario, website) values(?, ?, ?, ?, ?, ?)');
            $query->bindParam(1, $nombre);
            $query->bindParam(2, $descripcion);
            $query->bindParam(3, $url);
            $query->bindParam(4, $fundacion);
            $query->bindParam(5, $propietario);
            $query->bindParam(6, $website);
            $query->execute();

            $id = $_SESSION['usuario']['id'];
            guardarLog($id, "Guardó una empresa");

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

function eliminarEmpresa($id) {

    try {

        $query = Conexion::conectar()->prepare('select * from empresas where id = ?');
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

        $query = Conexion::conectar()->prepare('delete from empresas where id = ?');
        $query->bindParam(1, $imagen['id']);
        $query->execute();

        $id = $_SESSION['usuario']['id'];
        guardarLog($id, "Eliminó una empresa");

        echo 'ok';
    } catch (Exception $e) {
        throw $e;
    } finally {
        Conexion::desconectar();
    }

}

function cargarEmpresaPorId($id) {
    try {

        $query = Conexion::conectar()->prepare('select * from empresas where id = ?');
        $query->bindParam(1, $id);
        $query->execute();
        return $query->fetch();
    } catch (Exception $e) {
        throw $e;
    } finally {
        Conexion::desconectar();
    }
}

function editarEmpresa($nombre, $descripcion, $fundacion, $propietario, $website, $id, $file) {
    try {

        $query = Conexion::conectar()->prepare('update empresas set nombre=?, descripcion=?, fundacion=?, propietario=?, website=? where id=?');
        $query->bindParam(1, $nombre);
        $query->bindParam(2, $descripcion);
        $query->bindParam(3, $fundacion);
        $query->bindParam(4, $propietario);
        $query->bindParam(5, $website);
        $query->bindParam(6, $id);
        $query->execute();

        if ($file['error'] == 0) {

            $query = Conexion::conectar()->prepare('select * from empresas where id = ?');
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
                $query = Conexion::conectar()->prepare('update empresas set url=? where id=?');
                $query->bindParam(1, $url);
                $query->bindParam(2, $id);
                $query->execute();
            }
        }

        $id = $_SESSION['usuario']['id'];
        guardarLog($id, "Editó una empresa");

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
                $fundacion = '';
                $propietario = '';
                $website = '';
        
                if (isset($_POST['nombre']))
                    $nombre = $_POST['nombre'];
        
                if (isset($_POST['descripcion']))
                    $descripcion = $_POST['descripcion'];
                
                if (isset($_POST['fundacion']))
                    $fundacion = $_POST['fundacion'];
                
                if (isset($_POST['propietario']))
                    $propietario = $_POST['propietario'];
                
                if (isset($_POST['website']))
                    $website = $_POST['website'];
                
                guardarEmpresa($file, $nombre, $descripcion, $fundacion, $propietario, $website);
            }

            break;
        case 'editar':
            $nombre = '';
            $descripcion = '';
            $fundacion = '';
            $propietario = '';
            $website = '';
            $id = -1;
    
            if (isset($_POST['nombre']))
                $nombre = $_POST['nombre'];
    
            if (isset($_POST['descripcion']))
                $descripcion = $_POST['descripcion'];
            
            if (isset($_POST['fundacion']))
                $fundacion = $_POST['fundacion'];
            
            if (isset($_POST['propietario']))
                $propietario = $_POST['propietario'];
            
            if (isset($_POST['website']))
                $website = $_POST['website'];

            if (isset($_POST['id']))
                $id = $_POST['id'];

            if (isset($_FILES['file'])) {
                $file = $_FILES['file'];
                editarEmpresa($nombre, $descripcion, $fundacion, $propietario, $website, $id, $file);
            } else {
                editarEmpresa($nombre, $descripcion, $fundacion, $propietario, $website, $id, null);
            }
            
            break;
        case 'borrar':
            $id = -1;
            if (isset($_POST['id']))
                $id = $_POST['id'];
            eliminarEmpresa($id);
            break;
    }

} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        echo json_encode(cargarEmpresaPorId($id));
    } else {
        echo json_encode(cargarEmpresas());
    }
}
