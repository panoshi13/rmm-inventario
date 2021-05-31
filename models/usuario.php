<?php

class Usuario {
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $contraseña;
    private $rol;
    private $imagen;
    private $db;
    
    public function __construct(){
        $this->db = Database::connect(); 
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getEmail() {
        return $this->email;
    }

    function getContraseña() {
        return password_hash($this->db->real_escape_string($this->contraseña), PASSWORD_BCRYPT , ['cost' => 4]);
    }

    function getRol() {
        return $this->rol;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setApellidos($apellidos) {
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }

    function setEmail($email) {
        $this->email = $this->db->real_escape_string($email);
    }

    function setContraseña($contraseña) {
        $this->contraseña = $this->db->real_escape_string($contraseña);
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function save(){
        $sql = "INSERT INTO usuarios VALUES(null, '{$this->getNombre()}', "
        . "'{$this->getApellidos()}', '{$this->getEmail()}','{$this->getContraseña()}',"
        . "'user',null)";
        
        $save = $this->db->query($sql);
        $result=false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function login(){
        $result = false;
        $email = $this->email;
        $password = $this->contraseña;
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";

        $login = $this->db->query($sql);


        if ($login && $login->num_rows == 1) {
            $usuario = $login->fetch_object();

            $verify = password_verify($password, $usuario->password); 
            if ($verify) {
                $result=$usuario;
            }
        }
        return $result;
    }
}
