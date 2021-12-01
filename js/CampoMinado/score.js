function addScore(campoMinado) {

    if (gameMode.value == GAMEMODES.classico) {
        campoMinado.score += 12 //adiciona pontos no modo classico durante o jogo
    } else
    if (gameMode.value == GAMEMODES.rivotril) {
        campoMinado.score += 20 //adiciona pontos no modo rivoltril durante o jogo
    }
    return campoMinado.score
}



function scoreFinal(campoMinado) {

    if (gameMode.value == GAMEMODES.classico) {

        if (gameEnded == true) {

            if (gameWin == true) {
                campoMinado.score += 50 //vitória no modo classico
            } else
            if (gameOver == true) { //derrota no modo clássico
                if (campoMinado.cellRemain >= (0.6 * campoMinado.totalCellsNoBomb)) {
                    campoMinado.score = Math.floor(campoMinado.score * 0.7)
                } else
                if (campoMinado.cellRemain < (0.6 * campoMinado.totalCellsNoBomb)) {
                    campoMinado.score = Math.floor(campoMinado.score * 1.5)
                }
            }

            if (minutes > 1) {
                campoMinado.score -= (minutes * (campoMinado.score * 0.12)) // a cada 60 segundos, perde 1,2% da pontuação
            }
           
        }
    } else
    if (gameMode.value == GAMEMODES.rivotril) {
        if (gameEnded == true) {
            if (gameWin == true) {
                campoMinado.score = addScore(campoMinado) + 100 //vitoria no modo rivotril
                if (minutes > 1) {
                    seconds += 60
                    var extraScore = seconds * 0.1
                    campoMinado.score += extraScore
                }
            }
        } else
        if (gameOver == true) { //derrota no modo rivoltril
            campoMinado.score = Math.floor((campoMinado.score * 0.5) / campoMinado.openCells);
        }
    }

    if (campoMinado.sizeRow <= 14 && campoMinado.sizeColumn <= 14) {
        campoMinado.score = Math.floor(campoMinado.score * 1.2)
    } else {
        campoMinado.score = Math.floor(campoMinado.score * 1.6) //multiplicador final de pontos
    }

    return campoMinado.score
}