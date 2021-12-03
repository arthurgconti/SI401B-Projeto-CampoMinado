<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/pages/cadastro1.css" type="text/css">
    <link rel="stylesheet" href="../styles/global/global.css" type="text/css">

    <!-- Script para importação do kit font-awesome, que serve para utilizar-mos os ícones do font-awesome -->
    <script src="https://kit.fontawesome.com/1de6443f41.js" defer></script>
    <script src="../js/steps.js" defer></script>
    <script src="../js/autenticar2.js" defer></script>

    <title>Cadastro</title>
</head>

<body>

    <div class="container">

        <div class="ctn1">
            <img class="logo" src="../assets/G7_4.png" alt="Logo da equipe">
            <img class="imagC" src="../assets/logo2.png" alt="Poster Campo Minado">

            <div class="desc">
                <p class="margem">Bem-vindo a área de cadastro.</p>

                <p class="margem"> Aqui você irá inserir algumas informações para que você possa acessar o
                    jogo. Seremos breve.</p>
            </div>
        </div>

        <div class="ctn2">
            <p id="title">Junte-se a nós</p>
            <p id="subtittle">Dados Gerais</p>

            <form id="form-cadastro" action="../php/controller/cadastro_processar.php" method="POST">

                <div class="etapa-1 show-form">
                    <div class="cadastrar">

                        <div>
                            <label id="labelNome">Nome</label>
                            <input placeholder="Rafael Sobrenome" id="nome" name="nome" type="text" class="info">
                        </div>

                        <div>
                            <label id="labelData">Data de Nascimento</label>
                            <input id="data" name="data" type="date" class="info">
                        </div>

                        <div>
                            <label id="labelCPF">CPF</label>
                            <input placeholder="111.111.111-11" id="cpf" name="cpf" type="text" class="info">
                        </div>

                        <div>
                            <label id="labelTelefone">Telefone</label>
                            <input placeholder="(19)99150-1195" id="telefone" name="telefone" type="text" class="info">
                        </div>

                    </div>

                    <div class="seta">
                        <a>
                            <i onclick="nextStep()" class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="etapa-2 hide-form">
                    <div class="cadastrar">

                        <div>
                            <label id="labelEmail">Email</label>
                            <input placeholder="abc123@gmail.com" id="email" name="email" type="email" class="info">
                        </div>

                        <div>
                            <label id="labelUsuario">Usuário</label>
                            <input placeholder="usuario" id="usuario" name="usuario" type="text" class="info">
                        </div>

                        <div>
                            <label id="labelSenha">Senha</label>
                            <input placeholder="senha" id="senha" name="senha" type="password" class="info">
                        </div>

                    </div>

                    <div class="btacesso">
                        <button type="submit" class="btacessoE">Finalizar Cadastro</button>
                    </div>
                </div>

            </form>

            <div class="container-steps">
                <div class="circle active left-circle"></div>

                <div class="container-progress">
                    
                </div>
                <div class="circle right-circle"></div>
            </div>

        </div>

    </div>
    <script src="../js/Masks/mask.js"></script>
    <script src="../js/autenticar.js"></script>
</body>

</html>