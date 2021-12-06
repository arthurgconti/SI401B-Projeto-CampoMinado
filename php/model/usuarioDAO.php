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

            $sql = 'insert into Usuario (nome, data_nascimento, cpf, telefone, email, username, senha,nivel,experiencia,ranking,score_streak) 
        values (?,?,?,?,?,?,?,?,?,?,?)';

            try {
                $smtm = parent::getConnection()->prepare($sql);
                $smtm->execute(array($nome, $data, $cpf, $telefone, $email, $usuario, $senha, 1, 0, "Novato", 0));
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
                $row["ranking"],
                $row["score_streak"]
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

    public function updateUser($userId, $nome, $email, $telefone, $dataNascimento)
    {
        $sql = 'update Usuario 
            set nome = ?,email=?,telefone=?,data_nascimento=?
            where id_usuario=?';

        try {
            $smtm = parent::getConnection()->prepare($sql);
            $smtm->execute(array($nome, $email, $telefone, $dataNascimento, $userId));
        } catch (PDOException $e) {
            echo "Ocorreu um erro: " . $e->getMessage();
        }
        return true;
    }

    public function updatePassword($userId, $password)
    {
        $sql = 'update Usuario 
            set senha=?
            where id_usuario=?';

        try {
            $smtm = parent::getConnection()->prepare($sql);
            $smtm->execute(array(password_hash($password, PASSWORD_DEFAULT), $userId));
        } catch (PDOException $e) {
            echo "Ocorreu um erro: " . $e->getMessage();
        }
        return true;
    }



    //Parte de ranqueamento
    public function addExp($id_usuario, $pontuacao)
    {

        $user = $this->retrieveUser($id_usuario);
        $xp = $pontuacao / 100;
        $data = array();
        $sql = "";
        $toNextLevelXp = pow(($user->nivel * 2), 2);



        if ($xp + $user->experiencia >= $toNextLevelXp && $user->nivel !== 30) {
            $xpNextLevel = $xp + $user->experiencia - $toNextLevelXp;

            if (($user->nivel + 1) === 30) {
                $sql = 'update Usuario 
                set experiencia=?,
                nivel=?,
                ranking=?
                where id_usuario=?';

                array_push($data, 0);
                array_push($data, 30);
                array_push($data, $this->rankingQualification($user->nivel + 1));
                array_push($data, $id_usuario);


                $_SESSION["newLevel"] = "true";
            } else {
                $sql = 'update Usuario 
                set experiencia=?,
                nivel=?,
                ranking=?
                where id_usuario=?';
                array_push($data, $xpNextLevel);
                array_push($data, ($user->nivel + 1));
                array_push($data, $this->rankingQualification($user->nivel + 1));
                array_push($data, $id_usuario);

                $_SESSION["newLevel"] = "true";
            }
        } else {
            $sql = 'update Usuario 
                set experiencia=?
                where id_usuario=?';
            array_push($data, ($user->experiencia + $xp));
            array_push($data, $id_usuario);
        }
        try {
            $smtm = parent::getConnection()->prepare($sql);
            $smtm->execute($data);
        } catch (PDOException $e) {
            echo "Ocorreu um erro: " . $e->getMessage();
        }
        return true;
    }

    private function rankingQualification($nivel)
    {

        if ($nivel >= 1 && $nivel < 5)
            return "Novato";
        elseif ($nivel >= 5 && $nivel < 10)
            return "Aprendiz das Bombas";
        elseif ($nivel >= 10 && $nivel < 15)
            return "Veterano de Campo";
        elseif ($nivel >= 15 && $nivel < 20)
            return "Mestre das Minas";
        elseif ($nivel >= 20 && $nivel < 25)
            return "Gran-Mestre";
        elseif ($nivel >= 25 && $nivel < 30)
            return "Desafiante dos Campos";
        else
            return "Lord das Bombas";
    }

    public function updateScoreStreak($id_usuario, $resultadoPartida)
    {
        $user = $this->retrieveUser($id_usuario);

        $scoreStreak = $resultadoPartida == 1 ? ($user->scoreStreak + 1) : 0;

        $sql = 'update Usuario 
            set score_streak=?
            where id_usuario=?';

        try {
            $smtm = parent::getConnection()->prepare($sql);
            $smtm->execute(array($scoreStreak, $id_usuario));
        } catch (PDOException $e) {
            echo "Ocorreu um erro: " . $e->getMessage();
        }
        return true;
    }
}
