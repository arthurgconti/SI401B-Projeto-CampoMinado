var score = 0;
var openCells = 0; //celular abertas com sucesso pelo jogador
var sizeX= parseInt(dimensionX.value)
var sizeY = parseInt(dimensionY.value)
var bomb = parseInt(bombs.value)
var totalCells = (sizeX * sizeY) - bomb
var cellRemain //células restantes

function addScore(){

    if(gameMode.value == GAMEMODES.classico){ 
        score = score + 12 //adiciona pontos no modo classico durante o jogo
    }

    else
    if(gameMode.value == GAMEMODES.rivotril){
        score = score + 20 //adiciona pontos no modo rivoltril durante o jogo
    }
    return score
}


function checkScore(){

    if(gameMode.value == GAMEMODES.classico){ 

        if(gameEnded==true){

            if(gameWin==true){
                score = score + 50 //vitória no modo classico
            }
            else
            if(gameOver == true){ //derrota no modo clássico
                if (cellRemain >= (0.6 *(sizeX * sizeY- bomb))){
                    score = Math.floor(score * 0.7) 
                }
                else
                if (cellRemain < (0.6 *(sizeX * sizeY - bomb))){
                    score = Math.floor(score * 1.5)
                }
            }

            if(minutes > 1){
                score = score - (minutes * (score * 0.12)) // a cada 60 segundos, perde 1,2% da pontuação
            }
        }
    }
    else
    if(gameMode.value == GAMEMODES.rivotril){
        if(gameEnded==true){
            if(gameWin==true){
                score = addScore() + 100 //vitoria no modo rivotril
                if(minutes > 1){
                    seconds += 60
                    var extraScore = seconds * 0.1
                    score = score + extraScore
                }
            }
        }
        else
        if (gameOver == true){ //derrota no modo rivoltril
           score = Math.floor((score * 0.5) / openCells);
        }
    }

    return score
}


function scoreFinal(){

    if(sizeX <= 14 && sizeY <= 14){
        score = Math.floor(score * 1.2) 
    }
    else {
        score = Math.floor(score * 1.6) //multiplicador final de pontos
    }

    return score
}
  
