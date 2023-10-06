<?php

if(isset($_POST["Boton"])){
    $clase = $_POST["Clase"];
    $funcion = $_POST["Funcion"];

    include_once '../Models/'.$clase.'.php';
    $objeto = new $clase($_POST);
    $objeto->$funcion();
}elseif(isset($_GET["Parametro"])){
    $clase = $_GET["C"];
    $funcion = $_GET["F"];

    include_once '../Models/'.$clase.'.php';
    $objeto = new $clase($_GET);
    $objeto->$funcion();
}
    
?>