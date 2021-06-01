<div class="m-0 vh-100 row justify-content-center align-items-center bg-light">
    <div class="col-auto bg-white p-5 shadow-sm p-3 mb-5 bg-white rounded" style="width: 500px">
        <h3>Bienvenido a RMM</h3>
        <br>
        <form action="<?= base_url ?>usuario/loginc" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1" style="font-family: sans-serif;">Correo</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese correo" name="email">
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputPassword1" style="font-family: sans-serif;">Contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Ingrese Contraseña" name="password">
            </div>
            <br>

            <a class="form-check-label" for="" href="<?=base_url?>usuario/registro" style="font-family: sans-serif;">¿Desea registrar una cuenta?</a>
            <br>
            <button type="submit" class="btn btn-primary btn-lg btn-block" name="btnIniciar" style="font-family: sans-serif;">Ingresar</button>
        </form>
        <br>
        <?php if (isset($_SESSION['error-login'])) : ?>
            <div class="alert alert-danger" role="alert">
                    <?=$_SESSION['error-login']?> 
            </div>
        <?php endif ?>

        <?php unset($_SESSION['error-login'])?>
    </div>
</div>