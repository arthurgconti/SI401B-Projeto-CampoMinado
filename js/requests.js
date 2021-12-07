let xhttp

function sendRegisterGame(campoMinado, time, result) {
    xhttp = new XMLHttpRequest()

    const bodyRequest = {
        dimensao_campo: campoMinado.sizeRow,
        area_campo: (campoMinado.sizeRow * campoMinado.sizeColumn),
        numero_bombas: campoMinado.numBomb,
        modalidade: campoMinado.gamemode,
        tempo_gasto: time,
        resultado: result,
        pontuacao: campoMinado.score
    }

    if (!xhttp) {
        alert('Não foi possível criar um objeto XMLHttpRequest.')
        return false
    }

    xhttp.onreadystatechange = handleRegisterGame
    xhttp.open('POST', '../routes/insertPartida.php', true)
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    const stringRequest = "cod_usuario=" + encodeURIComponent(bodyRequest.cod_usuario) + "&dimensao_campo=" + encodeURIComponent(bodyRequest.dimensao_campo) +
        "&area_campo=" + encodeURIComponent(bodyRequest.area_campo) + "&numero_bombas=" +
        encodeURIComponent(bodyRequest.numero_bombas) + "&modalidade=" + encodeURIComponent(bodyRequest.modalidade) +
        "&tempo_gasto=" + encodeURIComponent(bodyRequest.tempo_gasto) + "&resultado=" + encodeURIComponent(bodyRequest.resultado) +
        "&pontuacao=" + encodeURIComponent(bodyRequest.pontuacao)

    xhttp.send(stringRequest)

}

function handleRegisterGame() {
    try {
        if (xhttp.readyState === XMLHttpRequest.DONE) {
            if (xhttp.status === 200) {
                const response = JSON.parse(xhttp.response)          
                alert(response.message);

            } else {
                alert('Um problema ocorreu.');
            }
        }
    } catch (e) {
        console.warn(xhttp.responseText)
        console.log("Ocorreu uma exceção: " + e);
    }
}

function login() {

    const usuario = document.getElementById('usu')
    const password = document.getElementById('pass')

    fetch("../routes/login.php", {
            method: "POST",
            body: JSON.stringify({
                usuario: usuario.value,
                senha: password.value
            })
        })
        .then(response => response.json())
        .then(response => {
            if (response["status"] === 200) {
                window.location.replace("../pages/campo_minado.php")
            } else {
                window.alert("Usuário ou senha incorretos")
            }
        })
        .catch(error => console.error(error))

}