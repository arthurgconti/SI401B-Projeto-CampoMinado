const formPerfil = document.forms["form-perfil"]
formPerfil.addEventListener('submit', event => {
    event.preventDefault()
})

function updateProfile(id) {

    const nome = document.getElementById('nome')
    const email = document.getElementById('email')
    const telefone = document.getElementById('telefone')
    const dataNascimento = document.getElementById('dataNascimento')

    fetch("../router/updateProfile.php", {
            method: "PUT",
            body: JSON.stringify({
                id,
                nome: nome.value,
                email: email.value,
                telefone: telefone.value,
                data_nascimento: dataNascimento.value
            })
        })
        .then(response => response.json())
        .then(response => {
            if (response["status"] === 200) {
                alert(response["message"])
                window.location.reload()
            } else {
                window.alert("Ocorreu um erro ao atualizar seus dados!")
            }
        })
        .catch(error => console.error(error))
}