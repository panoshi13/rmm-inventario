<?php
require_once 'models/usuario.php';
class usuarioController
{
    public function index()
    {
        echo "Controlador Usuarios, Accion index";
    }
    public function registro()
    {
        require_once 'views/usuario/registro.php';
    }
    public function save()
    {
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $contraseña = isset($_POST['password']) ? $_POST['password'] : '';

            $error = array();

            if ($nombre && $apellidos && $email && $contraseña) {

                //validacion
                if (!preg_match(("/[0-9]/"), $nombre)) {
                    $nombre_validado = true;
                } else {
                    $nombre_validado = false;
                    $error['nombre'] = "Solo se permite letras";
                }

                if (!preg_match(("/[0-9]/"), $apellidos)) {
                    $apellidos_validado = true;
                } else {
                    $apellidos_validado = false;
                    $error['apellidos'] = "Solo se permite letras";
                }

                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $email_validado = true;
                } else {
                    $email_validado = false;
                    $error['email'] = "Digite un email correcto";
                }

                if (strlen($contraseña) > 5) {
                    $contraseña_validado = true;
                } else {
                    $contraseña_validado = false;
                    $error['password'] = "La contraseña tiene que ser superior a 5 digitos";
                }

                if (count($error) == 0) {
                    //asignar los datos a las variables
                    $usuario = new Usuario();
                    $usuario->setNombre($nombre);
                    $usuario->setApellidos($apellidos);
                    $usuario->setEmail($email);
                    $usuario->setContraseña($contraseña);
                    //ejectuar la accion
                    $save = $usuario->save();
                    if ($save) {
                        $_SESSION['register'] = "complete";
                    } else {
                        $_SESSION['register'] = "failed";
                    }
                } else {
                    $_SESSION['errores'] = $error;
                }
            } else {
                $_SESSION['register'] = "failed";
            }
        } else {
            $_SESSION['register'] = "failed";
        }
        Header("Location:" . base_url . "usuario/registro");
    }

    public function login()
    {
        if (isset($_POST)) {

            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setContraseña($_POST['password']);

            //ejecutar el metodo del modelo
            $identify = $usuario->login();
            if ($identify && is_object($identify)) {
                $_SESSION['verify'] = $identify;

                if ($identify->rol == 'admin') {
                    $_SESSION['admin'] = true;
                }
            } else {
                $_SESSION['error-login'] = "Error al iniciar_sesion.php";
            }
        }
       Header("location: " . base_url);
    }

    public function logout()
    {
        if (isset($_SESSION['verify'])) {
            unset($_SESSION['verify']);
        }

        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }

        Header("location: " . base_url);
    }
}
