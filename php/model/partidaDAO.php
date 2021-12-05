<?php
require("connection.php");
require_once("partida.php");

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

    private function buildPartida($row)
    {
        $partida = null;
        try {
            $partida = new Partida(
                $row["id_partida"],
                $row["cod_usuario"],
                $row["dimensao_campo"],
                $row["area_campo"],
                $row["numero_bombas"],
                $row["modalidade"],
                $row["tempo_gasto"],
                $row["resultado"],
                $row["pontuacao"]
            );
        } catch (Exception $e) {
            echo "Ocorreu um erro: " . $e->getMessage();
        }
        return $partida;
    }

    public function retrieveUserPartida($userID){

        $sql = "SELECT * FROM Partida 
        WHERE cod_usuario = $userID
        ORDER BY data_partida DESC
        LIMIT 8";

        $stmt = parent::getConnection()->query($sql);

        if($row = $stmt->fetch(PDO::FETCH_CLASS, Partida::class)){

            return $this->buildPartida($row);
        }

        return null;
        
    }

}
?>