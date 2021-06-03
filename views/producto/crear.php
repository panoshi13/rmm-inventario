<div class="m-0  row justify-content-center align-items-center bg-light">
    <div class="col-auto bg-white p-5 shadow-sm p-3 mb-5 bg-white rounded mt-3" style="width: 500px">
        <?php if (isset($edit)) : ?>
            <h3>Editar producto <?= $pro->nombre ?></h3>
            <?php $url_action = base_url . "producto/save&id=" . $pro->id; ?>
        <?php else : ?>
            <h3>Crear nuevo producto</h3>
            <?php $url_action = base_url . "producto/save" ?>
        <?php endif ?>


        <form action=<?= $url_action ?> method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nombre" value="<?= isset($pro) ? $pro->nombre : '' ?>" required placeholder="Ingrese nombre de producto">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1" rows="3"><?= isset($pro) ? $pro->descripcion : '' ?></textarea>
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>

                <select name="categoria" class="form-select" aria-label="Seleccione una maquina">
                    <option selected disabled>Seleccione una maquina</option>
                    <?php $categorias = Utils::showCategorias() ?>
                    <?php while ($cat = $categorias->fetch_object()) : ?>
                        <option value="<?= $cat->id ?>" <?= isset($pro) && $cat->id == $pro->categoria_id ?  'selected' : '' ?>>
                            <?= $cat->nombre ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" name="precio" value="<?= isset($pro) ? $pro->precio : '' ?>" class="form-control" id="exampleFormControlInput1" required placeholder="Ingrese precio de producto">
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" value="<?= isset($pro) ? $pro->stock : '' ?>" class="form-control" id="exampleFormControlInput1" required placeholder="Ingrese Stock de producto">
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <?php if (isset($pro) && !empty($pro->imagen)) : ?>
                    <img src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>" alt="imagen de producto" class="img-fluid">
                <?php endif ?>
                <input class="form-control" type="file" name="imagen" id="formFile">
            </div>
            <input type="submit" class="btn btn-primary" value="Guardar">
        </form>

    </div>
</div>
