class CampoMinado {
    constructor(sizeRow, sizeColumn, totalCellsNoBomb) {
        this.cells = []
        this.noBomb = []
        this.sizeRow = parseInt(sizeRow)
        this.sizeColumn = parseInt(sizeColumn)
        this.totalCellsNoBomb = totalCellsNoBomb
    }

    cheatFunction(campoMinado) {
        for (let i = 0; i < campoMinado.sizeRow; i++)
            for (let j = 0; j < campoMinado.sizeColumn; j++) {
                Cell.openCell(i, j, campoMinado)
            }

        var tempo = setTimeout(() => {
            for (let i = 0; i < campoMinado.sizeRow; i++)
                for (let j = 0; j < campoMinado.sizeColumn; j++) {
                    if (!campoMinado.cells[i][j].state)
                        Cell.closeCell(i, j, campoMinado)
                }
            clearTimeout(tempo)
        }, 5000)
    }

    finishGame(result='Vitoria',score = 0){
        alert(`Jogo encerrado\nSua pontuação: ${score}\nVocê ${result} a partida!`)
    }



}