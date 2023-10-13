<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="/Assets/css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <!-- Content here -->
        <div id="titulo">
            <h1>Sistema de Bibliotecas</h1>
        </div>
        
    <nav class="navbar navbar-expand-lg navbar navbar-light" style="background-color: cadetblue;">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="https://www.iudigital.edu.co/images/11.-IU-DIGITAL.png" alt="Logo" width="60%" height="80%" class="d-inline-block align-text-top">
          </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Inicio</a>
            </li>
            <li class="nav-item">
              <form action="Controlador.php" method="post" class="row g-3">
                <div class="col-12">
                    <input type="hidden" name="Clase" value="AutorModel">
                    <input type="hidden" name="Funcion" value="get_autores">
                    <input type="hidden" name="id" value="">
                    <input type="hidden" name="nombre" value="">
                    <input type="hidden" name="apellido" value="">
                    <button type="submit" class="btn btn-link" style="color: black;" name="Boton">Admin Autor </button>
                </div>
                </form>            
            </li>
            <li class="nav-item">
              <form action="Controlador.php" method="post" class="row g-3">
                <div class="col-12">
                    <input type="hidden" name="Clase" value="LibroModel">
                    <input type="hidden" name="Funcion" value="get_libros">
                    <input type="hidden" name="codigo" value="">
                    <input type="hidden" name="titulo" value="">
                    <input type="hidden" name="isbn" value="">
                    <input type="hidden" name="editorial" value="">
                    <input type="hidden" name="paginas value="">
                    <input type="hidden" name="idAutor" value="">
                    <input type="hidden" name="idAutorU" value="">
                    <button type="submit" class="btn btn-link" style="color: black;" name="Boton">Admin Libro </button>
                </div>
                </form>            
            </li>
            
            <li class="nav-item">
              <form action="Controlador.php" method="post" class="row g-3">
                <div class="col-12">
                    <input type="hidden" name="Clase" value="EjemplarModel">
                    <input type="hidden" name="Funcion" value="get_ejemplar">
                    <input type="hidden" name="codigo" value="">
                    <input type="hidden" name="localizacion" value="">
                    <input type="hidden" name="idlibro" value="">
                    <input type="hidden" name="idlibroU" value="">
                    <button type="submit" class="btn btn-link" style="color: black;" name="Boton">Admin Ejemplar </button>
                </div>
                </form>            
            </li>
            <li class="nav-item">
              <form action="Controlador.php" method="post" class="row g-3">
                <div class="col-12">
                    <input type="hidden" name="Clase" value="UsuarioModel">
                    <input type="hidden" name="Funcion" value="get_usuarios">
                    <input type="hidden" name="codigo" value="">
                    <input type="hidden" name="nombre" value="">
                    <input type="hidden" name="telefono" value="">
                    <input type="hidden" name="direccion" value="">
                    <button type="submit" class="btn btn-link" style="color: black;" name="Boton">Admin Usuario </button>
                </div>
                </form>       
            </li>
            <li class="nav-item">
              <form action="Controlador.php" method="post" class="row g-3">
                <div class="col-12">
                    <input type="hidden" name="Clase" value="ConsultasModel">
                    <input type="hidden" name="Funcion" value="get_ConsultaPrestamo">
                    <input type="hidden" name="IdUsuario" value="">
                    <button type="submit" class="btn btn-link" style="color: black;" name="Boton">Consulta Préstamos </button>
                </div>
                </form>            
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search">
              <button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button>
          </form>
     
       <br>
        </div>
      </div>
    </nav>
        <!-- Contenido -->