<?php
require_once("../php/model/usuarioDAO.php");

class Controller
{
    public function getUserProfile($userId)
    {
        $user = UsuarioDAO::getInstance()->retrieveUser($userId);

        return array(
            "nome" => $user->nome, "nascimento" => $user->data_nascimento,
            "cpf" => $user->cpf, "telefone" => $user->telefone,
            "email" => $user->email, "username" => $user->username,
            "nivel" => $user->nivel, "experiencia" => $user->experiencia,
            "ranking" => $user->ranking, "win-streak" => 0
        );
    }
}
?>