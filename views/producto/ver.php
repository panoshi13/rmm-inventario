<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand display-1" href="<?=base_url?>"><img src="<?= base_url ?>/assets/img/logo.JPG"></img></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?=base_url?>"><strong>Inicio</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><strong>Conócenos</strong></a>
                </li>
            </ul>
            <ul class="d-flex navbar-nav">

                <!--  -->
                <?php if (isset($_SESSION['verify'])) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <strong>Bienvenid@ <?= $_SESSION['verify']->nombre ?></strong>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?= base_url ?>usuario/informacion">Información</a></li>
                            <li><a class="dropdown-item" href="<?= base_url ?>usuario/nuevaCompra">Nueva compra</a></li>
                            <li><a class="dropdown-item" href="<?= base_url ?>usuario/historial">Historial</a></li>
                            <li><a class="dropdown-item" href="<?= base_url ?>usuario/logout">Cerrar Sesion</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <strong>Iniciar sesion</strong>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?= base_url ?>usuario/singinc">Cliente</a></li>
                            <li><a class="dropdown-item" href="<?= base_url ?>usuario/singinr">Repartidor</a></li>
                        </ul>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>

<?php if (isset($product)) : ?>
    <div class="mt-5 container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($product as $value) :?>
            <div class="col">
                <div class="card shadow bg-body rounded" >
                    <img src="<?=base_url?>assets/img/<?=$value['imagen']?>" class="card-img-topp" alt="...">
                    <div class="card-body text-center">
                        <a class="btn btn-secondary card-title" href="<?=base_url?>producto/ver&id=<?=$value['id']?>"><?=$value['nombre']?></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php else : ?>
    <h1>No existe el producto</h1>
<?php endif ?>


