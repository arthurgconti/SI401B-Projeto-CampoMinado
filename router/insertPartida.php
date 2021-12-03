<?php

require_once('../php/model/partidaDAO.php');

if (
    isset($_POST['cod_usuario']) && isset($_POST['dimensao_campo'])
    && isset($_POST['area_campo']) && isset($_POST['numero_bombas'])
    && isset($_POST['modalidade']) && isset($_POST['tempo_gasto'])
    && isset($_POST['resultado']) && isset($_POST['pontuacao'])
) {

    $codUser =  $_POST['cod_usuario'];
    $dimensaoCampo = $_POST['dimensao_campo'];
    $areaCampo = $_POST['area_campo'];
    $numeroBombas = $_POST['numero_bombas'];
    $modalidade = $_POST['modalidade'];
    $tempoGasto = $_POST['tempo_gasto'];
    $resultado = $_POST['resultado'];
    $pontuacao = $_POST['pontuacao'];

    PartidaDAO::getInstance()->create($codUser, $dimensaoCampo, $areaCampo, $numeroBombas, $modalidade, $tempoGasto, $resultado, $pontuacao);

    echo json_encode(array("status"=>201,"message" => "partida registrada"));
} else {
    echo json_encode(array("status"=>404,"message"=>"Campos faltando ou com problemas"));
}
