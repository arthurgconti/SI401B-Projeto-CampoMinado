//DONE CpfMask
function cpfMask() {

    cpf.value = cpf.value
        .replace(/\D/g, '')
        .replace(/(\d{3})(\d)/, '$1.$2')
        .replace(/(\d{3})(\d)/, '$1.$2')
        .replace(/(\d{3})(\d{1,2})/, '$1-$2')
        .replace(/(-\d{2})\d+?$/, '$1')
}

//DONE TelefoneMask
function phoneMask() {
    telefone.value = telefone.value.replace(/\D/g, '').replace(/(\d{2})(\d)/, '($1)$2')
        .replace(/(\d{5})(\d)/, '$1-$2')
        .replace(/(\d{5})-(\d{4})+?$/, '$1-$2')
}

//DONE emailValidator
function emailMask() {
    const emailMask = email.value
    //regex minha
    // if (emailMask.match(RegExp('^[a-zA-Z0-9]+@+[a-z]+.com$', 'g')))
    //regex da própria w3c
    if (emailMask.match(RegExp('^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$', 'g'))){
        console.log('match')
        return true
    }
    else{
        console.log("notmatch");
        return false
    }
}

//DONE CPF validator
function verificarCPF(cpf) {
    if (!/[0-9]{11}/.test(cpf)) return false;

    if (cpf === "00000000000") return false;
    if (cpf === "11111111111") return false;
    if (cpf === "22222222222") return false;
    if (cpf === "33333333333") return false;
    if (cpf === "44444444444") return false;
    if (cpf === "55555555555") return false;
    if (cpf === "66666666666") return false;
    if (cpf === "77777777777") return false;
    if (cpf === "88888888888") return false;
    if (cpf === "99999999999") return false;

    let Soma;
    let Resto;
    Soma = 0;


    for (let i = 1; i <= 9; i++) Soma = Soma + parseInt(cpf.substring(i - 1, i)) * (11 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto === 10) || (Resto === 11)) Resto = 0;
    if (Resto !== parseInt(cpf.substring(9, 10))) return false;

    Soma = 0;
    for (let i = 1; i <= 10; i++) Soma = Soma + parseInt(cpf.substring(i - 1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto === 10) || (Resto === 11)) Resto = 0;
    if (Resto !== parseInt(cpf.substring(10, 11))) return false;
    return true;
}