let nome = document.querySelector("#nome");
let labelNome = document.querySelector("#labelNome");
let validNome = false;

let data = document.querySelector("#data");
let labelData = document.querySelector("#labelData");
let validData = false;

let cpf = document.querySelector("#cpf");
cpf.setAttribute('maxlength', '14')
let labelCPF = document.querySelector("#labelCPF");
let validCPF = false;

let telefone = document.querySelector("#telefone");
telefone.setAttribute('maxlength', '14')
let labelTelefone = document.querySelector("#labelTelefone");
let validTelefone = false;



nome.addEventListener("keyup", () => {
    if (nome.value.length < 6) {
        labelNome.setAttribute("style", "color: red");
        labelNome.innerHTML = "Nome *Insira no mínimo 6 caracteres.";
        validNome = false;
    } else {
        labelNome.setAttribute("style", "color: green");
        labelNome.innerHTML = "Nome";
        validNome = true;
    }

});

data.addEventListener("keyup", () => {
    if (data.value.length < 10) {
        labelData.setAttribute("style", "color: red");
        labelData.innerHTML = "Data * Insira uma data válida";
        validData = false;
    } else {
        labelData.setAttribute("style", "color: green");
        labelData.innerHTML = "Data";
        validData = true;
    }

});

cpf.addEventListener('input', cpfMask)

cpf.addEventListener("keyup", () => {
    if (cpf.value.length != 14) {
        labelCPF.setAttribute("style", "color: red");
        labelCPF.innerHTML = "CPF * Insira um CPF válido";
        validCPF = false;
    } else {
        labelCPF.setAttribute("style", "color: green");
        labelCPF.innerHTML = "CPF";
        validCPF = true;
    }

});

telefone.addEventListener('input', phoneMask)

telefone.addEventListener("keyup", () => {
    if (telefone.value.length != 14) {
        labelTelefone.setAttribute("style", "color: red");
        labelTelefone.innerHTML = "Telefone * Insira um telefone válido";
        validTelefone = false;
    } else {
        labelTelefone.setAttribute("style", "color: green");
        labelTelefone.innerHTML = "Telefone";
        validTelefone = true;
    }

});

function cadastrar() {
    if (validNome && validData && validCPF && validTelefone) {
        // alert("Prosseguindo");
        return true
    } else {
        alert("Tem campo faltando...");
        return false
    }
}

