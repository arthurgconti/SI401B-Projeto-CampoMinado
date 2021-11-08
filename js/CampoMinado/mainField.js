const settingButton = document.getElementById("setting-button")
const startingButton = document.getElementById("starting-button")
const dimensionX = document.getElementById("dimensaoX")
const dimensionY = document.getElementById("dimensaoY")
const bombs = document.getElementById("bombas")
const gameMode = document.getElementById("modalidade")
const cellsRemainingElement = document.getElementById("cellsRemaining")
var gameStarted = false
var gameEnded = false
var gameOver = false
var gameWin = false


startingButton.setAttribute('disabled', true)
dimensionX.setAttribute('disabled', true)
dimensionY.setAttribute('disabled', true)
bombs.setAttribute('disabled', true)
gameMode.setAttribute('disabled', true)

settingButton.addEventListener('click', configurationGame)
startingButton.addEventListener('click', loadGame)



