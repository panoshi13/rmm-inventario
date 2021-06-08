<?php
class Pedido
{

    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;

    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    function getId()
    {
        return $this->id;
    }
    function getUsuarioId()
    {
        return $this->usuario_id;
    }
    function getProvincia()
    {
        return $this->provincia;
    }

    function getLocalidad()
    {
        return $this->localidad;
    }

    function getDireccion()
    {
        return $this->direccion;
    }

    function getCoste()
    {
        return $this->coste;
    }

    function getEstado()
    {
        return $this->estado;
    }

    function getFecha()
    {
        return $this->fecha;
    }

    function getHora()
    {
        return $this->hora;
    }

    //SETTER
    function setId($id)
    {
        $this->id = $id;
    }
    function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }
    function setProvincia($provincia)
    {
        $this->provincia = $this->db->real_escape_string($provincia);
    }

    function setLocalidad($localidad)
    {
        $this->localidad = $this->db->real_escape_string($localidad);
    }
    function setDireccion($direccion)
    {
        $this->direccion = $this->db->real_escape_string($direccion);
    }
    function setCoste($coste)
    {
        $this->coste = $coste;
    }
    function setEstado($estado)
    {
        $this->estado = $estado;
    }
    function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    function setHora($hora)
    {
        $this->hora = $hora;
    }

    public function getAll()
    {
        $productos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC");
        return $productos;
    }

    public function getOne($id)
    {
        $sql = "SELECT * FROM pedidos WHERE id=$id";
        $pedidos = $this->db->query($sql);
        return $pedidos->fetch_object();
    }

    public function getLineasPedidos($id)
    {
        $sql = "SELECT p.id, p.coste FROM lineas_pedidos lp INNER JOIN pedidos p ON lp.pedido_id=p.id WHERE usuario_id=$id ORDER BY lp.id DESC";
        $pedidos = $this->db->query($sql);
        return $pedidos->fetch_object();
    }

    public function getProductosByPedido($id)
    {
        //		$sql = "SELECT * FROM productos WHERE id IN "
        //				. "(SELECT producto_id FROM lineas_pedidos WHERE pedido_id={$id})";

        $sql = "SELECT pr.*, lp.unidades FROM productos pr "
            . "INNER JOIN lineas_pedidos lp ON pr.id = lp.producto_id "
            . "WHERE lp.pedido_id={$id}";

        $productos = $this->db->query($sql);

        return $productos;
    }

    public function getMisPedidos($id)
    {
        $sql = "SELECT * FROM pedidos  WHERE usuario_id=$id ORDER BY id DESC";
        $pedidos = $this->db->query($sql);
        return $pedidos;
    }

    public function getListarAll($id)
    {
        $sql = "SELECT p.coste, p.nombre, p.imagen, lp.unidades FROM lineas_pedidos lp INNER JOIN pedidos p ON lp.pedido_id=p.id WHERE pedido_id=$id";
        $pedidos = $this->db->query($sql);
        return $pedidos;
    }

    public function save()
    {
        $sql = "INSERT INTO pedidos VALUES(null, {$this->getUsuarioId()} , '{$this->getProvincia()}', '{$this->getLocalidad()}','{$this->getDireccion()}',{$this->getCoste()},'confirm',CURDATE(),CURTIME())";
        $pedidos = $this->db->query($sql);
        $result = false;
        if ($pedidos) {
            $result = true;
        }
        return $result;
    }

    public function save_linea()
    {
        //Devuelve el ID de AUTO_INCREMENT de la última fila que se ha insertado o actualizado en una tabla
        $sql = "SELECT LAST_INSERT_ID() AS 'pedido'";

        $save = $this->db->query($sql);
        $pedido_id = $save->fetch_object()->pedido;

        foreach ($_SESSION['carrito'] as $elemento) {
            $producto = $elemento['producto'];

            $insert = "INSERT INTO lineas_pedidos VALUES(NULL, {$pedido_id}, {$producto->id}, {$elemento['unidades']})";
            $save_linea = $this->db->query($insert);
        }
        $result = false;
        if ($save_linea) {
            $result = true;
        }
        return $result;
    }

    public function lastPedido()
    {
        $sql = "SELECT * from pedidos order by id desc limit 1;";
        
        $result = $this->db->query($sql);
        return $result->fetch_object();
    }

    public function insert_save_linea($pedido_id, $producto_id, $unidades)
    {
        $insert = "INSERT INTO lineas_pedidos VALUES(NULL, $pedido_id, $producto_id, $unidades)";
        $save_linea = $this->db->query($insert);
        $result = false;
        if ($save_linea) {
            $result = true;
        }
        return $result;
    }

    public function edit()
    {
        $sql = "UPDATE pedidos SET estado='{$this->getEstado()}' WHERE id={$this->getId()}";
        $pedidos = $this->db->query($sql);
        $result = false;
        if ($pedidos) {
            $result = true;
        }
        return $result;
    }
}
