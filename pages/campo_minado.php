<?php
session_start();
if(!$_SESSION["id_user"]){
    header("Location: inicial.php");
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campo Minado</title>
    <link rel="stylesheet" href="../styles/global/global.css">
    <link rel="stylesheet" href="../styles/pages/campo_minado.css">


    <script src="../js/requests.js" defer></script>
    <script src="../js/CampoMinado/configGame.js" defer></script>
    <script src="../js/CampoMinado/consts.js" defer></script>
    <script src="../js/CampoMinado/timer.js" defer></script>
    <script src="../js/CampoMinado/campo.js" defer></script>
    <script src="../js/CampoMinado/generateField.js" defer></script>
    <script src="../js/CampoMinado/cell.js" defer></script>
    <script src="../js/CampoMinado/mainField.js" defer></script>
    <script src="../js/CampoMinado/score.js" defer></script>


    <!-- Script para importação do kit font-awesome, que serve para utilizarmos os ícones do font-awesome -->
    <script src="https://kit.fontawesome.com/1de6443f41.js"></script>
</head>

<body>

    <main>
        <div class="container">
            <div id="principal">
                <header>
                    <img src="../assets/G7_2.png" alt="ícone bomba com g7 escrito dentro">
                    <a href="./perfil.php"><i class="fas fa-user"></i></a>
                    <a href="./ranking.php"><i class="fas fa-trophy"></i></a>
                    <a href="../php/logout.php"><i class="fas fa-power-off"></i></a>
                </header>
                <div class="container-campo">
                    <div id="container-dados-partida">
                        <div class="tempo">
                            <p>Tempo:&ThickSpace;</p>
                            <p id="tempo"></p>
                        </div>
                        <div class="cells">
                            <p>Células Restantes:&ThickSpace;</p>
                            <p id="cellsRemaining"></p>
                        </div>
                    </div>
                    <div id="container-cheat-div" class="container-cheat hidden">
                        <a id="cheat" href="#"><i class="fas fa-bug"></i></a>
                    </div>
                    <div id="campo">
                    </div>
                </div>


            </div>
            <aside>
                <h1>Configurações <br />da partida</h1>

                <form>
                    <fieldset>
                        <label for="modalidade">Modalidade</label>
                        <select name="modalidade" id="modalidade">
                            <option value="default">Selecione</option>
                            <option value="classica">Clássica</option>
                            <option value="rivotril">Rivotrill</option>
                        </select>
                    </fieldset>

                    <fieldset id="fieldset-dimensoes">
                        <label id="labelDimensao">Dimensões do campo</label>
                        <div id="dimensoes">
                            <input type="text" name="dimensaoX" id="dimensaoX" placeholder="10" maxlength="3">
                            X
                            <input type="text" name="dimensaoY" id="dimensaoY" placeholder="10" maxlength="3">
                        </div>
                    </fieldset>

                    <fieldset>
                        <label id="labelBomba" for="bombas">Número de Bombas</label>
                        <input type="text" id="bombas" name="bombas" placeholder="5">
                    </fieldset>

                </form>
                <div class="container-button">
                    <button id="setting-button" type="button">Novo Jogo</button>
                    <button id="starting-button" type="button">Iniciar</button>
                </div>
            </aside>
        </div>
    </main>

    <script src="../js/CampoMinado/autenticarDimensao.js"></script>
</body>

</html>