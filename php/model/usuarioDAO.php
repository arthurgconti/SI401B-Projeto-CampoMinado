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

        $sql = 'insert into Usuario (nome, data_nascimento, cpf, telefone, email, username, senha,nivel,experiencia,ranking) 
        values (?,?,?,?,?,?,?,?,?,?)';

        try {
        $smtm = parent::getConnection()->prepare($sql);
        $smtm->execute(array($nome,$data,$cpf,$telefone,$email,$usuario,$senha,0,0,"Novato"));

        } catch (PDOException $e) {
            echo "Ocorreu um erro: " . $e->getMessage();
        }
        return true;
    }
}

?>