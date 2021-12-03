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
    require_once('../model/usuarioDAO.php');

    if(isset($_POST['nome']) && isset($_POST['nome'])){
        $nome = $_POST['nome'];
    }
    else{
        echo "<script type='javascript'>alert('Houve algum erro com o nome!');</script>";
    ?>    
        <script>
            window.location.replace('../../pages/cadastro.php');
        </script>
    <?php
    }

    if(isset($_POST['data']) && isset($_POST['data'])){
        $data = $_POST['data'];
    }
    else{
        echo "<script type='javascript'>alert('Houve algum erro com a data!');</script>";
    ?>
        <script>
            window.location.replace('../../pages/cadastro.php');
        </script>
    <?php
    }

    if(isset($_POST['cpf']) && isset($_POST['cpf'])){
        $cpf = $_POST['cpf'];
    }
    else{
        echo "<script type='javascript'>alert('Houve algum erro com o cpf!');</script>";
    ?>    
        <script>
            window.location.replace('../../pages/cadastro.php');
        </script>
    <?php
    }

    if(isset($_POST['telefone']) && isset($_POST['telefone'])){
        $telefone = $_POST['telefone'];
    }
    else{
        echo "<script type='javascript'>alert('Houve algum erro com o telefone!');</script>";
    ?>
        <script>
            window.location.replace('../../pages/cadastro.php');
        </script>
    <?php    
    }

    if(isset($_POST['email']) && isset($_POST['email'])){
        $email = $_POST['email'];
    }
    else{
        echo "<script type='javascript'>alert('Houve algum erro com o email!');</script>";
    ?>    
        <script>
            window.location.replace('../../pages/cadastro.php');
        </script>
    <?php    
    }

    if(isset($_POST['usuario']) && isset($_POST['usuario'])){
        $usuario = $_POST['usuario'];
    }
    else{
        echo "<script type='javascript'>alert('Houve algum erro com o usuario!');</script>";
    ?>
        <script>
            window.location.replace('../../pages/cadastro.php');
        </script>
    <?php
    }

    if(isset($_POST['senha']) && isset($_POST['senha'])){
        $senha = password_hash($_POST['senha'],PASSWORD_DEFAULT);
    }
    else{
        echo "<script type='javascript'>alert('Houve algum erro com a senha!');</script>";
    ?>
        <script>
            window.location.replace('../../pages/cadastro.php');
        </script>
    <?php    
    }

    if (UsuarioDAO::getInstance()->create($nome, $data, $cpf, $telefone, $email, $usuario, $senha)) {
        echo "<script type='javascript'>alert('Cadastro efetuado com sucesso!');</script>";
    ?>
        <script>
            window.location.replace('../../pages/inicial.php')
        </script>
    <?php
    }
    else{
        echo "<script type='javascript'>alert('O usuário inserido já existe, cadastre um diferente!');</script>";   
    ?>
        <script>
            window.location.replace('../../pages/cadastro.php');
        </script>    
    <?php   
    }
    ?>
    
</body>

</html>