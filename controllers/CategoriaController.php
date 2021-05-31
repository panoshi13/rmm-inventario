<?php
require_once 'models/categoria.php';

class categoriaController
{
    public function index()
    {
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        require_once 'views/categoria/index.php';
    }

    public function crear()
    {
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    public function save()
    {
        Utils::isAdmin();
        if (isset($_POST)) {

            $categoria = new Categoria();
            $categoria->setNombre($_POST['categoria']);

            //ejecutar el metodo del modelo
            $identify = $categoria->crear();
            if ($identify) {
                $_SESSION['categoria'] = 'complete';
            } else {
                $_SESSION['categoria'] = 'failed';
            }
        } else {
            $_SESSION['categoria'] = 'failed';
        }
        Header("location: " . base_url . "categoria/index");
    }

    public function editar()
    {
        Utils::isAdmin();
        $edit = true;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setId($id);
            $cat = $categoria->getOne();
        }
        require_once "views/categoria/crear.php";
    }

    public function eliminar()
    {
        Utils::isAdmin();
        if (isset($_POST)) {
            $id = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setId($id);
            $delete = $categoria->delete();

            if ($delete) {
                $_SESSION['deleted'] = 'complete';
            } else {
                $_SESSION['deleted'] = 'failed';
            }
        } else {
            $_SESSION['deleted'] = 'failed';
        }

        header("location: " . base_url . "categoria/index");
    }

    public function ver()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $categoria = new Categoria();
            $categoria->setId($id);
            $cat = $categoria->getOneCategory();

            $productos = new Categoria();
            $productos->setId($id);
            $product = $productos->getCategoryXProduct();
        }
        require_once "views/categoria/ver.php";
    }
}
