<?php

require_once('../php/model/partidaDAO.php');

$codUser = (isset($_POST['cod_usuario'])) ? $_POST['cod_usuario'] : 1;
$dimensaoCampo = (isset($_POST['dimensao_campo'])) ? $_POST['dimensao_campo'] : 0;
$areaCampo = (isset($_POST['area_campo'])) ? $_POST['area_campo'] : 0;
$numeroBombas = (isset($_POST['numero_bombas'])) ? $_POST['numero_bombas'] : 0;
$modalidade = (isset($_POST['modalidade'])) ? $_POST['modalidade'] : "nenhuma";
$tempoGasto = (isset($_POST['tempo_gasto'])) ? $_POST['tempo_gasto'] : 0;
$resultado = (isset($_POST['resultado'])) ? $_POST['resultado'] : 0;
$pontuacao = (isset($_POST['pontuacao'])) ? $_POST['pontuacao'] : 0;

PartidaDAO::getInstance()->create($codUser, $dimensaoCampo, $areaCampo, $numeroBombas, $modalidade, $tempoGasto, $resultado, $pontuacao);

echo json_encode(array("message"=>"partida registrada"));
?>
