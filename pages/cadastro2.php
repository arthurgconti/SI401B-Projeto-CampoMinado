<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/pages/cadastro2.css" type="text/css">
    <link rel="stylesheet" href="../styles/global/global.css" type="text/css">

    <title>Cadastro 2/2</title>
</head>

<body>

    <div class="container">

        <div class="ctn1">

            <img class="logo" src="../assets/G7_4.png" alt="Logo da equipe">
            <img class="imagC" src="../assets/logo2.png" alt="Poster Campo Minado">

            <div class="desc">
                <p>Só mais algumas informações e estamos prontos. Não se esqueça de colocar um email válido.</p>
            </div>

        </div>

        <div class="ctn2">

            <p id="title">Junte-se a nós</p>
            <p id="subtittle">Dados do Jogador</p>

            <form action="./cadastro_processar.php" method="POST" class="formulario">

                <div class="cadastrar">

                    <div>
                        <label id="labelEmail">Email</label>
                        <input placeholder="abc123@gmail.com" id="email" type="email" class="info">
                    </div>

                    <div>
                        <label id="labelUsuario">Usuário</label>
                        <input placeholder="usuario" id="usuario" type="text" class="info">
                    </div>

                    <div>
                        <label id="labelSenha">Senha</label>
                        <input placeholder="senha" id="senha" type="password" class="info">
                    </div>

                </div>

                <div class="btacesso">
                    <a onclick="cadastrar2()" class="btacessoE">Finalizar Cadastro</a>
                </div>

            </form>

            <div class="container-steps">
                <div class="circle left-circle"></div>

                <div class="container-progress">
                    <div class="progress-bar"></div>
                </div>
                <div class="circle active right-circle"></div>
            </div>

        </div>

    </div>
    <script src="../js/Masks/mask.js"></script>
    <script src="../js/autenticar2.js"></script>
</body>

</html>