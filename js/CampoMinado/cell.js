class Cell {

    /**
     * @params row Linhas que a célula está
     * @params column Coluna do campo que a Célula está
     * @params value Valor da célula | -1 bomba, 0 vazio, >0 n de bombas
     * @params imageName nome da imagem na pasta assets
     * @params state Status: aberto/fechado
     * @return Retorna um objeto com os paramêtros passados
     */
    constructor(row, column, value, imageName, state) {
        this.row = row
        this.column = column
        this.value = value
        this.imageName = imageName
        this.state = state
    }

    cellClick(id, campoMinado, cell) {
        const idCell = id.split('-')
        if (!campoMinado.cells[parseInt(idCell[0])][parseInt(idCell[1])].state)
            Cell.checkCell(parseInt(idCell[0]), parseInt(idCell[1]), campoMinado, cell)
    }

    static openCell(row, column, campoMinado, cell) {
        if (campoMinado.cells[row][column].value > 0) {
            cell.innerHTML = campoMinado.cells[row][column].value
            console.log('abril');
        }

        if (campoMinado.cells[row][column].value === -1)
            cell.style.background = "red"
        else if (campoMinado.cells[row][column].value === 0)
            cell.style.background = "black"
        else
            cell.style.background = "rgb(36, 150, 241)";
    }

    static closeCell(row, column, campoMinado, cell) {
        cell.style.background = "#999999";

        if (campoMinado.cells[linha][coluna].valor !== 0) {
            const image = document.getElementById(`${row}-${column}`);
            image.style.visibility = "hidden";
        }
    }

    static checkCell(row, column, campoMinado, cell) {
        console.log(campoMinado.cells[row][column].state)
        console.log(row, column, campoMinado.cells[row][column]);

        if (!campoMinado.cells[row][column].state) {
            Cell.openCell(row, column, campoMinado, cell)

            campoMinado.cells[row][column].state = true


            if (campoMinado.cells[row][column].value === 0) {
                const cellNeighborhood = [
                    //0    |   1
                    [row + 1, column - 1], //0
                    [row, column - 1], //1
                    [row - 1, column - 1], //2
                    [row - 1, column], //3
                    [row - 1, column + 1], //4
                    [row, column + 1], //5
                    [row + 1, column + 1], //6
                    [row + 1, column] //7
                ]

                for (let k = 0; k < 8; k++) {
                    if (((cellNeighborhood[k][0] >= 0) && (cellNeighborhood[k][1] >= 0)) &&
                        ((cellNeighborhood[k][0] < sizeRow) && (cellNeighborhood[k][1] < sizeColumn)))
                        checkCell(cellNeighborhood[k, 0], cellNeighborhood[k, 1])

                }
            }

            if (campoMinado.cells[row][column].value === -1) {
                // gameEnded = true
                // stopTimer()
            }

        }
    }
}