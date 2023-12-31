<?php
require_once("../Config/database.php");

    class EjemplarModel{

        private $db;
        private $ejemplares;
        private $id;

        public $codigo;
        public $localizacion;
        public $idlibro;
        public $idlibroU;

        public function __construct($parametros){
            $this->codigo = $parametros["codigo"];
            $this->localizacion = $parametros["localizacion"];
            $this->idlibro = $parametros["idlibro"];
            $this->idlibroU = $parametros["idlibroU"];
        }

        public function create_ejemplar(){
            try{
                $db = Connect::Conectar()->prepare("INSERT INTO ejemplares (codigo, localizacion, idlibro) VALUES ('$this->codigo', '$this->localizacion' , '$this->idlibro')");
                $db->execute();
            }catch(PDOEXception $e){
                // echo $e->getMessage();
                die();
            }
            $this->get_ejemplar();
        }

        public function get_ejemplar(){
            $db = Connect::Conectar()->prepare("SELECT * FROM ejemplares inner join libro on ejemplares.idlibro = libro.codigo");
            $db->execute();
            if($db->rowCount()>=0){
                try{
                    require_once("../Views/AdminEjemplar.php");
                    while($row = $db->fetch()):
                        return;
                    endwhile;
                }catch(PDOEXception $e){
                    // echo $e->getMessage();
                    die();
                }
            }
            return $this->ejemplares;
        }

        public function delete_ejemplar(){
            $db = Connect::Conectar()->prepare("DELETE FROM ejemplares WHERE codigo='".$this->codigo."'");
            $res = $db->execute();
            if($res){
                $this->get_ejemplar();
            }else{
                return false;
            }
        }


        public function update_ejemplar(){
            $db = Connect::Conectar()->prepare("UPDATE ejemplares SET localizacion='".$this->localizacion." ', idLibro='".$this->idlibroU." ' where codigo='".$this->codigo."' ");
            $res = $db->execute();
            if($res){
                $this->get_ejemplar();
            }else{
                return false;
            }
        }
        public function obtener_libros()
        {
            $db = Connect::Conectar()->prepare("SELECT * FROM libro");
            $db->execute();
            $libros = $db->fetchAll(PDO::FETCH_ASSOC);
            $json_libros = json_encode($libros);
            header('Content-Type: application/json');
            echo $json_libros;
        }
    }
?>