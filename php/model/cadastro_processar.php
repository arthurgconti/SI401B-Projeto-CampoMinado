<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processando dados de cadastro</title>
</head>

<body>

<?php
include_once('usuarioDAO.php');

$nome = $_POST['nome'];
$data = $_POST['data'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

UsuarioDAO::getInstance()->create($nome, $data, $cpf, $telefone, $email, $usuario, $senha);

?>


</body>

</html>