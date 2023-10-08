<?php
require_once("../Config/database.php");

    class UsuarioModel{

        private $db;
        private $usuario;
        private $id;

        public function __construct($parametros){
            $this->codigo = $parametros["codigo"];
            $this->nombre = $parametros["nombre"];
            $this->telefono = $parametros["telefono"];
            $this->direccion = $parametros["direccion"];
        }

        public function create_usuario(){
            try{
                $db = Connect::Conectar()->prepare("INSERT INTO usuarios (codigo, nombre, telefono, direccion) VALUES ('$this->codigo', '$this->nombre' , '$this->telefono', '$this->direccion')");
                $db->execute();
            }catch(PDOEXception $e){
                echo $e->getMessage();
                die();
            }
            $this->get_usuarios();
        }

        public function get_usuarios(){
            $db = Connect::Conectar()->prepare("SELECT * FROM usuarios");
            $db->execute();
            if($db->rowCount()>=0){
                try{
                    require_once("../Views/AdminUsuario.php");
                    while($row = $db->fetch()):
                        return;
                    endwhile;
                }catch(PDOEXception $e){
                    echo $e->getMessage();
                    die();
                }
            }
            return $this->usuario;
        }

        public function delete_usuario(){
            $db = Connect::Conectar()->prepare("DELETE FROM usuarios WHERE codigo='".$this->codigo."'");
            $res = $db->execute();
            if($res){
                $this->get_usuarios();
            }else{
                return false;
            }
        }

        public function update_usuario(){
            $db = Connect::Conectar()->prepare("UPDATE usuarios SET nombre='".$this->nombre."' , telefono='".$this->telefono." ', direccion='".$this->direccion." ' where codigo='".$this->codigo."' ");
            $res = $db->execute();
            if($res){
                $this->get_usuarios();
            }else{
                return false;
            }
        }

    }
?>