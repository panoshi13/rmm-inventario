

<h1>Registrarse</h1>
<?php if(isset($_SESSION['register']) && $_SESSION['register']=='complete'): ?>
    <strong class='alert_ok'>Registro completado correctamente</strong> 
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] =='failed'): ?>
    <strong class='alert_error'>Registro fallido, complete todos los campos</strong>
<?php endif; ?>
<?php Utils::deleteSession('register')?>
<form action="<?=base_url?>usuario/save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre"  required>
    <p class='alert_error'><?= isset($_SESSION['errores']['nombre']) ? $_SESSION['errores']['nombre'] : ''?></p>

    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos"  required>
    <p class='alert_error'><?= isset($_SESSION['errores']['apellidos']) ? $_SESSION['errores']['apellidos'] : ''?></p>

    <label for="email">Email</label>
    <input type="email" name="email"  required>
    <p class='alert_error'><?= isset($_SESSION['errores']['email']) ? $_SESSION['errores']['email'] : ''?></p>

    <label for="contraseña">Contraseña</label>
    <input type="password" name="password"  required>
    <p class='alert_error'><?= isset($_SESSION['errores']['password']) ? $_SESSION['errores']['password']: ''?></p>
    
    <input type="submit" value="Registrarse">
    <?php Utils::deleteSession('errores')?>
</form>