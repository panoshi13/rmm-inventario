<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand display-1" href="catalogoUsuario.jsp"><img src="<?= base_url ?>/assets/img/logo.JPG"></img></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= base_url?>"><strong>Inicio</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="conocenos.jsp"><strong>Conócenos</strong></a>
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
                            <li><a class="dropdown-item" href="<?= base_url ?>categoria/inicio">Nueva compra</a></li>
                            <li><a class="dropdown-item" href="<?= base_url ?>usuario/historial">Historial</a></li>
                            <li><a class="dropdown-item" href="<?= base_url ?>usuario/logout">Cerrar Sesion</a></li>
                        </ul>
                    </li>
                <?php else : ?>
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
<div class="m-0 vh-100 row justify-content-center align-items-center bg-white pb-5">
    <div class="col-auto p-5 shadow-sm  mb-5 bg-white rounded">
        <div class="card text-center">
            <div class="card-header">
                Su cuenta
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col shadow-sm d-flex flex-column bd-highlight m-1 bg-light justify-content-center">
                        <div class="p-0 bd-highlight"><i class="far fa-user-circle"></i></div>
                        <div class="p-0 bd-highlight"><a href="#" class="btn">Información</a></div>
                    </div>
                    <div class="col shadow-sm d-flex flex-column bd-highlight m-1 bg-light justify-content-center">
                        <div class="p-0 bd-highlight"><i class="fas fa-shopping-cart"></i></div>
                        <div class="p-0 bd-highlight"><a href="<?=base_url?>categoria/inicio" class="btn">Nueva compra</a></div>
                    </div>
                    <div class="col shadow-sm d-flex flex-column bd-highlight m-1 bg-light justify-content-center">
                        <div class="p-0 bd-highlight"><i class="far fa-calendar-minus"></i></div>
                        <div class="p-0 bd-highlight"><a href="#" class="btn">Historial y detalles de pedido</a></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>