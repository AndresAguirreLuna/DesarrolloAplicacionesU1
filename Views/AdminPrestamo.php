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
    <br><br>
<table  id="tableToExport" width="80%" class="table table-striped">
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
<button type="button" class="btn btn-primary" id="exportCSV" name="generarPDF">Exportar</button>

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

    $('#exportCSV').click(function() {
    // Obtén la referencia a la tabla
    var table = document.getElementById("tableToExport");

    // Inicializa una variable para almacenar los datos CSV
    var csvData = [];

    // Itera a través de las filas de la tabla
    for (var i = 0; i < table.rows.length; i++) {
        var rowData = [];
        var cells = table.rows[i].cells;

        // Itera a través de las celdas de la fila
        for (var j = 0; j < cells.length; j++) {
            // Agrega el contenido de la celda al arreglo
            rowData.push(cells[j].innerText);
        }

        // Convierte la fila de datos a una cadena CSV
        var rowCSV = rowData.join(',');

        // Agrega la fila CSV al arreglo principal
        csvData.push(rowCSV);
    }

    // Convierte el arreglo CSV en una sola cadena de texto
    var csvContent = "data:text/csv;charset=utf-8," + csvData.join('\n');

    // Crea un enlace para descargar el archivo CSV
    var encodedUri = encodeURI(csvContent);
    var link = document.createElement('a');
    link.setAttribute('href', encodedUri);
    link.setAttribute('download', 'tabla.csv');

    // Simula un clic en el enlace para descargar el archivo
    link.click();
});


});
</script>

<?php
    require_once("templates/footer.php");
?>