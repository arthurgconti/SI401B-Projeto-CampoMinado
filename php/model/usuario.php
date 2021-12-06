<?php

class Usuario
{

    public $id_usuario;
    public $nome;
    public $data_nascimento;
    public $cpf;
    public $telefone;
    public $email;
    public $username;
    public $senha;
    public $authenticated_token;
    public $nivel;
    public $experiencia;
    public $ranking;
    public $scoreStreak;

    public function __construct(
        $id_usuario,
        $nome,
        $data_nascimento,
        $cpf,
        $telefone,
        $email,
        $username,
        $senha,
        $nivel,
        $experiencia,
        $ranking,
        $scoreStreak
    ) {
        $this->id_usuario = $id_usuario;
        $this->nome = $nome;
        $this->data_nascimento = $data_nascimento;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->username = $username;
        $this->senha = $senha;
        $this->nivel = $nivel;
        $this->experiencia = $experiencia;
        $this->ranking = $ranking;
        $this->scoreStreak = $scoreStreak;
    }
}
