<?php
require_once("connection.php");
require_once("partida.php");
require_once("usuarioDAO.php");

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
        try {
            $smtm->execute(array($codUser,$dimensaoCampo,$areaCampo,$numeroBombas,$modalidade,$tempoGasto,$resultado,$pontuacao));
        } catch (PDOException $e) {
            echo "Creating failed: " . $e->getMessage();
            return false;
        }
        
        return true;
    }

    public function retrieveUserPartida($userID){

        $sql = "SELECT * FROM Partida 
        WHERE cod_usuario = $userID
        ORDER BY data_partida DESC
        LIMIT 6";

        $stmt = parent::getConnection()->query($sql);
        $partidas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $partidaObj = array();

        foreach($partidas as $p){
            $partidaObj[]= (object) $p;
        }

        return $partidaObj;
        
    }

}
?>