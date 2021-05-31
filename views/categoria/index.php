<h1>Gestionar Categorias</h1>

<a href="<?=base_url?>categoria/crear" class="button button-small">Crear Categoria</a>

<?php if (isset($_SESSION['categoria']) && $_SESSION['categoria'] == 'complete') : ?>
    <strong class="alert_ok">La categoria se agregó con exito</strong>
<?php elseif (isset($_SESSION['categoria']) && $_SESSION['categoria'] !== 'complete') : ?>
    <strong class="alert_error">La categoria NO se pudo agregar con exito</strong>
<?php endif ?>
<?php Utils::deleteSession('categoria') ?>

<?php if (isset($_SESSION['deleted']) && $_SESSION['deleted'] == 'complete') : ?>
    <strong class="alert_ok">La categoria se Eliminó con exito</strong>
<?php elseif (isset($_SESSION['deleted']) && $_SESSION['deleted'] !== 'complete') : ?>
    <strong class="alert_error">La categoria NO se pudo eliminar con exito</strong>
<?php endif ?>
<?php Utils::deleteSession('deleted') ?>


<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>ACCIONES</th>
    </tr>

    <?php while ($cat = $categorias->fetch_object()) : ?>
        <tr>
            <td><?= $cat->id ?></td>
            <td><?= $cat->nombre ?></td>
            <td>
                <a href="<?= base_url ?>categoria/editar&id=<?= $cat->id ?>" class="button button-gestion">Editar</a>
                <a href="<?= base_url ?>categoria/eliminar&id=<?= $cat->id ?>" class="button button-gestion button-red">Eliminar</a>
            </td>
        </tr>
    <?php endwhile ?>
</table>