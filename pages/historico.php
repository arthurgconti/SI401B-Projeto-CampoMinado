<?php

require_once("../php/controller/Controller.php");

session_start();
if(!$_SESSION["id_user"]){
    header("Location: inicial.php");
}
$controller = new controller();
$user = $controller->getUserProfile($_SESSION["id_user"]);
$partidas = $controller->getUserPartida($_SESSION["id_user"]);
$resultado = '';

foreach($partidas as $partida){

    if($partida->modalidade == "rivotril"){
        $modalidade = 0;
    }
    else if($partida->modalidade == "classica"){
        $modalidade = 1;
    }

    if($partida->resultado == 0){
        $resultado.='<div class="ctn-derrota" name="partida" id="'.$partida->id_partida.'" 
        onclick="showPartida('.$partida->resultado.','.$modalidade.','.$partida->tempo_gasto.',
        '.$partida->dimensao_campo.','.$partida->numero_bombas.')">
        <p class="texto-resultado">Derrota</p>
        <p class="texto-data">'.date('d/m/Y à\s H:i:s',strtotime($partida->data_partida)).'</p>
        </div>
        <br>';
    }
    else{
        $resultado.='<div class="ctn-vitoria" name="partida" id="'.$partida->id_partida.'" 
        onclick="showPartida('.$partida->resultado.','.$modalidade.','.$partida->tempo_gasto.',
        '.$partida->dimensao_campo.','.$partida->numero_bombas.')">
        <p class="texto-resultado">Vitória</p>
        <p class="texto-data">'.date('d/m/Y à\s H:i:s',strtotime($partida->data_partida)).'</p>
        </div>
        <br>';
    }

}

$resultado = strlen($resultado) ? $resultado : '<div class="ctn-vitoria">
                    <p class="texto-resultado">Não há partidas a serem exibidas</p>
                    </div>';  
                    
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
            <div id="resultado"><?=$resultado?></div>
            <br>

        </div>
        
        <div class="ctn1">
            <h1 id="title2" class="font-light">Informações da Partida</h1>
            <h4 id="subtitle" class="font-light"></h4>
            <br>
            
            <div class="wrapper">
            
                <div> 
                    <p class="texto-campo">Modalidade</p>
                    <div class="ctn-result">
                    <p id="modalidade" class="texto-resultado"></p>
                    </div>
                </div>

            
                <div > 
                    <p class="texto-campo">Tempo Gasto</p>
                    <div class="ctn-result">
                    <p id="tempo" class="texto-resultado"></p>   
                    </div>

                </div>

            
                <div> 
                    <p class="texto-campo">Dimensões do Campo</p>
                    <div class="ctn-result">
                    <p id="dimensao" class="texto-resultado"></p>     
                    </div>
                </div>

            
                <div> 
                    <p class="texto-campo">Bombas</p>
                    <div class="ctn-result">
                    <p id="bombas" class="texto-resultado"></p>               
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
<script>
    function showPartida(resultado, modalidade, tempo, dimensao, bombas){

        if(resultado == 0){
            document.getElementById("subtitle").innerHTML = "Derrota";
        }
        else{
            document.getElementById("subtitle").innerHTML = "Vitória";
        }

        if(modalidade == 0){
            document.getElementById("modalidade").innerHTML = "Rivotril";
        }
        else{
            document.getElementById("modalidade").innerHTML = "Classica";
        }
        document.getElementById("tempo").innerHTML = ' '+tempo+' segundos';
        document.getElementById("dimensao").innerHTML = ' '+dimensao+' x '+dimensao;
        document.getElementById("bombas").innerHTML = bombas;
        
    }
</script>

</html>

