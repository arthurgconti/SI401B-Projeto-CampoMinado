function generateField(sizeRow, sizeColumn, bombsQuantity, timer) {
    const campo = document.getElementById('campo')
    const table = document.createElement('table')

    //todo aeasheasea

    if (sizeRow > MAXROWSIZE || sizeColumn > MAXCOLUMNSIZE) {
        alert('Tamanho máximo do campo excedido')
        return false
    }


    if (sizeRow < MINROWSIZE || sizeColumn < MINCOLUMNSIZE) {
        alert('Tamanho menor que o mínimo do campo permitido')
        return false
    }


    if (bombsQuantity > (sizeRow * sizeColumn)) {
        alert('Quantidade máxima de bombas excedido')
        return false
    }

    // for(let i < 0;i<bombsQuantity;i++){
    //     Math.random()
    // }



    // for(let i = 0; i < bombsQuantity; i++) {
	// 	indice = Math.floor(Math.random()*semBomba.length);
	// 	(campo[semBomba[indice].linha][semBomba[indice].coluna]).valor = -1;
	// 	semBomba.splice(indice, 1);
	// }


    //TODO criação das células
    //const celula = 

    
	let noBomb = [];

    for(let i = 0; i < sizeRow; i++) {
		campo[i] = [];
		for(var j = 0; j < sizeColumn; j++) {
			const celula = createCell(0, false, i, j);
			noBomb[(i*sizeColumn) + j] = celula;
			campo[i][j] = celula;
		}
	}
/*
    for(var i = 0; i < bombsQuantity; i++) {
		let index = Math.floor(Math.random()*noBomb.length);
		(campo[noBomb[index].linha][noBomb[index].coluna]).valor = -1;
		noBomb.splice(index, 1);
	}
    */

    for(var i = 0; i < sizeRow; i++) {
		for(var j = 0; j < sizeColumn; j++) {
			if(campo[i][j].valor != -1) {
				var totBombas = 0;

				var coord = [[i+1, j-1], [i, j-1], [i-1, j-1], [i-1, j], 
							[i-1, j+1], [i, j+1], [i+1, j+1], [i+1, j]];

				for(var k = 0; k < 8; k++){
					if(((coord[k][0] >= 0) && (coord[k][1] >= 0))&&((coord[k][0] < sizeRow) && (coord[k][1] < sizeColumn))) 
						if(campo[coord[k][0]][coord[k][1]].valor == -1)
							totBombas++;
				}

				campo[i][j].valor = totBombas;

			}
		}
	}


    for (let i = 0; i < sizeRow; i++) {
        let row = document.createElement('tr')
        for (let j = 0; j < sizeColumn; j++) {
            let column = document.createElement('td')
            column.setAttribute('id', `${i}-${j}`)
            column.addEventListener('click',timer)

            row.appendChild(column)
        }
        table.appendChild(row)
    }

    campo.append(table)

    return true

}