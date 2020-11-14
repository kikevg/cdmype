<?php

session_start();

require_once 'conexion.php';
require_once 'log.php';

function cargarNoticias() {
    try {

        $query = Conexion::conectar()->prepare('select * from noticias order by id desc');
        $query->execute();
        return $query->fetchAll();

    } catch (Exception $e) {
        throw $e;
    } finally {
        Conexion::desconectar();
    }
}

function guardarNoticia($file, $titulo, $descripcion, $categoria) {
    try {

        $fileName = $file['name'];
        $ext = '.' . explode('.', $fileName)[1];
        $nuevoNombre = md5(time() . $fileName);
        $nuevoNombre .= $ext;
        $dest = '../assets/uploads/' . $nuevoNombre;
        
        if (move_uploaded_file($file['tmp_name'], $dest)) {

            $url = 'assets/uploads/' . $nuevoNombre;
            $query = Conexion::conectar()->prepare('insert into noticias(titulo, descripcion, url, categoria, fecha) values(?, ?, ?, ?, concat(curdate(), " ", curtime()))');
            $query->bindParam(1, $titulo);
            $query->bindParam(2, $descripcion);
            $query->bindParam(3, $url);
            $query->bindParam(4, $categoria);
            $query->execute();

            $id = $_SESSION['usuario']['id'];
            guardarLog($id, "Guardó una noticia");

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

function eliminarNoticia($id) {
    try {

        $query = Conexion::conectar()->prepare('select * from noticias where id = ?');
        $query->bindParam(1, $id);
        $query->execute();
        $noticia = $query->fetch();

        if ($noticia['url'] != '') {
            $url = $noticia['url'];
            if(file_exists('../'.$url)) {
                unlink('../'.$url);
            } else {
                echo 'el archivo no existe';
            }
        }

        $query = Conexion::conectar()->prepare('delete from noticias where id=?');
        $query->bindParam(1, $noticia['id']);
        $query->execute();

        $id = $_SESSION['usuario']['id'];
        guardarLog($id, "Eliminó una noticia");

        echo 'ok';

    } catch (Exception $e) {
        throw $e;
    } finally {
        Conexion::desconectar();
    }
}

function cargarNoticiaPorId($id) {

    try {
        //code...
        $query = Conexion::conectar()->prepare('select * from noticias where id = ?');
        $query->bindParam(1, $id);
        $query->execute();
        return $query->fetch();
    } catch (\Throwable $th) {
        throw $th;
    } finally {
        Conexion::desconectar();
    }

}

function editarNoticia($titulo, $descripcion, $categoria, $id) {
    try {

        $query = Conexion::conectar()->prepare('update noticias set titulo=?, descripcion=?, categoria=? where id=?');
        $query->bindParam(1, $titulo);
        $query->bindParam(2, $descripcion);
        $query->bindParam(3, $categoria);
        $query->bindParam(4, $id);
        $query->execute();

        $id = $_SESSION['usuario']['id'];
        guardarLog($id, "Editó una noticia");

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
                $titulo = '';
                $descripcion = '';
                $categoria = '';
        
                if (isset($_POST['titulo']))
                    $titulo = $_POST['titulo'];
        
                if (isset($_POST['descripcion']))
                    $descripcion = $_POST['descripcion'];
                
                if (isset($_POST['categoria']))
                    $categoria = $_POST['categoria'];
                
                
                guardarNoticia($file, $titulo, $descripcion, $categoria);
            }

            break;
        case 'editar':

            $titulo = '';
            $descripcion = '';
            $categoria = '';
            $id = -1;
    
            if (isset($_POST['titulo']))
                $titulo = $_POST['titulo'];
    
            if (isset($_POST['descripcion']))
                $descripcion = $_POST['descripcion'];
            
            if (isset($_POST['categoria']))
                $categoria = $_POST['categoria'];
            
            if (isset($_POST['id']))
                $id = $_POST['id'];
            
            editarNoticia($titulo, $descripcion, $categoria, $id);
            break;
        case 'borrar':
            $id = -1;
            if (isset($_POST['id']))
                $id = $_POST['id'];
            eliminarNoticia($id);
            break;
    }

} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        echo json_encode(cargarNoticiaPorId($id));
    } else {
        echo json_encode(cargarNoticias());
    }
}

