<?php
require("connection.php");
class PartidaDAO extends Connection{
    private static $instance;

    private function __construct(){
        parent::getConnection();
        parent::CreateTable();
    }

    public static function getInstance(){
        return (self::$instance == null? (self::$instance = new PartidaDAO()):self::$instance);
    }

}
?>