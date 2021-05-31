<?php if (isset($cat)) : ?>
    <h1><?= $cat->nombre ?></h1>
    <?php if ($product->num_rows == 0) : ?>
        <p>No hay productos para mostrar</p>
    <?php else : ?>
        <?php while ($pro = $product->fetch_object()) : ?>
            <div class="product">
                <a href="<?= base_url ?>producto/ver&id=<?= $pro->id ?>">
                    <?php if ($pro->imagen != null) : ?>
                        <img src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>">
                    <?php else : ?>
                        <img src="<?= base_url ?>assets/img/camiseta.png">
                    <?php endif ?>
                    <h2><?= $pro->nombre ?></h2>
                </a>
                <p><?= $pro->precio ?> Soles</p>
                <a href="<?=base_url?>carrito/add&id=<?=$pro->id?>" class="button">Comprar</a>
            </div>
        <?php endwhile ?>
    <?php endif ?>
<?php else : ?>
    <h1>La categoria no existe</h1>
<?php endif ?>