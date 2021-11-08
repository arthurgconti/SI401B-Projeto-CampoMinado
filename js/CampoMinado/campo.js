class CampoMinado {
    constructor(sizeRow, sizeColumn, totalCellsNoBomb, openCells, cellRemain, score, gamemode) {
        this.cells = []
        this.noBomb = []
        this.sizeRow = parseInt(sizeRow)
        this.sizeColumn = parseInt(sizeColumn)
        this.totalCellsNoBomb = totalCellsNoBomb
        this.openCells = openCells
        this.cellRemain = cellRemain
        this.score = score
        this.gamemode = gamemode
    }

    cheatFunction() {
        for (let i = 0; i < campoMinadoGenerated.sizeRow; i++)
            for (let j = 0; j < campoMinadoGenerated.sizeColumn; j++) {
                Cell.openCell(i, j, campoMinadoGenerated)
            }

        var tempo = setTimeout(() => {
            for (let i = 0; i < campoMinadoGenerated.sizeRow; i++)
                for (let j = 0; j < campoMinadoGenerated.sizeColumn; j++) {
                    if (!campoMinadoGenerated.cells[i][j].state)
                        Cell.closeCell(i, j, campoMinadoGenerated)
                }
            clearTimeout(tempo)
        }, 3000)
    }

    finishGame(result = 'Vitoria') {
        alert(`Jogo encerrado\nVocê ${result} a partida!\nModo de jogo: ${this.gamemode}\nSua pontuação: ${this.score}\nCélulas restantes: ${this.totalCellsNoBomb-this.openCells}`)
        for (let i = 0; i < campoMinadoGenerated.sizeRow; i++)
            for (let j = 0; j < campoMinadoGenerated.sizeColumn; j++) {
                Cell.openCell(i, j, campoMinadoGenerated)
            }
        settingButton.innerText = 'Novo Jogo'
        settingButton.removeAttribute('disabled')
        settingButton.removeEventListener('click', configurationGame)
        settingButton.addEventListener('click', unloadGame)

    }



}