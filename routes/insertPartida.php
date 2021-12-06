<?php
session_start();
require_once('../php/model/partidaDAO.php');

if (isset($_SESSION["id_user"])) {
    if (
        isset($_POST['dimensao_campo'])
        && isset($_POST['area_campo']) && isset($_POST['numero_bombas'])
        && isset($_POST['modalidade']) && isset($_POST['tempo_gasto'])
        && isset($_POST['resultado']) && isset($_POST['pontuacao'])
    ) {

        $codUser =  $_SESSION["id_user"];
        $dimensaoCampo = $_POST['dimensao_campo'];
        $areaCampo = $_POST['area_campo'];
        $numeroBombas = $_POST['numero_bombas'];
        $modalidade = $_POST['modalidade'];
        $tempoGasto = $_POST['tempo_gasto'];
        $resultado = $_POST['resultado'];
        $pontuacao = $_POST['pontuacao'];

        PartidaDAO::getInstance()->create($codUser, $dimensaoCampo, $areaCampo, $numeroBombas, $modalidade, $tempoGasto, $resultado, $pontuacao);
        UsuarioDAO::getInstance()->addExp($codUser, $pontuacao);
        UsuarioDAO::getInstance()->updateScoreStreak($codUser, $resultado);

        if (isset($_SESSION["newLevel"])) {
            echo json_encode(array("status" => 201, "message" => "partida registrada", "novoNivel" => "1"));
        } else {
            echo json_encode(array("status" => 201, "message" => "partida registrada"));
        }
    } else {
        echo json_encode(array("status" => 404, "message" => "Campos faltando ou com problemas"));
    }
} else {
    echo json_encode(array("status" => 403, "message" => "Você não esta autorizado para estar aqui!"));
}
