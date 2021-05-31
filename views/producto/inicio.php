<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand display-1" href="catalogoUsuario.jsp"><img src="<?=base_url?>/assets/img/logo.JPG"></img></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="catalogoUsuario.jsp"><strong>Inicio</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="conocenos.jsp"><strong>Conócenos</strong></a>
                </li>
            </ul>
            <ul class="d-flex navbar-nav">
                <!-- <li class="nav-item"><a href="catalogoUsuario.jsp?cerrar=true" class="nav-link">Cerrar Sesion</a></li> -->
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <strong>Iniciar Sesion</strong>
                    </a>

                    <!-- <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="iniciarSesion.jsp">Cliente</a></li>
                        <li><a class="dropdown-item" href="iniciarSesionRepartidor.jsp">Repartidor</a></li>
                    </ul> -->
                </li>

            </ul>
        </div>
    </div>
</nav>

<br>

<div id="carouselExampleIndicators" class="carousel slide container border border-light rounded" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?=base_url?>/assets/img/slider1.jpeg" style="height: 500px;" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="<?=base_url?>/assets/img/slider2.jpeg" style="height: 500px;" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="<?=base_url?>/assets/img/slider3.jpeg" style="height: 500px;" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>