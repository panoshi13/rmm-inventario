<?php if (isset($edit)) : ?>
    <h1>Editar producto <?= $pro->nombre ?></h1>
    <?php $url_action = base_url . "producto/save&id=".$pro->id; ?>
<?php else : ?>
    <h1>Crear nuevo producto</h1>
    <?php $url_action = base_url . "producto/save" ?>
<?php endif ?>

<div class="form_container">
    <form action=<?= $url_action ?> method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="<?= isset($pro) ? $pro->nombre : '' ?>" required>

        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion" required><?= isset($pro) ? $pro->descripcion : '' ?></textarea>

        <label for="precio">Precio</label>
        <input type="number" name="precio" value="<?= isset($pro) ? $pro->precio : '' ?>" required>

        <label for="stock">Stock</label>
        <input type="number" name="stock" value="<?= isset($pro) ? $pro->stock : '' ?>" required>

        <label for="categoria">Categoria</label>
        <select name="categoria">
            <?php $categorias = Utils::showCategorias() ?>
            <?php while ($cat = $categorias->fetch_object()) : ?>
                <option value="<?= $cat->id ?>" <?= isset($pro) && $cat->id == $pro->categoria_id ?  'selected' : '' ?>>
                    <?= $cat->nombre ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="imagen">Imagen</label>
        <?php if (isset($pro) && !empty($pro->imagen)) : ?>
            <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" alt="imagen de polo de adidas" class="thumb">
        <?php endif ?>
        <input type="file" name="imagen">

        <input type="submit" value="Guardar">
    </form>
</div>