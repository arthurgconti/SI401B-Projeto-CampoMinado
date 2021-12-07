<?php
require_once("../php/controller/Controller.php");

session_start();
if (!$_SESSION["id_user"]) {
    header("Location: inicial.php");
}
$controller = new controller();
$partida = $controller->getUserPartida($_SESSION["id_user"]);
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/global/global.css">
    <link rel="stylesheet" href="../styles/pages/ranking.css">
    <script src="https://kit.fontawesome.com/1de6443f41.js"></script>


    <title>Ranking</title>

</head>

<body>
    <div class="container">
        <header class="ctn1">
            <div id="logo">
                <img src=https://media.discordapp.net/attachments/875488630112669717/879742285976322059/G7_3.png width="80" alt="logo do grupo">
            </div>


            <div class="h1">
                <p>Ranking Global</p>
            </div>
            <div class="caixa1">


                <label id="labelDimensao">Dimensões do campo</label>
                <div id="dimensoes">
                    <input type="text" name="X" id="X" placeholder="10" maxlength="3">
                    X
                    <input type="text" name="Y" id="Y" placeholder="10" maxlength="3">
                </div>




            </div>
            <div class="caixa2">
                <label for="tempo">Tempo da partida:</label>
                <input type="text" id="tempo" name="tempopartida" placeholder="05:47">
            </div>

            <div class="botao-busca">
                <button id="buscar" action="pages\ranking.php" method="POST" type="button">Buscar</button>
            </div>

            <div class="seta">
                <a href="./campo_minado.php" id="back">
                    <i class="fas fa-arrow-left font-size-fa"></i>
                </a>
            </div>



        </header>
        <div class="ctn2">
            <!--parte de rank-->
            <table id="tabela" class="rank">

                <tr>
                    <th>Usuário</th>
                    <th>Pontuação</th>
                    <th>Bombas</th>
                    <th>Tempo</th>
                    <th>Modalidade</th>
                </tr>

                <?php

                $conn = mysqli_connect("localhost", "root", "root", "progweb");


                $sql = mysqli_query($conn, "SELECT u.nome, pontuacao, numero_bombas, tempo_gasto, modalidade 
            FROM Partida p
            INNER JOIN Usuario u ON (u.id_usuario = p.cod_usuario)
            ORDER BY pontuacao DESC 
            limit 10");
                $row = mysqli_num_rows($sql);



                while ($rows = mysqli_fetch_array($sql)) {
                    echo '<tr>';
                    echo '<td>' . $rows['nome'] . '</td>';
                    echo '<td>' . $rows['pontuacao'] . '</td>';
                    echo '<td>' . $rows['numero_bombas'] . '</td>';
                    echo '<td>' . $rows['tempo_gasto'] . '</td>';
                    echo '<td>' . $rows['modalidade'] . '</td>';
                    echo '</tr>';
                }



                if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['buscar'])) {
                    function buscar()
                    {
                        $tempo = $_POST['tempopartida'];
                        $tamanho = $_POST['X'];

                        $conn = mysqli_connect("localhost", "root", "root", "progweb");



                        $sql = mysqli_query($conn, "SELECT u.nome, pontuacao, numero_bombas, tempo_gasto, modalidade 
                        FROM Partida p
                        INNER JOIN Usuario u ON (u.id_usuario = p.cod_usuario)
                        WHERE (tempo_gasto = tempo and dimensao_campo = tamanho) 
                        ORDER BY pontuacao DESC 
                        limit 10");
                        $row = mysqli_num_rows($sql);



                        while ($rows = mysqli_fetch_array($sql)) {
                            echo '<tr>';
                            echo '<td>' . $rows['nome'] . '</td>';
                            echo '<td>' . $rows['pontuacao'] . '</td>';
                            echo '<td>' . $rows['numero_bombas'] . '</td>';
                            echo '<td>' . $rows['tempo_gasto'] . '</td>';
                            echo '<td>' . $rows['modalidade'] . '</td>';
                            echo '</tr>';
                        }
                    };
                }


                ?>




            </table>

        </div>



    </div>


</body>
<script src="../js/CampoMinado/rank.js"></script>

</html>