<?php
    class Connect{

        public static function Conectar(){
        $servidor = "containers-us-west-54.railway.app";
        $db = "railway";
        $user = "root";
        $pass = "I94f2lPSJPM9R0kGMdTf";
        $port = "5746";

            $conexion = new PDO("mysql:host=$servidor; port=5746; dbname=$db;",$user,$pass);
            
            return $conexion;
        }

    }

?>