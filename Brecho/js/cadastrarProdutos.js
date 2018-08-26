//Script do botao para adicionar mais fatos na hora de cadastrar
function mostrarProxFoto(){
    for (i=0;i<=4;i++) {
        if ("none" == document.getElementsByClassName("foto")[i].style.display) {
            var qualFotoEsta = i;
            break;
        }
    }
    if (qualFotoEsta <= 4) {
        document.getElementsByClassName("foto")[qualFotoEsta].style.display = 'block';
        var tamanhoHeight = document.getElementById("login-box").style.height;
        if (tamanhoHeight == "750px"){tamanhoHeight="770px";}
        if (tamanhoHeight == "700px"){tamanhoHeight="750px";}
        if (tamanhoHeight == "650px"){tamanhoHeight="700px";}
        if (tamanhoHeight == ""){tamanhoHeight="650px";}
        document.getElementById("login-box").style.height = tamanhoHeight;
    } 
    //Sumir com o botao adicionar se chegar a 5 imagens (0 a 4)
    if (qualFotoEsta == 4){            
        document.getElementsByClassName("botaoAdicionar")[0].style.display = 'none';
    }
}

function mostrarNomeFoto(numFoto) {
    document.getElementById("uploadBtn"+numFoto).onchange = function () {
        document.getElementById("uploadFile"+numFoto).value = this.value;
    };
}