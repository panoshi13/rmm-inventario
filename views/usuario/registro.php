<div class="m-0 vh-100 row justify-content-center align-items-center bg-light">
    <div class="col-auto bg-white p-5 shadow-sm p-3 mb-5 bg-white rounded mt-3" style="width: 570px">
        <h3>Registro de Cliente</h3>
        <br>
        <form action="<?= base_url ?>usuario/save" method="post">
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">DNI</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputEmail3" placeholder="Ingrese DNI" name="id">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Ingrese Nombre" name="nombre">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Apellidos</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Ingrese Apellidos" name="apellidos">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Correo</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Ingrese Correo" name="email">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Contraseña</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Ingrese Contraseña" name="password">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="btnRegistrar">Registrar</button>
                </div>
            </div>
        </form>
        <br>
        <?php if ( isset($_SESSION['register']) &&  $_SESSION['register'] == 'failed') : ?>
            <div class="alert alert-danger" role="alert">
                Complete los datos correctamente
            </div><br>
        <?php endif ?>
        <?php if (isset($_SESSION['errores'])) : ?>
            <div class="alert alert-danger" role="alert">
                <?php foreach ($_SESSION['errores'] as  $value):?>
                    <?=$value?>
                <?php endforeach; ?>  
            </div>
        <?php endif ?>

        <?php unset($_SESSION['errores'])?>
        <?php unset($_SESSION['register'])?>
    </div>
</div>
</div>