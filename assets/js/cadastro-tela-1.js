const inputImagem = document.querySelector('#escolher-imagem-input');
const imagem = document.querySelector('#escolher-imagem');

inputImagem.addEventListener('change', AddImagem);

function AddImagem(e){
    const file = inputImagem.files[0]; // Obtém o arquivo selecionado

    if (file) {
        const reader = new FileReader(); // Cria um FileReader para ler o arquivo

        reader.onload = function(e) {
            imagem.src = e.target.result; // Define a src da imagem como o conteúdo do arquivo
            imagem.style.filter = 'invert(0)';
        }

        reader.readAsDataURL(file); // Lê o conteúdo do arquivo como uma URL
    } else {
        imagem.src = '../image/icon/perfil icon.png'; // Define a src da imagem como vazia
        imagem.style.filter = 'invert(1)';
    }
}