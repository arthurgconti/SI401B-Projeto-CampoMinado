<?php
require_once("../php/controller/Controller.php");
session_start();
if (!$_SESSION["id_user"]) {
    header("Location: inicial.php");
}
$controller = new controller();
$user = $controller->getUserProfile($_SESSION["id_user"]);
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/global/global.css">
    <link rel="stylesheet" href="../styles/pages/perfil.css">
    <link rel="stylesheet" href="../styles/pages/alterar_senha.css">
    <!-- Script para importação do kit font-awesome, que serve para utilizar-mos os ícones do font-awesome -->
    <script src="https://kit.fontawesome.com/1de6443f41.js"></script>

    <title>Perfil</title>
</head>

<body>
    <main>
        <div class="container">
            <aside>
                <header>
                    <img src="../assets/G7_4.png" alt="ícone bomba com g7 escrito dentro">
                    <h1>Perfil</h1>
                    <div class="seta">
                        <a href="./campo_minado.php" id="back">
                            <i class="fas fa-arrow-left font-size-fa"></i>
                        </a>
                    </div>
                </header>

                <div class="container-userprofile">
                    <!-- <img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=334&q=80"
                        alt="Foto de perfil do usuário"> -->
                    <!-- <img src="https://avatars.githubusercontent.com/u/65549547?v=4" alt="Foto de perfil do usuário"> -->
                    <img src="https://static9.depositphotos.com/1605416/1081/i/950/depositphotos_10819690-stock-photo-portrait-of-a-young-capybara.jpg" alt="Foto de perfil do usuário">
                    <h6><?php echo $user["nome"] ?></h6>
                </div>

                <div class="container-info-ranking">
                    <p><strong>Ranking: </strong><?php echo $user["ranking"] ?> </p>
                    <p><strong>Win-Streak: </strong><?php echo $user["win-streak"] ?></p>
                    <p><strong>Level: </strong><?php echo $user["nivel"] ?></p>
                </div>

                <div class="container-buttons">
                    <a class="a-button" href="./historico.php">Histórico</a>
                    <a class="a-button" href="./perfil.php">Dados gerais</a>
                </div>
            </aside>
            <section>
                <h6>Dados do jogador</h6>

                <form>
                    <!-- <fieldset>
                        <label for="senha_atual">Senha Atual</label>
                        <input type="password" id="senha_atual" name="senha_atual" placeholder="Sua senha atual">
                    </fieldset> -->

                    <fieldset>
                        <label for="pass">Nova Senha</label>
                        <input type="password" name="pass" id="pass" placeholder="Nova senha">
                    </fieldset>

                    <fieldset>
                        <label for="cpass">Confirmar Senha</label>
                        <input type="password" id="cpass" name="cpass" placeholder="Confirme a nova senha">
                    </fieldset>

                    <button type="submit">Alterar</button>

                </form>
            </section>
        </div>
    </main>
</body>

</html>