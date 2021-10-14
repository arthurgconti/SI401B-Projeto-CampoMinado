let nome = document.querySelector("#nome");
let labelNome = document.querySelector("#labelNome");
let validNome = false;

let data = document.querySelector("#data");
let labelData = document.querySelector("#labelData");
let validData = false;

let cpf = document.querySelector("#cpf");
let labelCPF = document.querySelector("#labelCPF");
let validCPF = false;

let telefone = document.querySelector("#telefone");
let labelTelefone = document.querySelector("#labelTelefone");
let validTelefone = false;




nome.addEventListener("keyup", () => {
    if(nome.value.length < 6){
        labelNome.setAttribute("style", "color: red");
        labelNome.innerHTML = "Nome *Insira no mínimo 3 caracteres.";
        validNome = false;
    }
    else{
        labelNome.setAttribute("style", "color: green");
        labelNome.innerHTML = "Nome";
        validNome = true;
    }

});

data.addEventListener("keyup", () => {
    if(data.value.length < 10){
        labelData.setAttribute("style", "color: red");
        labelData.innerHTML = "Data * Insira uma data válida";
        validData = false;
    }
    else{
        labelData.setAttribute("style", "color: green");
        labelData.innerHTML = "Data";
        validData = true;
    }

});

cpf.addEventListener("keyup", () => {
    if(cpf.value.length != 11){
        labelCPF.setAttribute("style", "color: red");
        labelCPF.innerHTML = "CPF * Insira um CPF válido";
        validCPF = false;
    }
    else{
        labelCPF.setAttribute("style", "color: green");
        labelCPF.innerHTML = "CPF";
        validCPF = true;
    }

});

telefone.addEventListener("keyup", () => {
    if(telefone.value.length != 11){
        labelTelefone.setAttribute("style", "color: red");
        labelTelefone.innerHTML = "Telefone * Insira um telefone válido";
        validTelefone = false;
    }
    else{
        labelTelefone.setAttribute("style", "color: green");
        labelTelefone.innerHTML = "Telefone";
        validTelefone = true;
    }

});

function cadastrar(){
    if(validNome && validData && validCPF && validTelefone){
        alert("Prosseguindo");
        window.location.replace("../pages/cadastro2.html");
    }
    else{
        alert("Tem campo faltando...");
    }
}