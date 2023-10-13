<?php
    require_once("templates/header.php");
?>
<div class="table-responsive">
<form action="Controlador.php" method="post">
<input type="hidden" name="Clase" value="ConsultasModel">         
<input type="hidden" name="Funcion" value="get_ConsultaPrestamoUsuario">
<select id="IdUsuario" name="IdUsuario" class="form-control">
        </select>
    <button type="submit" class="btn btn-primary" name="Boton">Consultar</button>
    <button type="button" class="btn btn-primary" id="generarPDF" name="generarPDF">Exportar PDF</button>
    <br><br>
<table border="1" width="80%" class="table table-striped">
        <thead>
            <tr class="table-primary">
                <th>Código préstamo</th>
                <th>Usuario</th>
                <th>Libro</th>
                <th>Fecha Préstamo</th>
                <th>Devolución</th>
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
                </tr>
            <?php endwhile;?>
        </tbody>
    </table>
 </div>
</form>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
        $.ajax({
            url: '../Controllers/Controlador.php?C=ConsultasModel&F=ConsultaUsuarios&Parametro=1&IdUsuario=1',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                $.each(data, function(index, option) {
                    $('#IdUsuario').append($('<option>', {
                        value: option.Codigo,
                        text: option.Nombre
                    }));
                });
            },
            error: function() {
                alert('Error al cargar las opciones del dropdown.');
            }
    });

    $('#generarPDF').click(function() {
        // Realizar una llamada AJAX para ejecutar la función cargarAPDF en el servidor
        $.ajax({
            url: '../Controllers/Controlador.php?C=ConsultasModel&F=cargarPDF&Parametro=1&IdUsuario=1', // Ajusta la ruta al controlador o archivo PHP que maneja la lógica
            type: 'POST',
            data: { action: 'generar_pdf' }, // Puedes enviar datos adicionales si es necesario
            success: function(response) {
                // Manejar la respuesta del servidor, como abrir el PDF en una nueva ventana
                window.open('/Config/prueba.pdf', '_blank');
            }
        });
    });
});
</script>

<?php
    require_once("templates/footer.php");
?>