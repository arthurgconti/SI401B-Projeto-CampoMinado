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
    
    public function create($codUser,$dimensaoCampo,$areaCampo,$numeroBombas,$modalidade,$tempoGasto,$resultado,$pontuacao){

        $sql = 'insert into Partida (cod_usuario,dimensao_campo,area_campo,numero_bombas,modalidade,tempo_gasto,resultado,pontuacao) 
        values (?,?,?,?,?,?,?,?)';

        $smtm = parent::getConnection()->prepare($sql);
        $smtm->execute(array($codUser,$dimensaoCampo,$areaCampo,$numeroBombas,$modalidade,$tempoGasto,$resultado,$pontuacao));
        return true;
    }

}
?>