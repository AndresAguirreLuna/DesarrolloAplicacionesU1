<?php
require_once("../Config/database.php");

    class AutorModel{

        private $db;
        private $autor;
        private $id;

        public $nombre;
        public $apellido;
    
        public function __construct($parametros){
            $this->nombre = $parametros["nombre"];
            $this->apellido = $parametros["apellido"];
            $this->id = $parametros["id"];
        }

        public function create_autor(){
            try{
                $db = Connect::Conectar()->prepare("INSERT INTO autor (id, nombre, apellido) VALUES ('$this->id', '$this->nombre' , '$this->apellido')");
                $db->execute();
            }catch(PDOEXception $e){
                echo $e->getMessage();
                die();
            }
            $this->get_autores();
        }

        public function get_autores(){
            $db = Connect::Conectar()->prepare("SELECT * FROM autor");
            $db->execute();
            if($db->rowCount()>=0){
                try{
                    require_once("../Views/AdminAutor.php");
                    while($row = $db->fetch()):
                        return;
                    endwhile;
                }catch(PDOEXception $e){
                    echo $e->getMessage();
                    die();
                }
            }
            return $this->autor;
        }

        public function delete_autor(){
            $db = Connect::Conectar()->prepare("DELETE FROM autor WHERE id='".$this->id."'");
            $res = $db->execute();
            if($res){
                $this->get_autores();
            }else{
                return false;
            }
        }

        public function get_id($codigo){
            $db = Connect::Conectar()->prepare("SELECT * FROM autor WHERE id='".$this->id."' ");
            $res = $db->execute();
            if($row = $res->fetch_assoc()){
                $this->autor[] = $row;
            }
            return $this->autor;
        }

        public function update_autor(){
            $db = Connect::Conectar()->prepare("UPDATE autor SET nombre='".$this->nombre."' , apellido='".$this->apellido." ' where id='".$this->id."' ");
            $res = $db->execute();
            if($res){
                $this->get_autores();
            }else{
                return false;
            }
        }

    }
?>