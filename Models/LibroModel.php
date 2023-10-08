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
            $this->idAutorU = $parametros["idAutorU"];
        }

        public function create_libro(){
            try{
                $db = Connect::Conectar()->prepare("INSERT INTO libro (codigo, titulo, isbn, editorial, paginas, idautor) VALUES ('$this->codigo', '$this->titulo' , '$this->isbn', '$this->editorial', '$this->paginas', '$this->idAutor')");
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

        public function delete_libro(){
            $db = Connect::Conectar()->prepare("DELETE FROM libro WHERE codigo='".$this->codigo."'");
            $res = $db->execute();
            if($res){
                $this->get_libros();
            }else{
                return false;
            }
        }

        public function update_libro(){
            $db = Connect::Conectar()->prepare("UPDATE libro SET  Titulo='".$this->titulo." ', ISBN='".$this->isbn." ', Editorial='".$this->editorial." ', Paginas='".$this->paginas." ', IdAutor='".$this->idAutorU." ' where codigo='".$this->codigo."' ");
            $res = $db->execute();
            if($res){
                $this->get_libros();
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
            header('Content-Type: application/json');
            echo $json_autores;
        }

    }
?>