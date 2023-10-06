<?php
require_once("../Config/database.php");

    class AutorModel{

        private $db;
        private $autor;
        private $id;

        public function __construct($parametros){
            $this->nombre = $parametros["nombre"];
            $this->apellido = $parametros["apellido"];
            $this->id = $parametros["id"];
        }

        public function insertar(){
            try{
                $db = Connect::Conectar()->prepare("INSERT INTO autor (id, nombre, apellido) VALUES ('$this->id', '$this->nombre' , '$this->apellido')");
                $db->execute();
            }catch(PDOEXception $e){
                echo $e->getMessage();
                die();
            }
            $this->get_editoriales();
            //require_once("../Views/AgregarEditorial.php");
        }

        public function get_editoriales(){
            $db = Connect::Conectar()->prepare("SELECT * FROM editorial");
            $db->execute();
            if($db->rowCount()>=0){
                try{
                    require_once("../Views/AdminEditorial.php");
                    while($row = $db->fetch()):
                        return;
                    endwhile;
                }catch(PDOEXception $e){
                    echo $e->getMessage();
                    die();
                }
            }
            return $this->editorial;
        }

        //Los siguientes metodos deben ajustarse-----

        public function delete_editorial(){
            $db = Connect::Conectar()->prepare("DELETE FROM editorial WHERE codigo='".$this->id."'");
            $res = $db->execute();
            if($res){
                $this->get_editoriales();
            }else{
                return false;
            }
        }

        public function get_id($codigo){
            $db = Connect::Conectar()->prepare("SELECT * FROM editorial WHERE codigo='".$this->id."' ");
            $res = $db->execute();
            if($row = $res->fetch_assoc()){
                $this->editorial[] = $row;
            }
            return $this->editorial;
        }

        public function actualizar(){
            $db = Connect::Conectar()->prepare("UPDATE editorial SET nombre='".$this->editorial."' where codigo='".$this->id."' ");
            $res = $db->execute();
            if($res){
                $this->get_editoriales();
            }else{
                return false;
            }
        }

    }
?>