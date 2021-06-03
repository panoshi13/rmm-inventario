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
                                <div class="col d-flex align-items-center justify-content-center ">
                                <p class="bg-info rounded-3 card-title p-1">Stock: <?=$value['stock']?></p>
                                </div>
                                <div class="col">
                                <button class="btn btn-danger card-title" id="carrito" data-id="<?=$value['id']?>">Añadir a carrito</button>
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
