<?php
    class Connect{

        public static function Conectar(){
        $servidor = "localhost";
        $db = "biblioteca";
        $user = "root";
        $pass = null;

            $conexion = new PDO("mysql:host=$servidor;dbname=$db;",$user,$pass);
            
            return $conexion;
        }

    }

?>