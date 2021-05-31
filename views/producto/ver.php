<?php if (isset($product)) : ?>
    <h1><?= $product->nombre ?></h1>
    <div class="producto-detail">
        <div class="producto-image">
            <?php if ($product->imagen != null) : ?>
                <img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>">
            <?php else : ?>
                <img src="<?= base_url ?>assets/img/camiseta.png">
            <?php endif ?>
        </div>
        <div class="producto-caracteristicas">
            <div class="cont1">
                <h3>Descripcion</h3>
                <p><?= $product->descripcion ?></p>
            </div>
            <div class="cont1">
                <h3>Precio</h3>
                <p><?= $product->precio ?> Soles</p>
            </div>
            <a href="<?= base_url ?>carrito/add&id=<?= $product->id ?>" class="button-tiny">Comprar</a>
        </div>
    </div>
<?php else : ?>
    <h1>No existe el producto</h1>
<?php endif ?>