/*
                     os tipos de variáveis
    var  -> As variáveis declaradas com var têm escopo de função. Isso significa que a variável é visível em toda a função em que é declarada.

    let  ->As variáveis declaradas com let têm escopo de bloco. Isso significa que a variável é visível apenas dentro do bloco em que é declarada.

    const ->As variáveis declaradas com const são constantes e não podem ser reassinadas após a atribuição inicial.
*/

const botaoMobile = document.getElementById('botao-mobile'); 
const menu = document.getElementById('menu'); 

botaoMobile.addEventListener("click", function(){
    menu.classList.toggle('menu-ativo');
}) 
