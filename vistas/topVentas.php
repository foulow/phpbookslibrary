<?php
    $topVentas = $_libreria->obtenerLibrosMasVendidos($_cantidadL);
    if ($topVentas === false) die();
?>
<div class="col-sm-4">
    <h4 class="text-center"><?php echo "Top $_cantidadL libros más vendidos"; ?></h4>
    <table class="table table-sm table-hover">
        <!-- <caption>lista de libros</caption> -->
        <thead>
            <tr>
                <th scope="col">Cantidad</th>
                <th scope="col">Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($topVentas as $libro) {
                    echo "<tr>";
                    echo "<th scope='row'>". $libro[0] ."</th><td>". $libro[1] ."</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>