<div class="container">
<h2>Historial</h2>
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>N° Pedido</th>
                <th>Coste</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($ped = $pedidos->fetch_object()) : ?>
                <tr>
                    <td><a href="<?= base_url ?>pedido/detalle&id=<?= $ped->id ?>"><?= $ped->id ?></a></td>
                    <td>S/.<?= $ped->coste ?></td>
                    <td><?= $ped->fecha ?></td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</div>