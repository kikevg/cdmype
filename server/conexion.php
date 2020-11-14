<?php

class Conexion {

    private static $con;

    public static function conectar() {
        try {
            self::$con = new PDO("mysql:host=localhost;dbname=db_cdmypeunivo", "root", "");
            return self::$con;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function desconectar() {
        self::$con = null;
        return self::$con;
    }

}
