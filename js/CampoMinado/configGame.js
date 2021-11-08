var campoMinadoGenerated

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

    campoMinadoGenerated = generateField(dimensionX.value, dimensionY.value, bombs.value, timer, gameMode.value)

    if (campoMinadoGenerated) {
        startingButton.setAttribute('disabled', true)
        dimensionX.setAttribute('disabled', true)
        dimensionY.setAttribute('disabled', true)
        bombs.setAttribute('disabled', true)
        gameMode.setAttribute('disabled', true)
        document.getElementById('cheat').addEventListener('click', campoMinadoGenerated.cheatFunction)
    }
}

function unloadGame() {
    settingButton.innerText = 'Configurar'
    settingButton.removeEventListener('click', unloadGame)
    settingButton.addEventListener('click', configurationGame)
    dimensionX.value = ''
    dimensionY.value = ''
    bombs.value = ''
    gameMode.value = 'default'
    document.getElementById('tempo').innerText = ''
    document.getElementById('cellsRemaining').innerText = ''
    document.getElementById('cheat').removeEventListener('click', campoMinadoGenerated.cheatFunction)
    campoMinadoGenerated = {}
    gameStarted = false
    gameEnded = false
    gameOver = false
    gameWin = false
    document.getElementById('campo').removeChild(document.getElementsByTagName('table')[0])
}