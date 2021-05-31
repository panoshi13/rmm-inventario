<h1>Carrito de la compra</h1>
<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) : ?>
    <table>
        <tr>
            <th>IMAGEN</th>
            <th>NOMBRE</th>
            <th>PRECIO</th>
            <th>UNIDADES</th>
            <th>ELIMINAR</th>
        </tr>
        <?php foreach ($carrito as $indice => $elemento) : ?>
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
                <td>
                    
                    <a href="<?= base_url ?>carrito/up&index=<?=$indice?>" class="button-unidades">+</a>
                    <?= $elemento['unidades'] ?>
                    <a href="<?= base_url ?>carrito/down&index=<?=$indice?>" class="button-unidades">-</a>
                </td>
                <td><a href="<?= base_url ?>carrito/remove&index=<?=$indice?>" class="button-red button-carrito">Quitar Producto</a></td>
            </tr>
        <?php endforeach ?>
    </table>
    <?php $stats = Utils::statsCarrito() ?>
    <div class="carrito-total">
        <a href="<?= base_url ?>carrito/delete_all" class="button-tiny button-red">Vaciar carrito</a>
        <h3> Precio total: S/.<?= $stats['total'] ?></h3>
        <a href="<?= base_url ?>pedido/hacer" class="button-tiny">Confirmar</a>
    </div>
<?php else : ?>
    <p>No hay productos en el carrito, por favor añada productos al carrito</p>
<?php endif ?>