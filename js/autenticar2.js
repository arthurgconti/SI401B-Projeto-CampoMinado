let email = document.querySelector("#email");
let labelEmail = document.querySelector("#labelEmail");
let validEmail = false;

let usuario = document.querySelector("#usuario");
let labelUsuario = document.querySelector("#labelUsuario");
let validUsuario = false;

let senha = document.querySelector("#senha");
let labelSenha = document.querySelector("#labelSenha");
let validSenha = false;

email.addEventListener('input',emailMask)

email.addEventListener("keyup", () => {
    if(email.value.includes("@") == 0){
        labelEmail.setAttribute("style", "color: red");
        labelEmail.innerHTML = "Email * Insira um email válido";
        validEmail = false;
    }
    else{
        labelEmail.setAttribute("style", "color: green");
        labelEmail.innerHTML = "Email";
        validEmail = true;
    }

});

usuario.addEventListener("keyup", () => {
    if(usuario.value.length < 5){
        labelUsuario.setAttribute("style", "color: red");
        labelUsuario.innerHTML = "Usuário * mínimo 5 algarismos";
        validUsuario = false;
    }
    else{
        labelUsuario.setAttribute("style", "color: green");
        labelUsuario.innerHTML = "Usuário";
        validUsuario = true;
    }

});

senha.addEventListener("keyup", () => {
    if(senha.value.length < 5){
        labelSenha.setAttribute("style", "color: red");
        labelSenha.innerHTML = "Senha * mínimo 5 algarismos";
        validSenha = false;
    }
    else{
        labelSenha.setAttribute("style", "color: green");
        labelSenha.innerHTML = "Senha";
        validSenha = true;
    }

});

function cadastrar2(){
    if(validEmail && validUsuario && validSenha){
        alert("Cadastro Concluído");
        window.location.replace("./inicial.php");
    }
    else{
        alert("Tem campo faltando...");
    }
}