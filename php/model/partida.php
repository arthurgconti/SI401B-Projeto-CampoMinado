<?php

class Partida{

    public $id_partida;
    public $cod_usuario;
    public $dimensao_campo;
    public $area_campo;
    public $numero_bombas;
    public $modalidade;
    public $tempo_gasto;
    public $resultado;
    public $pontuacao;

    public function __construct($id_partida,$cod_usuario,$dimensao_campo,
    $area_campo,$numero_bombas,$modalidade,$tempo_gasto,$resultado,$pontuacao)
    {
        $this->id_partida = $id_partida;
        $this->cod_usuario = $cod_usuario;
        $this->dimensao_campo = $dimensao_campo;
        $this->area_campo = $area_campo;
        $this->numero_bombas = $numero_bombas;
        $this->modalidade = $modalidade;
        $this->tempo_gasto = $tempo_gasto;
        $this->resultado = $resultado;
        $this->pontuacao = $pontuacao;
    }
}
?>