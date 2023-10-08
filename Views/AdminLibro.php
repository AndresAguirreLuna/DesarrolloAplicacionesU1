<?php
    require_once("templates/header.php");
?>
<div class="table-responsive">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarLibro">Agregar Libro</button>
    <br><br>
    <table border="1" width="80%" class="table table-striped">
        <thead>
            <tr class="table-primary">
                <th>Codigo</th>
                <th>Totulo</th>
                <th>ISBN</th>
                <th>Editorial</th>
                <th>Paginas</th>
                <th>Autor</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $db->fetch()):?>
                <tr>
                    <th><?php echo $row[0]; ?></th>
                    <th><?php echo $row[1]; ?></th>
                    <th><?php echo $row[2]; ?></th>
                    <th><?php echo $row[3]; ?></th>
                    <th><?php echo $row[4]; ?></th>
                    <th><?php echo $row[7]; ?></th>
                    <th><button type="button" class="btn btn-warning" value="<?php echo $row[0]; ?>" name="EditarLibro" data-bs-toggle="modal" data-bs-target="#exampleModal" class="modalEditar" >Editar</button></th>
                    <th><a class="btn btn-danger" href="../Controllers/Controlador.php?C=LibroModel&F=delete_libro&Parametro=1&codigo=1&titulo=t&isbn=i&editorial=e&paginas=1&idAutor=2&idAutorU=2&codigo=<?php echo $row[0]; ?>">Borrar</a></th>
                </tr>
            <?php endwhile;?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="agregarLibro" tabindex="-1" aria-labelledby="agregarLibroLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="agregarLibroLabel">Agregar Libro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../Controllers/Controlador.php" method="post">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Codigo:</label>
            <input type="text" class="form-control" id="codigo" name="codigo">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Titulo:</label>
            <input type="text" class="form-control" id="titulo" name="titulo"></textarea>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">ISBN:</label>
            <input type="text" class="form-control" id="isbn" name="isbn"></textarea>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Editorial:</label>
            <input type="text" class="form-control" id="editorial" name="editorial"></textarea>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Paginas:</label>
            <input type="text" class="form-control" id="paginas" name="paginas"></textarea>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Autor:</label>
            <select id="idAutor" name="idAutor" class="form-control">
        </select>
          </div>
          <div class="mb-3">
            <input type="hidden" name="Clase" value="LibroModel">
            <input type="hidden" name="Funcion" value="create_libro">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-success" name="Boton">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Autor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../Controllers/Controlador.php" method="post">
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Codigo:</label>
            <input type="text" class="form-control" id="codigo" name="codigo">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Titulo:</label>
            <input type="text" class="form-control" id="titulo" name="titulo"></textarea>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">ISBN:</label>
            <input type="text" class="form-control" id="isbn" name="isbn"></textarea>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Editorial:</label>
            <input type="text" class="form-control" id="editorial" name="editorial"></textarea>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Paginas:</label>
            <input type="text" class="form-control" id="paginas" name="paginas"></textarea>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Autor:</label>
            <select id="idAutorU" name="idAutorU" class="form-control">
        </select>
          <div class="mb-3">
            <input type="hidden" name="Clase" value="LibroModel">
            <input type="hidden" name="Funcion" value="update_libro">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" name="Boton">Actualizar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
        $.ajax({
            url: '../Controllers/Controlador.php?C=LibroModel&F=obtener_autores&Parametro=1&codigo=1&titulo=t&isbn=i&editorial=e&paginas=1&idAutor=2&idAutorU=2',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                $.each(data, function(index, option) {
                    $('#idAutor').append($('<option>', {
                        value: option.Id,
                        text: option.Nombre + ' ' + option.Apellido
                    }));
                    $('#idAutorU').append($('<option>', {
                        value: option.Id,
                        text: option.Nombre + ' ' + option.Apellido
                    }));
                });
            },
            error: function() {
                alert('Error al cargar las opciones del dropdown.');
            }
    });
});
</script>

<?php
    require_once("templates/footer.php");
?>