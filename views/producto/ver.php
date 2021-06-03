<?php if (isset($product)) : ?>
    <div class="mt-5 container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($product as $value) : ?>
                <div class="col">
                    <div class="card shadow bg-body rounded">
                        <img src="<?= base_url ?>uploads/images/<?= $value['imagen'] ?>" class="card-img-topp" alt="...">
                        <div class="card-body text-center">
                            <h4><?= $value['nombre'] ?></h4>
                            <p><?= $value['descripcion'] ?></p>
                            <div class="row">
                                <div class="col">
                                <a class="btn btn-info card-title" href="<?= base_url ?>producto/ver&id=<?= $value['id'] ?>">Stock: <?=$value['stock']?></a>
                                </div>
                                <div class="col">
                                <a class="btn btn-danger card-title" id="carrito" data-carrito="<?=$value['id']?>">Añadir a carrito</a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php else : ?>
    <h1>No existe el producto</h1>
<?php endif ?>

<btn class="btn btn-danger card-title" id="boton1" data-carrito="<?=$value['id']?>">carrito</btn>