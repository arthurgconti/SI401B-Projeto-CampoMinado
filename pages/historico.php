<?php
require_once("../php/controller/Controller.php");
session_start();
if(!$_SESSION["id_user"]){
    header("Location: inicial.php");
}
$controller = new controller();
$user = $controller->getUserProfile($_SESSION["id_user"]);
//$partidas = $controller->getUserPartida($_SESSION["id_user"]);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/pages/historico.css">
    <link rel="stylesheet" href="../styles/global/global.css">
    <script src="https://kit.fontawesome.com/1de6443f41.js"></script>
    <title>Histórico</title>

</head>
<body>

    <div class="container">

        <div class="ctn2">
                    <img class="logo" src="../assets/G7_2.png" alt="Logo do jogo">
                    

                    <h1 id="title1">Histórico</h1>
                    
                
            <div class="container-userprofile">
                    <img src="https://static9.depositphotos.com/1605416/1081/i/950/depositphotos_10819690-stock-photo-portrait-of-a-young-capybara.jpg"
                    alt="Foto de perfil do usuário">
                    <h6><?php echo $user["nome"] ?></h6>
            </div>

            <div class="ctn-vitoria">
                <p class="texto-resultado">VITÓRIA</p>
                <p class="texto-data">88:88 88/88/8888</p>

            </div>
            <br>

            <div class="ctn-derrota">
                <p class="texto-resultado">DERROTA</p>
                <p class="texto-data">88:88 88/88/8888</p>

            </div>
            <br>

            <div class="ctn-derrota">
                <p class="texto-resultado">DERROTA</p>
                <p class="texto-data">88:88 88/88/8888</p>

            </div>
            <br>

            <div class="ctn-vitoria">
                <p class="texto-resultado">VITÓRIA</p>
                <p class="texto-data">88:88 88/88/8888</p>
            </div>
            <br>

            <div class="ctn-vitoria">
                <p class="texto-resultado">VITÓRIA</p>
                <p class="texto-data">88:88 88/88/8888</p>
            </div>
            <br>

            <div class="ctn-derrota">
                <p class="texto-resultado">DERROTA</p>
                <p class="texto-data">88:88 88/88/8888</p>
            </div>
            <br>

        </div>
        
        <div class="ctn1">
            <h1 id="title2" class="font-light">Informações da Partida</h1>
            <h4 id="subtitle" class="font-light">DERROTA</h4>
            <br>
            
            <div class="wrapper">
            
                <div> 
                    <p class="texto-campo">Modalidade</p>
                    <div class="ctn-result">

                    </div>
                </div>

            
                <div > 
                    <p class="texto-campo">Tempo Gasto</p>
                    <div class="ctn-result">
                        
                    </div>

                </div>

            
                <div> 
                    <p class="texto-campo">Dimensões do Campo</p>
                    <div class="ctn-result">
                        
                    </div>
                </div>

            
                <div> 
                    <p class="texto-campo">Bombas</p>
                    <div class="ctn-result">
                        
                    </div>

                </div>

            
                <div> 
                    <p class="texto-campo">Data e Hora</p>
                    <div class="ctn-result">
                        
                    </div>

                </div>

            
                <div> 
                    <p class="texto-campo">Ranking</p>
                    <div class="ctn-result">
                        
                    </div>

                </div>

            

            </div>
            <div class="seta">
                <a href="./perfil.php" id="back">
                    <i class="fas fa-arrow-left font-size-fa"></i>
                </a>
            </div>

        </div>
    </div>

  

    
    
</body>
</html>