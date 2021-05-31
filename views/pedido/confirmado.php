<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete') : ?>
    <h1>Tu pedido se ha confirmado</h1>
    <p>Tu pedido se ha guardado con exito, una vez que realices la transferencia
        bancaria a la cuenta 7548745487325451 con el coste del pedido sera procesado y enviado</p>
    <br>
    <?php if(isset($pedidos)):?>
    <h3>Datos del pedido:</h3>
    Numero del pedido: <?=$pedidos->id?> <br>
    Total a pagar: <?=$pedidos->coste?> <br>
    Productos: <br>
    <table>
        <tr>
            <th>IMAGEN</th>
            <th>NOMBRE</th>
            <th>PRECIO</th>
            <th>UNIDADES</th>
        </tr>
        <?php foreach ($_SESSION['carrito'] as $indice => $elemento) : ?>
            <?php $producto = $elemento['producto']; ?>

            <tr>
                <td>
                    <?php if ($producto->imagen != null) : ?>
                        <img class="carrito-producto" src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>">
                    <?php else : ?>
                        <img class="carrito-producto" src="<?= base_url ?>assets/img/camiseta.png">
                    <?php endif ?>
                </td>
                <td><a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>"><?= $producto->nombre ?></a></td>
                <td><?= $producto->precio ?></td>
                <td><?= $elemento['unidades'] ?></td>
            </tr>
        <?php endforeach ?>
    </table>
    <?php endif?>
<?php else : ?>
    <h1>Tu pedido se NO se ha confirmado</h1>
<?php endif ?>