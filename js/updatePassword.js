const formPassword = document.forms["update-password"]
formPassword.addEventListener('submit', event => {
    event.preventDefault()
})

const pass = document.getElementById('pass')
const cpass = document.getElementById('cpass')
const buttonSubmit = document.getElementById('submitButton')
cpass.addEventListener('focusout', () => {
    if (pass.value !== "") {
        if (!(pass.value === cpass.value)) {
            buttonSubmit.setAttribute('disabled', true)
            alert('As senhas não coincidem!')

        } 
    }
})

cpass.addEventListener('input', () => {
    buttonSubmit.removeAttribute('disabled')
})

function updatePassword(id) {

    const pass = document.getElementById('pass')


    fetch("../router/updatePassword.php", {
            method: "PUT",
            body: JSON.stringify({
                id,
                senha: pass.value
            })
        })
        .then(response => response.json())
        .then(response => {
            if (response["status"] === 200) {
                alert(response["message"])
                pass.value=""
                cpass.value=""
                pass.focus()
            } else {
                window.alert("Ocorreu um erro ao atualizar sua senha!")
            }
        })
        .catch(error => console.error(error))
}