<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/59b3220ebb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= base_url ?>assets/css/estilos.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js" integrity="sha512-6ORWJX/LrnSjBzwefdNUyLCMTIsGoNP6NftMy2UAm1JBm6PRZCO1d7OHBStWpVFZLO+RerTvqX/Z9mBFfCJZ4A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>RMM</title>
</head>

<body class="bg-white">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand display-1" href="<?= base_url ?>"><img src="<?= base_url ?>/assets/img/logo.JPG"></img></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url ?>"><strong>Inicio</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><strong>Conócenos</strong></a>
                    </li>
                </ul>
                <ul class="d-flex navbar-nav">
                    <!--  -->
                    <?php if (isset($_SESSION['verify']) && !isset($_SESSION['admin'])) : ?>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-shopping-cart"></i>()
                            </button>
                            <ul class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton1">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Repuesto</th>
                                            <th>Precio</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabla">
                                        
                                    </tbody>
                                </table>
                                <p class="bg-success badge p-1" id="total"></p>
                                <br>
                                <a class="btn btn-warning" href="<?=base_url?>pedido/comprar">Pasar por caja</a>
                            </ul>
                        </div>
                        <li class="nav-item dropdown">
                            <div class="d-flex align-items-center">

                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <strong>Bienvenid@ <?= $_SESSION['verify']->nombre ?></strong>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="<?= base_url ?>usuario/informacion">Información</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url ?>categoria/inicio">Nueva compra</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url ?>usuario/historial">Historial</a></li>
                                    <li><a class="dropdown-item" href="<?= base_url ?>usuario/logout">Cerrar Sesion</a></li>
                                </ul>
                            </div>
                        </li>

                    <?php elseif (isset($_SESSION['verify']) && isset($_SESSION['admin'])) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <strong>Bienvenid@ <?= $_SESSION['verify']->nombre ?></strong>
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?= base_url ?>producto/gestion">Productos</a></li>
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