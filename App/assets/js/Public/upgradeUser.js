let usuarioInfo = document.querySelector('#usuarioInfo');

let enderecoInfo = document.querySelector('#enderecoInfo');

let continuar = document.getElementById('continuar');
let voltar = document.getElementById('voltar');

let cpf = document.getElementsByName('cpf');
let telefone = document.getElementsByName('telefone');

continuar.addEventListener('click', function(e) {
    usuarioInfo.setAttribute('style', 'display:none;');
    enderecoInfo.setAttribute('style', 'display:true;');
});

