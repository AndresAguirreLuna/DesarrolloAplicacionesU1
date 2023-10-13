<?php
require_once("../Config/database.php");

    class ConsultasModel{

        private $db;     
        public $codigo;

        public function __construct($parametros){
            $this->codigo = $parametros["IdUsuario"];
        }
        public function get_ConsultaPrestamo(){
            $db = Connect::Conectar()->prepare("SELECT prestamo.Id, usuarios.Nombre, libro.Titulo, prestamo.FechaPrestamo, prestamo.FechaDevo FROM prestamo INNER JOIN usuarios on prestamo.IdUsuario = usuarios.Codigo 
            INNER JOIN ejemplares on ejemplares.Codigo = prestamo.IdEjemplar
            Inner JOIN libro on libro.Codigo = ejemplares.IdLibro");
            $db->execute();
            if($db->rowCount()>=0){
                try{
                    require_once("../Views/AdminPrestamo.php");
                    while($row = $db->fetch()):
                        return;
                    endwhile;
                }catch(PDOEXception $e){
                    echo $e->getMessage();
                    die();
                }
            }
            return $this->codigo;
        }
        public function get_ConsultaPrestamoUsuario(){
            $db = Connect::Conectar()->prepare("SELECT prestamo.Id, usuarios.Nombre, libro.Titulo, prestamo.FechaPrestamo, prestamo.FechaDevo FROM prestamo INNER JOIN usuarios on prestamo.IdUsuario = usuarios.Codigo 
            INNER JOIN ejemplares on ejemplares.Codigo = prestamo.IdEjemplar
            Inner JOIN libro on libro.Codigo = ejemplares.IdLibro WHERE usuarios.Codigo = :codigo");
            $db->bindParam(':codigo', $codigo, PDO::PARAM_INT); 
            $db->execute();
            if($db->rowCount()>=0){
                try{
                    require_once("../Views/AdminPrestamo.php");
                    while($row = $db->fetch()):
                        return;
                    endwhile;
                }catch(PDOEXception $e){
                    echo $e->getMessage();
                    die();
                }
            }
            return $this->codigo;
        }
        public function ConsultaUsuarios()
        {
            $db = Connect::Conectar()->prepare("SELECT * FROM usuarios");
            $db->execute();
            $usuarios = $db->fetchAll(PDO::FETCH_ASSOC);
            $json_usuarios = json_encode($usuarios);
            header('Content-Type: application/json');
            echo $json_usuarios;
        }
    }
?>