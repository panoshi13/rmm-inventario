<!--BARRA LATERAL-->
<aside id="lateral">
    <div id="login" class="block_aside">
        <h3>Mi carrito</h3>
        <ul>
            <?php $stats = Utils::statsCarrito() ?>
            <li><a href="<?= base_url ?>carrito/index">Productos (<?= $stats['count'] ?>)</a></li>
            <li><a href="<?= base_url ?>carrito/index">Total: <?= $stats['total'] ?></a></li>
            <li><a href="<?= base_url ?>carrito/index">Ver el carrito</a></li>
        </ul>
    </div>

    <div id="login" class="block_aside">

        <?php if (!isset($_SESSION['verify'])) : ?>
            <h3>Entrar a la web</h3>
            <form action="<?= base_url ?>usuario/login" method="post">
                <label for="email">Email</label>
                <input type="email" name="email">
                <label for="password">Contraseña</label>
                <input type="password" name="password">
                <input type="submit" value="Enviar">
            </form>
        <?php else : ?>
            <h3><?= $_SESSION['verify']->nombre ?>, <?= $_SESSION['verify']->apellido ?></h3>
        <?php endif ?>
        <ul>

            <?php if (isset($_SESSION['admin'])) : ?>
                <li><a href="<?= base_url ?>categoria/index">Gestionar categorias</a></li>
                <li><a href="<?= base_url ?>producto/gestion">Gestionar productos</a></li>
                <li><a href="<?= base_url ?>pedido/gestion">Gestionar pedidos</a></li>
                <li><a href="<?= base_url ?>pedido/mis_pedidos">Mis pedidos</a></li>
                <li><a href="<?= base_url ?>usuario/logout">Cerrar Sesion</a></li>
            <?php elseif (isset($_SESSION['verify'])) : ?>
                <li><a href="<?= base_url ?>pedido/mis_pedidos">Mis pedidos</a></li>
                <li><a href="<?= base_url ?>usuario/logout">Cerrar Sesion</a></li>
            <?php else : ?>
                <li><a href="<?= base_url ?>usuario/registro">Registrarse</a></li>
            <?php endif ?>
        </ul>
    </div>
</aside>
<!--CONTENIDO CENTRAL-->
<div id="central">