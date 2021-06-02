<div class="m-0  row justify-content-center align-items-center bg-light">
    <div class="col-auto bg-white p-5 shadow-sm p-3 mb-5 bg-white rounded mt-3" style="width: 500px">
        <h3>Registrar nuevo producto</h3>
        <form action=producto/save method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nombre" required placeholder="Ingrese nombre de producto">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>

                <select name="categoria" class="form-select" aria-label="Seleccione una maquina">
                <option selected disabled>Seleccione una maquina</option>
                    <?php foreach ($categorias as $value) : ?>
                        <option value="<?= $value['id'] ?>"><?= $value['nombre'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" name="precio" class="form-control" id="exampleFormControlInput1" name="nombre" required placeholder="Ingrese precio de producto">
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" id="exampleFormControlInput1" name="nombre" required placeholder="Ingrese Stock de producto">
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input class="form-control" type="file" name="imagen" id="formFile">
            </div>
            <input type="submit" class="btn btn-primary" value="Guardar">
        </form>

    </div>
</div>