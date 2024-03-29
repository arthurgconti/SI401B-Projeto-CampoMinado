var seconds
var minutes
var gamemodeTimer
var totalTime = 0

//DONE startTimer on Click
function timerClassico() {
    if (!gameStarted) {
        document.getElementById('tempo').innerText = '00:00'
        gameStarted = true
        gamemodeTimer = setInterval(() => {
            const showTimer = document.getElementById('tempo')


            const newTime = showTimer.innerText.split(':')
            const tempMinutes = parseInt(newTime[0]) + 1
            const tempSeconds = parseInt(newTime[1]) + 1

            if (newTime[1] >= 59) {
                minutes = (tempMinutes) < 10 ? (`0${tempMinutes}`) : tempMinutes
                seconds = `00`
            } else {
                minutes = newTime[0]
                seconds = tempSeconds < 10 ? `0${tempSeconds}` : tempSeconds
            }
            showTimer.innerHTML = `${minutes}:${seconds}`
            totalTime++
        }, 1000)
    }
}

function timerRivotril() {
    if (!gameStarted) {
        document.getElementById('tempo').innerText = '01:00'
        gameStarted = true
        gamemodeTimer = setInterval(() => {

            const showTimer = document.getElementById('tempo')

            const newTime = showTimer.innerText.split(':')
            const tempMinutes = parseInt(newTime[0]) - 1
            const tempSeconds = parseInt(newTime[1]) - 1

            if (newTime[1] === '00') {
                minutes = (tempMinutes) < 10 ? (`0${tempMinutes}`) : tempMinutes
                seconds = `59`
            } else {
                minutes = newTime[0]
                seconds = tempSeconds < 10 ? `0${tempSeconds}` : tempSeconds
            }
            showTimer.innerHTML = `${minutes}:${seconds}`
            if (parseInt(minutes) === 0 && parseInt(seconds) === 0) {
                stopTimer()
                alert('o tempo acabou')
                stopTimer()
                gameEnded = true;
                if (!gameOver)
                    campoMinadoGenerated.finishGame('perdeu', scoreFinal(campoMinadoGenerated))
                gameOver = true;
            }
            totalTime++
        }, 1000)
    }
}

function stopTimer() {
    clearInterval(gamemodeTimer)
}