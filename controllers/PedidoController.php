<?php
require_once 'models/pedido.php';


class pedidoController
{
    public function hacer()
    {
        require_once "views/pedido/hacer.php";
    }

    public function add()
    {
        if (isset($_SESSION['verify'])) {
            $usuario_id = $_SESSION['verify']->id;
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $stast = Utils::statsCarrito();
            $coste = $stast['total'];


            if ($provincia && $localidad && $direccion) {
                $pedido = new Pedido();
                $pedido->setUsuarioId($usuario_id);
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste);

                $save = $pedido->save();

                $save_linea = $pedido->save_linea();
                if ($save && $save_linea) {
                    echo  $_SESSION['pedido'] = 'complete';
                } else {
                    echo  $_SESSION['pedido'] = 'failed';
                }
            } else {
                $_SESSION['pedido'] = 'failed';
            }
            //siempre tiene que existir el controlador(clase)/metodo respectivamente
            header("location:" . base_url . 'pedido/confirmado');
        } else {
            header("location:" . base_url);
        }
    }
    public function confirmado()
    {
        if (isset($_SESSION['verify'])) {
            $id = $_SESSION['verify'];
            $pedido = new Pedido();
            $pedidos = $pedido->getLineasPedidos($id->id);
        }
        require_once 'views/pedido/confirmado.php';
    }

    public function mis_pedidos()
    {
        Utils::isVerify();
        $id = $_SESSION['verify']->id;
        $pedido = new Pedido();
        $pedidos = $pedido->getMisPedidos($id);
        require_once 'views/pedido/mis_pedidos.php';
    }
    public function detalle()
    {
        Utils::isVerify();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            //sacar el pedido
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido = $pedido->getOne();

            //sacar los productos
            $pedido_producto = new Pedido();
            $productos = $pedido_producto->getProductosByPedido($id);
            require_once 'views/pedido/detalle.php';
        } else {
            header("location:" . base_url . 'pedido/mis_pedidos.php');
        }
    }

    public function gestion()
    {
        Utils::isAdmin();
        $gestion = true;
        $pedido = new Pedido();
        $pedidos = $pedido->getAll();
        require_once 'views/pedido/mis_pedidos.php';
    }

    public function estado()
    {
        Utils::isAdmin();
        if (isset($_POST['pedido_id']) && isset($_POST['estado'])) {
            $id = $_POST['pedido_id'];
            $estado = $_POST['estado'];

            //update de los datos
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido->setEstado($estado);
            $pedido->edit();

            header("location:" . base_url . 'pedido/detalle&id=' . $id);
        } else {
            header("location:" . base_url);
        }
    }
}
