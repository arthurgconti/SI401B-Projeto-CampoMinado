<?php
require_once("connection.php");
require_once("usuario.php");

class UsuarioDAO extends Connection
{
    private static $instance;

    private function __construct()
    {
        parent::getConnection();
        parent::CreateTable();
    }

    public static function getInstance()
    {
        return (self::$instance == null ? (self::$instance = new UsuarioDAO()) : self::$instance);
    }

    public function login($username, $password)
    {

        $sql = "SELECT * FROM Usuario where username = ?";

        try {

            $stmt = parent::getConnection()->prepare($sql);
            $stmt->execute(array($username));
            $fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($fetch) > 0) {
                if (password_verify($password, $fetch[0]["senha"])) {
                    session_start();
                    $_SESSION["username"] = $username;
                    $_SESSION["id_user"] = $fetch[0]["id_usuario"];

                    return true;
                } else return false;
            } else return false;
        } catch (PDOException $e) {
            echo "Ocorreu um erro: " . $e->getMessage();
        }
    }

    public function create($nome, $data, $cpf, $telefone, $email, $usuario, $senha)
    {

        if (!$this->existUsername($usuario)) {

            $sql = 'insert into Usuario (nome, data_nascimento, cpf, telefone, email, username, senha,nivel,experiencia,ranking) 
        values (?,?,?,?,?,?,?,?,?,?)';

            try {
                $smtm = parent::getConnection()->prepare($sql);
                $smtm->execute(array($nome, $data, $cpf, $telefone, $email, $usuario, $senha, 0, 0, "Novato"));
            } catch (PDOException $e) {
                echo "Ocorreu um erro: " . $e->getMessage();
            }
            return true;
        } else {
            return false;
        }
    }

    private function existUsername($username)
    {
        $sql = "SELECT * FROM Usuario where username=:username";
        try {

            $stmt = parent::getConnection()->prepare($sql);
            $stmt->execute(array(":username" => $username));
            $fetch = $stmt->fetchAll();

            if (sizeof($fetch) > 0)
                return true;
            else return false;
        } catch (PDOException $e) {
            echo "Ocorreu um erro: " . $e->getMessage();
        }
    }

    private function buildObject($row)
    {
        $usuario = null;
        try {
            $usuario = new Usuario(
                $row["id_usuario"],
                $row["nome"],
                $row["data_nascimento"],
                $row["cpf"],
                $row["telefone"],
                $row["email"],
                $row["username"],
                $row["senha"],
                $row["nivel"],
                $row["experiencia"],
                $row["ranking"]
            );
        } catch (Exception $e) {
            echo "Ocorreu um erro: " . $e->getMessage();
        }
        return $usuario;
    }

    public function retrieveUser($userId)
    {
        $sql = "SELECT * FROM Usuario WHERE id_usuario=$userId";
        $stmt = parent::getConnection()->query($sql);

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return $this->buildObject($row);
        }
        return null;
    }

    public function updateUser($userId,$nome,$email,$telefone,$dataNascimento)
    {
        $sql = 'update Usuario 
            set nome = ?,email=?,telefone=?,data_nascimento=?
            where id_usuario=?';

        try {
            $smtm = parent::getConnection()->prepare($sql);
            $smtm->execute(array($nome,$email,$telefone,$dataNascimento,$userId));
        } catch (PDOException $e) {
            echo "Ocorreu um erro: " . $e->getMessage();
        }
        return true;
    }
}
