

<div class="mt-5 container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($categorias as $value) :?>
            <div class="col">
                <div class="card shadow bg-body rounded" >
                    <img src="<?=base_url?>assets/img/<?=$value['imagen']?>" class="card-img-topp" alt="...">
                    <div class="card-body text-center">
                        <a class="btn btn-info card-title" href="<?=base_url?>producto/ver&id=<?=$value['id']?>"><?=$value['nombre']?></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>