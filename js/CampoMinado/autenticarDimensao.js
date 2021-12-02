let dimensaoX = document.querySelector("#dimensaoX");
let labelDimensao = document.querySelector("#labelDimensao");
let validDimensao = false;

let bombas = document.querySelector("#bombas");
let labelBomba = document.querySelector("#labelBomba");
let validBomba = false;

dimensaoX.addEventListener("keyup", () => {
    if(dimensaoX.value < 9 || dimensaoX.value > 20){
        labelDimensao.setAttribute("style", "color: red");
        labelDimensao.innerHTML = "Insira dimensões entre 9 e 20";
        validDimensao = false;
    }
    else{
        labelDimensao.setAttribute("style", "color: white");
        labelDimensao.innerHTML = "Dimensões do campo";
        validDimensao = true;
    }

});

bombas.addEventListener("keyup", () => {
    if(bombas.value > (dimensaoX.value * 2)){
        labelBomba.setAttribute("style", "color: red");
        labelBomba.innerHTML = "Quantidade de bombas excedida";
        validBomba = false;
    }
    else{
        labelBomba.setAttribute("style", "color: white");
        labelBomba.innerHTML = "Número de Bombas";
        validBomba = true;
    }

});