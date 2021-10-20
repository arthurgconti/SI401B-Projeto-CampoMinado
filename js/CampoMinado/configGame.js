function configurationGame() {
    settingButton.setAttribute('disabled', true)
    startingButton.removeAttribute('disabled')
    dimensionX.removeAttribute('disabled')
    dimensionY.removeAttribute('disabled')
    bombs.removeAttribute('disabled')
    gameMode.removeAttribute('disabled')
    startingButton.removeAttribute('disabled')
}

function startGame() {
    startingButton.setAttribute('disabled', true)
    dimensionX.setAttribute('disabled', true)
    dimensionY.setAttribute('disabled', true)
    bombs.setAttribute('disabled', true)
    gameMode.setAttribute('disabled', true)
}