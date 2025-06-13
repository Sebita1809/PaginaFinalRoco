<?php

class Conexion{
    static public function conectar(){
        // Obtener configuración de variables de entorno o usar valores por defecto
        $host = getenv('DB_HOST') ?: 'localhost';
        $port = getenv('DB_PORT') ?: '3306';
        $dbname = getenv('DB_NAME') ?: '2dosemestreglobalprogramacion';
        $username = getenv('DB_USER') ?: 'root';
        $password = getenv('DB_PASSWORD') ?: '';
        
        $link = new PDO("mysql:host=$host; port=$port; dbname=$dbname", $username, $password);
        $link ->exec("set names utf8");
        return $link;
    }
    static public function consulta($sql){
        
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt ->execute();

        return $stmt->fetchAll();
    }
}


?>