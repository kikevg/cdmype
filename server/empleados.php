<?php

session_start();

require_once 'conexion.php';
require_once 'log.php';

function cargarEmpleados() {
    try {

        $query = Conexion::conectar()->prepare('select * from empleados');
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $e) {
        throw $e;
    } finally {
        Conexion::desconectar();
    }
}

function guardarEmpleado($file, $nombre, $descripcion, $cargo, $telefono, $email) {

    try {

        $fileName = $file['name'];
        $ext = '.' . explode('.', $fileName)[1];
        $nuevoNombre = md5(time() . $fileName);
        $nuevoNombre .= $ext;
        $dest = '../assets/uploads/' . $nuevoNombre;
        
        if (move_uploaded_file($file['tmp_name'], $dest)) {

            $url = 'assets/uploads/' . $nuevoNombre;
            $query = Conexion::conectar()->prepare('insert into empleados(nombre, descripcion, url, cargo, telefono, email) values(?, ?, ?, ?, ?, ?)');
            $query->bindParam(1, $nombre);
            $query->bindParam(2, $descripcion);
            $query->bindParam(3, $url);
            $query->bindParam(4, $cargo);
            $query->bindParam(5, $telefono);
            $query->bindParam(6, $email);
            $query->execute();

            $id = $_SESSION['usuario']['id'];
            guardarLog($id, "Guardó un empleado");

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

function eliminarEmpleado($id) {

    try {

        $query = Conexion::conectar()->prepare('select * from empleados where id = ?');
        $query->bindParam(1, $id);
        $query->execute();
        $imagen = $query->fetch();

        if ($imagen['url'] != '') {
            $url = $imagen['url'];
            if(file_exists('../'.$url)) {
                unlink('../'.$url);
            }
        }

        $query = Conexion::conectar()->prepare('delete from empleados where id = ?');
        $query->bindParam(1, $imagen['id']);
        $query->execute();

        $id = $_SESSION['usuario']['id'];
        guardarLog($id, "Eliminó un empleado");

        echo 'ok';
    } catch (Exception $e) {
        throw $e;
    } finally {
        Conexion::desconectar();
    }

}

function cargarEmpleadoPorId($id) {

    try {

        $query = Conexion::conectar()->prepare('select * from empleados where id = ?');
        $query->bindParam(1, $id);
        $query->execute();
        return $query->fetch();
    } catch (Exception $e) {
        throw $e;
    } finally {
        Conexion::desconectar();
    }

}

function editarEmpleado($nombre, $descripcion, $cargo, $telefono, $email, $id, $file) {
    try {

        $sql = 'update empleados set nombre=?, descripcion=?, cargo=?, telefono=?, email=? where id=?';

        $query = Conexion::conectar()->prepare($sql);
        $query->bindParam(1, $nombre);
        $query->bindParam(2, $descripcion);
        $query->bindParam(3, $cargo);
        $query->bindParam(4, $telefono);
        $query->bindParam(5, $email);
        $query->bindParam(6, $id);
        $query->execute();

        if ($file['error'] == 0) {

            $query = Conexion::conectar()->prepare('select * from empleados where id = ?');
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
                $query = Conexion::conectar()->prepare('update empleados set url=? where id=?');
                $query->bindParam(1, $url);
                $query->bindParam(2, $id);
                $query->execute();
            }
        }

        $id = $_SESSION['usuario']['id'];
        guardarLog($id, "Editó un empleado");

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
                $cargo = '';
                $telefono = '';
                $email = '';
        
                if (isset($_POST['nombre']))
                    $nombre = $_POST['nombre'];
        
                if (isset($_POST['descripcion']))
                    $descripcion = $_POST['descripcion'];
                
                if (isset($_POST['cargo']))
                    $cargo = $_POST['cargo'];
                
                if (isset($_POST['telefono']))
                    $telefono = $_POST['telefono'];
                
                if (isset($_POST['email']))
                    $email = $_POST['email'];
                
                guardarEmpleado($file, $nombre, $descripcion, $cargo, $telefono, $email);
            }

            break;
        case 'editar':
            $nombre = '';
            $descripcion = '';
            $cargo = '';
            $telefono = '';
            $email = '';
            $id = -1;
    
            if (isset($_POST['nombre']))
                $nombre = $_POST['nombre'];
    
            if (isset($_POST['descripcion']))
                $descripcion = $_POST['descripcion'];
            
            if (isset($_POST['cargo']))
                $cargo = $_POST['cargo'];
            
            if (isset($_POST['telefono']))
                $telefono = $_POST['telefono'];
            
            if (isset($_POST['email']))
                $email = $_POST['email'];

            if (isset($_POST['id']))
                $id = $_POST['id'];

            if (isset($_FILES['file'])) {
                $file = $_FILES['file'];
                editarEmpleado($nombre, $descripcion, $cargo, $telefono, $email, $id, $file);
            } else {
                editarEmpleado($nombre, $descripcion, $cargo, $telefono, $email, $id, null);
            }
            break;
        case 'borrar':
            $id = -1;
            if (isset($_POST['id']))
                $id = $_POST['id'];
            eliminarEmpleado($id);
            break;
    }

} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        echo json_encode(cargarEmpleadoPorId($id));
    } else {
        echo json_encode(cargarEmpleados());
    }
}
