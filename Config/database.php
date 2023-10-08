<?php
    class Connect{

        public static function Conectar(){
        $servidor = "containers-us-west-54.railway.app";
        $db = "railway";
        $user = "root";
        $pass = "5746";

            $conexion = new PDO("mysql:host=$servidor;dbname=$db;",$user,$pass);
            
            return $conexion;
        }

    }

?>