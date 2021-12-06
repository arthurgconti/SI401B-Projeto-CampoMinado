let dimensaoX = document.getElementById("X");
let dimensaoY = document.getElementById("Y");
let labelDimensao = document.querySelector("#labelDimensao");
let validDimensao = false;
let tabela = document.getElementById("tabela");


    
    
        
    

window.onload=function(){
    dimensaoX.addEventListener("keyup", () => {
        if(dimensaoX.value < 9 || dimensaoX.value > 20){
            labelDimensao.setAttribute("style", "color: red");
            labelDimensao.innerHTML = "Insira dimensões entre 9 e 20";
            validDimensao = false;
        }
        else{
            labelDimensao.setAttribute("style", "color: black");
            labelDimensao.innerHTML = "Dimensões do campo";
            validDimensao = true;
        }
    
    });

    dimensaoX.addEventListener('input', () => {
        dimensaoY.value = dimensaoX.value
    })
  }