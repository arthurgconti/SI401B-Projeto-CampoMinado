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

    public function create($nome,$data,$cpf,$telefone,$email,$usuario,$senha){

        $sql = 'insert into Partida (nome, data_nascimento, cpf, telefone, email, username, senha) 
        values (?,?,?,?,?,?,?)';

        $smtm = parent::getConnection()->prepare($sql);
        $smtm->execute(array($nome,$data,$cpf,$telefone,$email,$usuario,$senha));
        return true;
    }
}

?>
