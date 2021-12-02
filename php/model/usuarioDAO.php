<?php
require("connection.php");
class UsuarioDAO extends Connection{
    private static $instance;

    private function __construct(){
        parent::getConnection();
        parent::CreateTable();
    }

    public static function getInstance(){
        return (self::$instance == null? (self::$instance = new UsuarioDAO()):self::$instance);
    }

}
?>
