var seconds = 0
var gamemodeTimer
document.getElementById('tempo').innerText = '00:00'


function timerClassico() {
    if (!gameStarted) {
        gameStarted = !gameStarted
        gamemodeTimer = setInterval(() => {
            const showTimer = document.getElementById('tempo')
            let minutes, seconds


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
        }, 1000)
    }
}

function timerRivotril() {
    if (!gameStarted) {
        gameStarted = !gameStarted
        gamemodeTimer = setInterval(() => {

            const showTimer = document.getElementById('tempo')
            let minutes, seconds

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
            }
        }, 1000)
    }
}

function stopTimer() {
    clearInterval(gamemodeTimer)
}