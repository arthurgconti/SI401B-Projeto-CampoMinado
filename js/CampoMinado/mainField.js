const settingButton = document.getElementById("setting-button")
const startingButton = document.getElementById("starting-button")
const dimensionX = document.getElementById("dimensaoX")
const dimensionY = document.getElementById("dimensaoY")
const bombs = document.getElementById("bombas")
const gameMode = document.getElementById("modalidade")


startingButton.setAttribute('disabled', true)
dimensionX.setAttribute('disabled', true)
dimensionY.setAttribute('disabled', true)
bombs.setAttribute('disabled', true)
gameMode.setAttribute('disabled', true)

settingButton.addEventListener('click', configurationGame)
startingButton.addEventListener('click', startGame)



