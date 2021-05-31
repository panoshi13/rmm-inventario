<h1>Crear nueva categria</h1>
<?php if (isset($edit)) : ?>
    <?php $base_url = base_url . "categoria/save&id=" . $cat->id; ?>
<?php else : ?>
    <?php $base_url = base_url . "categoria/save"; ?>
<?php endif ?>
<form action="<?=$base_url?>" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="categoria" value="<?= isset($cat) ? $cat->nombre : false ?>" required>

    <input type="submit" value="Guardar">
</form>