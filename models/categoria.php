<?php

class Categoria{
    private $id;
    private $nombre;
    private $db;

    public function __construct()
    {
        $this->db=Database::connect();
    }

    function getId(){
        return $this->id;
    }

    function getNombre(){
        return $this->nombre;
    }

    function setId($id){
        $this->id=$id;
    }

    function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function getAll(){
        $sql = "SELECT * FROM categorias ORDER BY id asc;";
        $categorias = $this->db->query($sql);
        return $categorias;
    }

    public function getOne(){
        $sql = "SELECT * FROM categorias";
        $categorias = $this->db->query($sql);

        return $categorias->fetch_object();
    }

    public function getOneCategory()
    {
        $sql = "SELECT * FROM categorias where id={$this->getId()}";
        $categorias = $this->db->query($sql);
        return $categorias->fetch_object();
    }
    public function getCategoryXProduct()
    {
        $sql = "SELECT p.* FROM categorias c INNER JOIN productos p ON c.id=p.categoria_id WHERE c.id={$this->getId()}";
        $categorias = $this->db->query($sql);
        return $categorias;
    }
    public function crear(){
        $sql = "INSERT INTO categorias VALUES(null, '{$this->getNombre()}')";
        $save = $this->db->query($sql);
        $result=false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function delete()
    {
        $sql = "DELETE FROM categorias WHERE id='{$this->getId()}'";
        $delete = $this->db->query($sql);

        $result = false;
        if ($delete) {
            $result = true;
        }
        return $result;
    }

    public function edit()
    {
        $sql = "UPDATE categorias SET nombre='{$this->getNombre()}' WHERE id= {$this->id}";
        
        $editar = $this->db->query($sql);

        $result = false;
        if ($editar) {
            $result = true;
        }
        return $result;
    }
}