
class Cell {

    /**
     * @params row Linhas que a célula está
     * @params column Coluna do campo que a Célula está
     * @params value Valor da célula | -1 bomba, 0 vazio, >0 n de bombas
     * @params imageName nome da imagem na pasta assets
     * @params state Status: aberto/fechado
     * @return Retorna um objeto com os parâmetros passados
     */
    constructor(row, column, value, imageName, state) {
        this.row = row
        this.column = column
        this.value = value
        this.imageName = imageName
        this.state = state
    }

    cellClick(id, campoMinado, cell) {
        if (!gameEnded) {
            const idCell = id.split('-')
            if (!campoMinado.cells[parseInt(idCell[0])][parseInt(idCell[1])].state)
                Cell.checkCell(parseInt(idCell[0]), parseInt(idCell[1]), campoMinado, cell)
        } else
            alert("Jogo já finalizado")
    }

    static openCell(row, column, campoMinado, cell) {
        if (!cell)
            cell = document.getElementById(`${row}-${column}`)

        if (campoMinado.cells[row][column].value > 0) {
            cell.innerHTML = campoMinado.cells[row][column].value
        }

        if (campoMinado.cells[row][column].value === -1){
            cell.style.background = "red"
        }
        else if (campoMinado.cells[row][column].value === 0){
            cell.style.background = "black"
            
        }
        else{
            cell.style.background = "rgb(36, 150, 241)";
            
        }
    }

    static closeCell(row, column, campoMinado, cell) {
        if (!cell)
            cell = document.getElementById(`${row}-${column}`)

        cell.style.background = "#999999";


        if (campoMinado.cells[row][column].value !== 0) {
            const cell = document.getElementById(`${row}-${column}`);
            cell.innerHTML = ''
        }
    }

    static checkCell(row, column, campoMinado, cell) {


        if (!campoMinado.cells[row][column].state) {
            Cell.openCell(row, column, campoMinado, cell)
            campoMinado.cells[row][column].state = true
            campoMinado.totalCellsNoBomb--
            
            openCells++
           

            if (campoMinado.cells[row][column].value === 0) {
                const cellNeighborhood = [
                    //0    |   1
                    [row + 1, column - 1],
                    [row, column - 1],
                    [row - 1, column - 1],
                    [row - 1, column],
                    [row - 1, column + 1],
                    [row, column + 1], //5
                    [row + 1, column + 1],
                    [row + 1, column]
                ]

               

                for (let i = 0; i < 8; i++) {
                    if (((cellNeighborhood[i][0] >= 0) && (cellNeighborhood[i][1] >= 0)) &&
                        ((cellNeighborhood[i][0] < campoMinado.sizeRow) && (cellNeighborhood[i][1] < campoMinado.sizeColumn))) {
                        const newCell = document.getElementById(`${cellNeighborhood[i][0]}-${cellNeighborhood[i][1]}`)
                        Cell.checkCell(cellNeighborhood[i][0], cellNeighborhood[i][1], campoMinado, newCell)
                        
                    }

                    

                }
                addScore()

                cellRemain = totalCells - openCells
              
            }

            if (campoMinado.cells[row][column].value === -1) {
                gameEnded = true;
                gameOver = true;
                stopTimer()
                campoMinado.finishGame('perdeu',scoreFinal())
            }

        }

        if ((campoMinado.totalCellsNoBomb === 0) && campoMinado.cells[row][column].value !== -1 && !gameEnded) {
            gameEnded = true;
            gameWin = true;
            stopTimer()
            campoMinado.finishGame('venceu',scoreFinal())
        }

    }
}
