<?php
require_once("../Config/database.php");
require '../Librerias/fpdf186/fpdf.php';


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

        public function cargarPDF() {
            $pdf = new FPDF();
            $pdf->AddPage();
    
            // Agregar contenido al PDF
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(0, 10, 'Hola Mundo', 0, 1);


            // Configurar los encabezados para la respuesta
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="prueba.pdf"');

    
// Configurar la ubicación para guardar el PDF
$pdfPath = '../Archivos/exportpdf.pdf';

// Generar el PDF y guardarlo en la ubicación especificada
$pdf->Output($pdfPath, 'F');


    }

    // public function reemplazarContenidoPDF() {
    //         // Ruta completa al archivo PDF existente
    //         $pdfPath = '/Archivos/exportpdf.pdf';
    
    //         // Crear un objeto FPDF
    //         $pdf = new FPDF();
    //         $pdf->AddPage();
    
    //         // Agregar el nuevo contenido
    //         $pdf->SetFont('Arial', '', 12);
    //         $pdf->Cell(0, 10, 'Hola Mundo', 0, 1);
    
    //         // Generar el PDF con el nuevo contenido
    //         $pdf->Output($pdfPath, 'F');
    
    //         // Verificar si la generación del PDF fue exitosa
    //         if (file_exists($pdfPath)) {
    //             return 'Contenido del PDF reemplazado con éxito.';
    //         } else {
    //             return 'Error al reemplazar el contenido del PDF.';
    //         }
    //     }
              
    }
?>