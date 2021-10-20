function generateField(sizeRow, sizeColumn, bombsQuantity, timer) {
    const campo = document.getElementById('campo')
    const table = document.createElement('table')

    if (sizeRow > MAXROWSIZE || sizeColumn > MAXCOLUMNSIZE){
        alert('Tamanho máximo do campo excedido')
        return
    }
    if(bombsQuantity > sizeRow*sizeColumn){
        alert('Quantidade máxima de bombas excedido')
        return
    }
    
        

    for (let i = 0; i < sizeRow; i++) {
        let row = document.createElement('tr')
        for (let j = 0; j < sizeColumn; j++) {
            let column = document.createElement('td')
            column.setAttribute('id', `${i}-${j}`)

            row.appendChild(column)
        }
        table.appendChild(row)
    }

    campo.append(table)

}