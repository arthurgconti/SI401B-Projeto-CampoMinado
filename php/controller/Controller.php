<?php
require_once("../php/model/usuarioDAO.php");
require_once("../php/model/partidaDAO.php");

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
            "ranking" => $user->ranking, "win-streak" => $user->scoreStreak
        );
    }

    public function getUserPartida($userId){

        $partida = PartidaDAO::getInstance()->retrieveUserPartida($userId);

        return array(
            "id_partida" => $partida->id_partida, "cod_usuario" => $partida->cod_usuario,
            "dimensao_campo" => $partida->dimensao_campo, "area_campo" => $partida->area_campo,
            "numero_bombas" => $partida->numero_bombas,"modalidade" => $partida->modalidade,
            "tempo_gasto"=> $partida->tempo_gasto,"resultado"=> $partida->resultado,
            "pontuacao"=> $partida->pontuacao
        );
    }

}
