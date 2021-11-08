function generateField(sizeRow, sizeColumn, bombsQuantity, timer) {

    const campo = document.getElementById('campo')
    const table = document.createElement('table')


    // #region validação do campo
    if (sizeRow > MAXROWSIZE || sizeColumn > MAXCOLUMNSIZE) {
        alert('Tamanho máximo do campo excedido')
        return null
    }


    if (sizeRow < MINROWSIZE || sizeColumn < MINCOLUMNSIZE) {
        alert('Tamanho menor que o mínimo do campo permitido')
        return null
    }


    if (bombsQuantity > (sizeRow * sizeColumn)) {
        alert('Quantidade máxima de bombas excedido')
        return null
    }
    // #endregion





    // #region geração de bombas



    //TODO criação das células

    const campoMinado = new CampoMinado(sizeRow, sizeColumn, ((sizeRow * sizeColumn) - bombsQuantity),0,((sizeRow * sizeColumn) - bombsQuantity),0)

    for (let i = 0; i < sizeRow; i++) {
        campoMinado.cells[i] = []
        for (var j = 0; j < sizeColumn; j++) {
            const cell = new Cell(i, j, 0, '', false)
            campoMinado.noBomb[(i * sizeColumn) + j] = cell
            campoMinado.cells[i][j] = cell
        }
    }

    for (let i = 0; i < bombsQuantity; i++) {
        const randomIndex = Math.floor(Math.random() * campoMinado.noBomb.length)
        campoMinado.cells[(campoMinado.noBomb[randomIndex]).row][(campoMinado.noBomb[randomIndex]).column].value = -1
        campoMinado.cells[(campoMinado.noBomb[randomIndex]).row][(campoMinado.noBomb[randomIndex]).column].imageName = IMAGES.bomb
        campoMinado.noBomb.splice(randomIndex, 1)
    }


    // #endregion

    //O(n³)
    for (let i = 0; i < sizeRow; i++) {
        for (let j = 0; j < sizeColumn; j++) {
            if ((campoMinado.cells[i][j]).value !== -1) {
                let totalBombs = 0

                /*
                    i = row
                    j = column

                    [i-1,j-1],[i-1,j],[i-1,j+1]
                    [i,j-1],[i,j],[i,j+1]
                    [i+1,j-1],[i+1,j],[i+1,j+1]
                */
                const cellNeighborhood = [
                    //0    |   1
                    [i + 1, j - 1], //0
                    [i, j - 1], //1
                    [i - 1, j - 1], //2
                    [i - 1, j], //3
                    [i - 1, j + 1], //4
                    [i, j + 1], //5
                    [i + 1, j + 1], //6
                    [i + 1, j] //7
                ];

                for (let k = 0; k < 8; k++) {
                    if (((cellNeighborhood[k][0] >= 0) && (cellNeighborhood[k][1] >= 0)) &&
                        ((cellNeighborhood[k][0] < sizeRow) && (cellNeighborhood[k][1] < sizeColumn)))

                        campoMinado.cells[cellNeighborhood[k][0]][cellNeighborhood[k][1]].value === -1 &&
                        (totalBombs++)

                }

                campoMinado.cells[i][j].value = totalBombs

            }
        }
    }


    // #region GenerateField
    //TODO bombs

    for (let i = 0; i < sizeRow; i++) {
        let row = document.createElement('tr')
        for (let j = 0; j < sizeColumn; j++) {
            let column = document.createElement('td')
            column.setAttribute('id', `${i}-${j}`)
            column.addEventListener('click', timer)

            if (campoMinado.cells[i][j].value != 0) {
                let image = document.createElement("image");
                image.setAttribute("src", `assets/${campoMinado.cells[i][j].imageName}`);
                image.setAttribute("id", `${i}-${j}`);
                image.style.visibility = "hidden";
                column.appendChild(image);
            }
            column.addEventListener('click', campoMinado.cells[i][j].cellClick.bind(event, `${i}-${j}`, campoMinado, column))

            row.appendChild(column)
        }
        table.appendChild(row)
    }

    campo.append(table)
    // #endregion

    return campoMinado

}