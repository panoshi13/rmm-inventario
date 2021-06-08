<div class="container">
    <h1>Detalle del pedido</h1>
    <?php if (isset($pedido)) : ?>
        <h3>Datos del pedido:</h3>
        <!-- Estado: // Utils::showStatus($pedido->estado) ?><br> -->
        Numero del pedido: <?= $pedido->id ?> <br>
        Total a pagar: <?= $pedido->coste ?> <br>
        Productos: <br>
        <table class="table text-center">
            <tr>
                <th>IMAGEN</th>
                <th>NOMBRE</th>
                <th>PRECIO</th>
                <th>UNIDADES</th>
            </tr>
            <?php while ($producto = $productos->fetch_object()) : ?>
                <tr>
                    <td>
                        <?php if ($producto->imagen != null) : ?>
                            <img class="card-img-topp" src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>">
                        <?php else : ?>
                            <img class="card-img-topp" src="<?= base_url ?>assets/img/camiseta.png">
                        <?php endif ?>
                    </td>
                    <td><a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>"><?= $producto->nombre ?></a></td>
                    <td><?= $producto->precio ?></td>
                    <td><?= $producto->unidades ?></td>
                </tr>
            <?php endwhile ?>
        </table>
    <?php endif ?>
</div>