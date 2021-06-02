<?php
require_once 'models/producto.php';
require_once 'models/categoria.php';

class productoController
{
    public function index()
    {
        $producto = new Producto();
        $productos = $producto->getRandom(6);
        require_once 'views/producto/inicio.php';
    }

    public function gestion()
    {
        Utils::isAdmin();
        $producto = new Producto();
        $productos = $producto->getAll();
        require_once 'views/producto/gestion.php';
    }

    public function crear()
    {
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        require_once 'views/producto/crear.php';
    }

    /* public function ver()
    {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $product = $producto->getOne();
        }
        require_once "views/producto/ver.php";
    } */

    public function ver()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            /* $categoria = new Categoria();
            $categoria->setId($id);
            $cat = $categoria->getOneCategory(); */

            $productos = new Categoria();
            $productos->setId($id);
            $product = $productos->getCategoryXProduct();
        }
        require_once "views/producto/ver.php";
    }

    public function save()
    {
        Utils::isAdmin();
        if (isset($_POST)) {
            $nombre = isset($_POST) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST) ? $_POST['descripcion'] : false;
            $precio = isset($_POST) ? $_POST['precio'] : false;
            $stock = isset($_POST) ? $_POST['stock'] : false;
            $categoria_id = isset($_POST) ? $_POST['categoria'] : false;
            //$imagen = isset($_POST) ? $_POST['imagen'] : "";


            if ($nombre && $descripcion && $precio && $stock && $categoria_id) {
                $producto = new Producto();

                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoriaId($categoria_id);

                if (isset($_FILES['imagen'])) {
                    //GUARDAR IMAGEN
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    if ($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {
                        if (!is_dir('uploads/images')) {
                            mkdir('uploads/images', 0777, true);
                        }
                        move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
                        $producto->setImagen($filename);
                    }
                }

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $producto->setId($id);
                    $productos = $producto->edit();
                } else {
                    $productos = $producto->crear();
                }

                if ($productos) {
                    echo $_SESSION['producto'] = 'complete';
                } else {
                    echo $_SESSION['producto'] = 'failed';
                }
            } else {
                echo  $_SESSION['producto'] = 'failed';
            }
        } else {
            echo $_SESSION['producto'] = 'failed';
        }
        Header("Location: " . base_url . "producto/crear");
    }


    public function editar()
    {
        Utils::isAdmin();
        $edit = true;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $pro = $producto->getOne();
        }
        require_once "views/producto/crear.php";
    }

    public function eliminar()
    {
        Utils::isAdmin();
        if (isset($_POST)) {
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $delete = $producto->delete();

            if ($delete) {
                $_SESSION['deleted'] = 'complete';
            } else {
                $_SESSION['deleted'] = 'failed';
            }
        } else {
            $_SESSION['deleted'] = 'failed';
        }

        header("location: " . base_url . "producto/gestion");
    }
}
