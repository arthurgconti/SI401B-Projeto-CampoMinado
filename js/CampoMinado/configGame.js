function configurationGame() {
    settingButton.setAttribute('disabled', true)
    startingButton.removeAttribute('disabled')
    dimensionX.removeAttribute('disabled')
    dimensionY.removeAttribute('disabled')
    bombs.removeAttribute('disabled')
    gameMode.removeAttribute('disabled')
    startingButton.removeAttribute('disabled')
}

function loadGame() {

    var timer = null

    if (gameMode.value === GAMEMODES.classico)
        timer = timerClassico
    else if (gameMode.value === GAMEMODES.rivotril) {
        timer = timerRivotril
        document.getElementById('tempo').innerText = '02:00'
    } else {
        alert('Selecione um modo de jogo')
        return
    }

    if (dimensionX.value === '' || dimensionY.value === '') {
        alert('Insira as dimensões do campo')
        return
    }

    if (bombs.value === '') {
        alert('Insira a qauntidade de bombas do campo')
        return
    }

    if (timer === null)
        return

    const flag = generateField(dimensionX.value, dimensionY.value, bombs.value, timer)

    if (flag) {
        startingButton.setAttribute('disabled', true)
        dimensionX.setAttribute('disabled', true)
        dimensionY.setAttribute('disabled', true)
        bombs.setAttribute('disabled', true)
        gameMode.setAttribute('disabled', true)
    }


}