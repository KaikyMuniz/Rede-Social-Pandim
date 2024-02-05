// Puxar mensagem de erro
const labelErro = document.querySelector('#erroMensagem');

// Retorna uma NodeList de todos os inputs
var inputs = document.querySelectorAll('input');

// Converta a NodeList para um array, se necessário
var inputsArray = Array.from(inputs);

// Pegar todos os inputs e verificar se algum foi digitado
for(var i = 0; i < inputsArray['length']; i++) {
    inputsArray[i].addEventListener('input', RemoverAviso);
}

// Caso tenha sido digitado, remover mensagem de erro
function RemoverAviso(e) {
    labelErro.style.display = 'none';
}