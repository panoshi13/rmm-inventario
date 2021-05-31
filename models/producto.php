<?php
class Producto
{

    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;

    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    function getId()
    {
        return $this->id;
    }
    function getCatedoriId()
    {
        return $this->categoria_id;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function getDescripcion()
    {
        return $this->descripcion;
    }

    function getPrecio()
    {
        return $this->precio;
    }

    function getStock()
    {
        return $this->stock;
    }

    function getOferta()
    {
        return $this->oferta;
    }

    function getFecha()
    {
        return $this->fecha;
    }

    function getImagen()
    {
        return $this->imagen;
    }

    //SETTER
    function setId($id)
    {
        $this->id = $id;
    }

    function setCategoriaId($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }
    function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }
    function setPrecio($precio)
    {
        $this->precio = $precio;
    }
    function setStock($stock)
    {
        $this->stock = $stock;
    }
    function setOferta($oferta)
    {
        $this->oferta = $oferta;
    }
    function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM productos ORDER BY id DESC;";
        $productos = $this->db->query($sql);
        return $productos;
    }

    public function getOne()
    {
        $sql = "SELECT * FROM productos WHERE id={$this->getId()}";
        $productos = $this->db->query($sql);
        return $productos->fetch_object();
    }

    public function getRandom($limit){
        $productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");
        return $productos;
    }

    public function crear()
    {
        $sql = "INSERT INTO productos VALUES(null, {$this->getCatedoriId()} , '{$this->getNombre()}', '{$this->getDescripcion()}','{$this->getPrecio()}','{$this->getStock()}',null,CURDATE(),'{$this->getImagen()}')";
        $producto = $this->db->query($sql);
        $result = false;
        if ($producto) {
            $result = true;
        }
        return $result;
    }

    public function delete()
    {
        $sql = "DELETE FROM productos WHERE id='{$this->getId()}'";
        $delete = $this->db->query($sql);

        $result = false;
        if ($delete) {
            $result = true;
        }
        return $result;
    }

    public function edit()
    {
        $sql = "UPDATE productos SET nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', precio={$this->getPrecio()}, stock={$this->getStock()}, categoria_id={$this->getCatedoriId()} ";
        
        if ($this->getImagen() !== null) {
            $sql.= ", imagen = '{$this->getImagen()}'";
        }

        $sql.= " WHERE id= {$this->id}";
        
        $editar = $this->db->query($sql);

        $result = false;
        if ($editar) {
            $result = true;
        }
        return $result;
    }
}
