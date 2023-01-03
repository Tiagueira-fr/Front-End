/* Ações da pagina de curriculo */ 

//Exercicio 1

window.addEventListener('DOMContentLoaded' , function(){
    const nodeH1 = document.querySelector("h1");
    nodeH1.onclick = function(){ 
        nodeH1.textContent = "Dono do curriculo";
    }
});

window.addEventListener('DOMContentLoaded' , function(){
    const nodeH2 = document.querySelector("h2");
    nodeH2.onclick = function(){
        nodeH2.textContent = "Obrigado";
    }
});

//Exercicio 2

window.addEventListener('DOMContentLoaded' , function(){
    const sectionH2 = document.querySelector("section");
    sectionH2.ondblclick = function(){
            
    }
});
