<div class="container pt-2">
    <div class="card text-center">
        <div class="card-header">
            Compras
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">REPUESTO</th>
                        <th scope="col">PRECIO</th>
                        <th scope="col">UNIDADES</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody id="tabla1">
                </tbody>
            </table>
            <p class="bg-success badge p-1" id="total"></p>
            <a class="btn btn-primary" href="<?=base_url?>pedido/confirmar">Confirmar compra</a>
        </div>
    </div>
</div>