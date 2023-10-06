<?php
    require_once("Views/templates/header.php");
    require_once("Config/database.php");
?>
    <?php
        $probar = Connect::Conectar();
    ?>
    <form action="Controllers/controlador.php" method="post" class="row g-3">
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" class="form-control" id="inputEmail4">
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Password</label>
        <input type="password" class="form-control" id="inputPassword4">
    </div>
    <div class="col-12">
        <label for="inputAddress" class="form-label">Address</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
    </div>
    <div class="col-12">
        <label for="inputAddress2" class="form-label">Address 2</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
    </div>
    <div class="col-md-6">
        <label for="inputCity" class="form-label">City</label>
        <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="col-md-4">
        <label for="inputState" class="form-label">State</label>
        <select id="inputState" class="form-select">
        <option selected>Choose...</option>
        <option>...</option>
        </select>
    </div>
    <div class="col-md-2">
        <label for="inputZip" class="form-label">Zip</label>
        <input type="text" class="form-control" id="inputZip">
    </div>
    <div class="col-12">
        <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck">
        <label class="form-check-label" for="gridCheck">
            Check me out
        </label>
        </div>
    </div>
    <div class="col-12">
        <input type="hidden" name="Clase" value="EditorialModels">
        <input type="hidden" name="Funcion" value="get_editoriales">
        <input type="hidden" name="nombre" value="">
        <input type="hidden" name="codigo" value="">
        <button type="submit" class="btn btn-primary" name="Boton">Sign in</button>
    </div>
    </form>
    
<?php
    require_once("Views/templates/footer.php");
?>