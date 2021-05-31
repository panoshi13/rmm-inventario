<?php if(isset($_SESSION['verify'])) :?>
    <h1>Pedido</h1>
    <a href="<?=base_url?>carrito/index">Ver los productos y el precio del pedido</a>
    <br><br>
    <h3>Direccion para el envio</h3>
    <form action="<?=base_url?>pedido/add" method="post">
        <label for="provincia">Provincia</label>
        <input type="text" name="provincia" required>

        <label for="ciudad">Ciudad</label>
        <input type="text" name="localidad" required>

        <label for="ciudad">Direccion</label>
        <input type="text" name="direccion" required>

        <input type="submit" value="Confirmar pedido">
    </form>
<?php else:?>
    <h1>Necesitas estar identificado</h1>
    <p>Necesitas estar logeado para realizar la compra</p>
<?php endif?>