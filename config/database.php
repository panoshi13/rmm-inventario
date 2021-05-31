<?php

Class Database{
    public static function connect(){
        $db = new mysqli("localhost","root","","rmm");
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}