<h1>Gestionar Productos</h1>

<a href="<?= base_url ?>producto/crear" class="button button-small">Crear Productos</a>

<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete') : ?>
    <strong class="alert_ok">El producto se agregó con exito</strong>
<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] !== 'complete') : ?>
    <strong class="alert_error">El producto NO se pudo agregar con exito</strong>
<?php endif ?>
<?php Utils::deleteSession('producto') ?>

<?php if (isset($_SESSION['deleted']) && $_SESSION['deleted'] == 'complete') : ?>
    <strong class="alert_ok">El producto se Eliminó con exito</strong>
<?php elseif (isset($_SESSION['deleted']) && $_SESSION['deleted'] !== 'complete') : ?>
    <strong class="alert_error">El producto NO se pudo eliminar con exito</strong>
<?php endif ?>
<?php Utils::deleteSession('deleted') ?>
<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>
        <th>ACCIONES</th>
    </tr>

    <?php while ($prod = $productos->fetch_object()) : ?>
        <tr>
            <td><?= $prod->id ?></td>
            <td><?= $prod->nombre ?></td>
            <td><?= $prod->precio ?></td>
            <td><?= $prod->stock ?></td>
            <td>
                <a href="<?= base_url ?>producto/editar&id=<?= $prod->id ?>" class="button button-gestion">Editar</a>
                <a href="<?= base_url ?>producto/eliminar&id=<?= $prod->id ?>" class="button button-gestion button-red">Eliminar</a>
            </td>
        </tr>
    <?php endwhile ?>
</table>