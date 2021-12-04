<?php
session_start();
if (isset($_SESSION["id_user"]))
        header("Location: campo_minado.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/pages/inicial.css" type="text/css">
    <link rel="stylesheet" href="../styles/global/global.css" type="text/css">
    <script src="../js/login.js" defer></script>
    <script src="../js/requests.js" defer></script>
    <title>Campo Minado</title>
</head>

<body>

    <div class="container">

        <div class="esquerda">

            <img class="logo" src="../assets/G7_2.png" alt="Logo da equipe">
            <p class="acessotxt">Acesso</p>

            <form id="main-form" onsubmit="login()" class="formulario">

                <div class="acesso">

                    <!-- <p class="usutxt">Usuário</p> -->

                    <div class="info">
                        <label for="usu">Usuário</label>
                        <input id="usu" name="usu" class="usu" type="text">
                    </div>

                    <!-- <p class="usutxt">Senha</p> -->

                    <div class="info">
                        <label for="pass">Senha</label>
                        <input id="pass" name="pass" class="usu" type="password">
                    </div>

                </div>

                <button type="submit" class="btlogar">
                    Logar-se
                </button>

            </form>

            <div>
                <a class="btcadastro" href="./cadastro.php">Cadastre-se</a>
            </div>

        </div>

        <div class="direita">

            <img class="imagC" src="../assets/logo2.png" alt="Poster Campo Minado">

            <div class="desc">

                <p>Bem-vindo ao Campo Minado do Grupo 07. Nosso jogo oferece duas
                    dificuldades, juntamente com a possibilidade de customizar sua jogabilidade. Desafie-se com essas
                    novas modalidades e dispute
                    com seus amigos através de nosso sistema de ranqueamento global e pontuação.</p>

            </div>
        </div>
    </div>

</body>

</html>