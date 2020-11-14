<?php

session_start();

require_once 'conexion.php';
require_once 'log.php';

function cargarImagenes() {
    try {

        $query = Conexion::conectar()->prepare('select * from carousel order by indice asc');
        $query->execute();
        return $query->fetchAll();
    } catch (Exception $e) {
        throw $e;
    } finally {
        Conexion::desconectar();
    }
}

function guardarImagen($file, $nombre, $descripcion) {

    try {

        $fileName = $file['name'];
        $ext = '.' . explode('.', $fileName)[1];
        $nuevoNombre = md5(time() . $fileName);
        $nuevoNombre .= $ext;
        $dest = '../assets/uploads/' . $nuevoNombre;
        
        if (move_uploaded_file($file['tmp_name'], $dest)) {

            $url = 'assets/uploads/' . $nuevoNombre;

            $query = Conexion::conectar()->prepare('select count(*) as tuplas from carousel');
            $query->execute();
            $index = (int)$query->fetch()['tuplas'];
            
            $query = Conexion::conectar()->prepare('insert into carousel(nombre, descripcion, url, indice) values(?, ?, ?, ?)');
            $index += 1;
            $query->bindParam(1, $nombre);
            $query->bindParam(2, $descripcion);
            $query->bindParam(3, $url);
            $query->bindParam(4, $index);
            $query->execute();

            $id = $_SESSION['usuario']['id'];
            guardarLog($id, "Guardó una imagen");

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

function cambiarPosicionArriaba($indice) {

    try {

        $query = Conexion::conectar()->prepare('select * from carousel where indice = ?');
        $query->bindParam(1, $indice);
        $query->execute();
        $imagen = $query->fetch();

        $indice -= 1;
        $query = Conexion::conectar()->prepare('select * from carousel where indice = ?');
        $query->bindParam(1, $indice);
        $query->execute();
        $imagen2 = $query->fetch();

        $query = Conexion::conectar()->prepare('update carousel set indice = ? where id = ?');
        $query->bindParam(1, $imagen2['indice']);
        $query->bindParam(2, $imagen['id']);
        $query->execute();

        $query = Conexion::conectar()->prepare('update carousel set indice = ? where id = ?');
        $query->bindParam(1, $imagen['indice']);
        $query->bindParam(2, $imagen2['id']);
        $query->execute();

        echo 'ok';

    } catch (Exception $e) {
        throw $e;
    } finally {
        Conexion::desconectar();
    }

}

function cambiarPosicionAbajo($indice) {
    try {

        $query = Conexion::conectar()->prepare('select * from carousel where indice = ?');
        $query->bindParam(1, $indice);
        $query->execute();
        $imagen = $query->fetch();

        $i = ((int)$indice) + 1;
        $query = Conexion::conectar()->prepare('select * from carousel where indice = ?');
        $query->bindParam(1, $i);
        $query->execute();
        $imagen2 = $query->fetch();

        $query = Conexion::conectar()->prepare('update carousel set indice = ? where id = ?');
        $query->bindParam(1, $imagen2['indice']);
        $query->bindParam(2, $imagen['id']);
        $query->execute();

        $query = Conexion::conectar()->prepare('update carousel set indice = ? where id = ?');
        $query->bindParam(1, $imagen['indice']);
        $query->bindParam(2, $imagen2['id']);
        $query->execute();

        echo 'ok';

    } catch (Exception $e) {
        throw $e;
    } finally {
        Conexion::desconectar();
    }
}

function eliminarImagen($id) {

    try {

        $query = Conexion::conectar()->prepare('select * from carousel where id = ?');
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

        $query = Conexion::conectar()->prepare('delete from carousel where id = ?');
        $query->bindParam(1, $imagen['id']);
        $query->execute();

        $query = Conexion::conectar()->prepare('select * from carousel where indice > ?');
        $query->bindParam(1, $imagen['indice']);
        $query->execute();
        $imagenes = $query->fetchAll();
        
        foreach ($imagenes as $item) {

            $indice = (int)$item['indice'] - 1;

            $sql = Conexion::conectar()->prepare('update carousel set indice = ? where id = ?');
            $sql->bindParam(1, $indice);
            $sql->bindParam(2, $item['id']);
            $sql->execute();
        }

        $id = $_SESSION['usuario']['id'];
        guardarLog($id, "Eliminó una imagen");

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
                
                guardarImagen($file, $nombre, $descripcion);
            }

            break;
        case 'editar':
            break;
        case 'up':
            $indice = '';
            if (isset($_POST['indice']))
                $indice = $_POST['indice'];
            cambiarPosicionArriaba($indice);
            break;
        case 'down':
            $indice = '';
            if (isset($_POST['indice']))
                $indice = $_POST['indice'];
            cambiarPosicionAbajo($indice);
            break;
        case 'borrar':
            $id = -1;
            if (isset($_POST['id']))
                $id = $_POST['id'];
            eliminarImagen($id);
            break;
    }

} else {
    echo json_encode(cargarImagenes());
}
