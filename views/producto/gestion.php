<div class="container">
    <h1>Gestionar Productos</h1>

    <a href="<?= base_url ?>producto/crear" class="h5">Crear Productos</a>
    <br>   

    <?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete') : ?>
        <div class="alert alert-success" role="alert">
            <strong>El producto se agregó con exito</strong>
        </div>
    <?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] !== 'complete') : ?>
        <div class="alert alert-danger" role="alert">
            <strong>El producto NO se agregó con exito</strong>
        </div>
    <?php endif ?>
    <?php Utils::deleteSession('producto') ?>

    <?php if (isset($_SESSION['deleted']) && $_SESSION['deleted'] == 'complete') : ?>
        <div class="alert alert-primary" role="alert">
            <strong>El producto se eliminó con exito</strong>
        </div>
    <?php elseif (isset($_SESSION['deleted']) && $_SESSION['deleted'] !== 'complete') : ?>
        <div class="alert alert-danger" role="alert">
            <strong>El producto NO se eliminó con exito</strong>
        </div>
    <?php endif ?>
    <?php Utils::deleteSession('deleted') ?>



    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">PRECIO</th>
                <th scope="col">STOCK</th>
                <th scope="col">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($prod = $productos->fetch_object()) : ?>
                <tr>
                    <td><?= $prod->id ?></td>
                    <td><?= $prod->nombre ?></td>
                    <td><?= $prod->precio ?></td>
                    <td><?= $prod->stock ?></td>
                    <td>
                        <a href="<?= base_url ?>producto/editar&id=<?= $prod->id ?>" class="btn btn-warning">Editar</a>
                        <a href="<?= base_url ?>producto/eliminar&id=<?= $prod->id ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</div>