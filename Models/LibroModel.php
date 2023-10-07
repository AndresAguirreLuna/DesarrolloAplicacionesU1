<?php
require_once("../Config/database.php");

    class LibroModel{

        private $db;
        private $libro;
        private $id;

        public function __construct($parametros){
            $this->codigo = $parametros["codigo"];
            $this->titulo = $parametros["titulo"];
            $this->isbn = $parametros["isbn"];
            $this->editorial = $parametros["editorial"];
            $this->paginas = $parametros["paginas"];
            $this->idAutor = $parametros["idAutor"];
        }

        public function create_libro(){
            try{
                $db = Connect::Conectar()->prepare("INSERT INTO libro (codigo, titulo, isbn, editorial, paginas, idautor) VALUES ('$this->codigo', '$this->titulo' , '$this->isbn', '$this->editorial', '$this->paginas', '$this->isautor')");
                $db->execute();
            }catch(PDOEXception $e){
                echo $e->getMessage();
                die();
            }
            $this->get_libros();
        }

        public function get_libros(){
            $db = Connect::Conectar()->prepare("SELECT * FROM libro inner join autor on libro.IdAutor = autor.Id");
            $db->execute();
            if($db->rowCount()>=0){
                try{
                    require_once("../Views/AdminLibro.php");
                    while($row = $db->fetch()):
                        return;
                    endwhile;
                }catch(PDOEXception $e){
                    echo $e->getMessage();
                    die();
                }
            }
            return $this->libro;
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

        public function obtener_autores()
        {
            $db = Connect::Conectar()->prepare("SELECT * FROM autor");
            $db->execute();
            $autores = $db->fetchAll(PDO::FETCH_ASSOC);
            $json_autores = json_encode($autores);

            // Establece las cabeceras HTTP para indicar que la respuesta es JSON
            header('Content-Type: application/json');
        
            // Imprime la respuesta JSON
            echo $json_autores;
        }

    }
?>