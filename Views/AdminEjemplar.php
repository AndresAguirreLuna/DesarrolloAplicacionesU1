<?php
    require_once("templates/header.php");
?>
<div class="table-responsive">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarejemplar">Agregar Ejemplar</button>
    <br><br>
    <table border="1" width="80%" class="table table-striped">
        <thead>
            <tr class="table-primary">
                <th>Codigo</th>
                <th>Localización</th>
                <th>Id Libro</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $db->fetch()):?>
                <tr>
                    <th><?php echo $row[0]; ?></th>
                    <th><?php echo $row[1]; ?></th>
                    <th><?php echo $row[2]; ?></th>
                    <th><button type="button" class="btn btn-warning" value="<?php echo $row[0]; ?>" name="EditarEjemplar" data-bs-toggle="modal" data-bs-target="#exampleModal" class="modalEditar" >Editar</button></th>
                    <th><a class="btn btn-danger" href="../Controllers/Controlador.php?C=EjemplarModel&F=delete_ejemplares&Parametro=1&codigo=no&localizacion=ap&id=<?php echo $row[0]; ?>">Borrar</a></th>
                </tr>
            <?php endwhile;?>
        </tbody>
    </table>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Ejemplar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../Controllers/Controlador.php" method="post">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Código:</label>
            <input type="text" class="form-control" id="codigo" name="Codigo">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Localización:</label>
            <input type="text" class="form-control" id="localizacion" name="Localizacion"></textarea>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Id Libro:</label>
            <input type="text" class="form-control" id="IdLibro" name="IdLibro"></textarea>
          </div>
          <div class="mb-3">
            <input type="hidden" name="Clase" value="EjemplarModel">
            <input type="hidden" name="Funcion" value="update_ejemplar">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" name="Boton">Actualizar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="agregarEjemplar" tabindex="-1" aria-labelledby="agregarEjemplar" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="agregarEjemplar">Agregar Ejemplar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../Controllers/Controlador.php" method="post">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Codigo:</label>
            <input type="text" class="form-control" id="codogo" name="codigo">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Localización:</label>
            <input type="text" class="form-control" id="localizacion" name="localización"></textarea>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Id Libro:</label>
            <input type="text" class="form-control" id="IdLibro" name="IdLibro"></textarea>
          </div>
          <div class="mb-3">
            <input type="hidden" name="Clase" value="EjemplarModel">
            <input type="hidden" name="Funcion" value="create_Ejemplar">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-success" name="Boton">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
    require_once("templates/footer.php");
?>