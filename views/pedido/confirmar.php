<div class="container pt-2">
    <div class="card text-center">
        <div class="card-header">
            Transacción
        </div>
        <div class="card-body">
            <h5 class="card-title">Selecciona tu método de entrega</h5>
            <p class="card-text">Para darte una mejor experiencia, indícanos tu método de entrega</p>
            <div class="row">
                <div class="col shadow-sm d-flex flex-column bd-highlight m-1 bg-light justify-content-center">
                    <div class="p-0 bd-highlight"><i class="fas fa-truck-moving"></i></div>
                    <div class="p-0 bd-highlight"><a href="#" class="btn" id="domicilio">Envío a Domicilio</a></div>
                </div>
                <div class="col shadow-sm d-flex flex-column bd-highlight m-1 bg-light justify-content-center">
                    <div class="p-0 bd-highlight"><i class="fas fa-store-alt"></i></div>
                    <div class="p-0 bd-highlight"><a href="#" class="btn" id="tienda">Recojo en Tienda</a></div>
                </div>
                <div class="col shadow-sm d-flex flex-column bd-highlight m-1 bg-light justify-content-center">
                    <div class="p-0 bd-highlight"><i class="fas fa-motorcycle"></i></div>
                    <div class="p-0 bd-highlight"><a href="#" class="btn" id="express">Delivery Express</a></div>
                </div>
            </div>
            <br>
            <div class="col-auto mx-auto" style="width: 750px">
                <form action="" method="post">
                    <div class="" id="direccion">
                        <h3>Formulario de envío</h3>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Departamento</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="departamento" placeholder="Ingrese Departamento" name="departamento">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Distrito</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="distrito" placeholder="Ingrese Distrito" name="distrito">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Direccion</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="direc" placeholder="Ingrese Direccion" name="direccion">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="tarjeta">
                    <h3>Tarjeta de crédito o débito</h3>
                    <br>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nombre de titular</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="titular" placeholder="Como aparece en la tarjeta" name="direccion" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Fecha de expiración</label>
                            <div class="col">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="expiracion" placeholder="Mes" name="direccion" required>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Año" name="direccion" required>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Número de tarjeta</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="ntarjeta" placeholder="número de la tarjeta" name="direccion" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Código de seguridad</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="codigo" placeholder="3 digitos" name="direccion" required>
                            </div>
                        </div>
                    </div>
                    <button type="button" name="" id="finCompra" class="btn btn-primary" btn-lg btn-block">Finalizar compra</button>
                </form>
            </div>
            <br>

            <?php unset($_SESSION['errores']) ?>
            <?php unset($_SESSION['register']) ?>

        </div>
    </div>
</div>