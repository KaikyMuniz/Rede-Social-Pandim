const deslogarBtn = document.querySelector('#deslogar-btn');

deslogarBtn.addEventListener('click', RedirecionarDesconectar);

function RedirecionarDesconectar(){
    window.location.href = 'assets/php/Desconectar.php';
}


const postagemBtn = document.querySelector('#postagem-btn');

postagemBtn.addEventListener('click', RedirecionarPostagem);

function RedirecionarPostagem(){
    window.location.href = 'assets/pages/criar-postagem.php';
}