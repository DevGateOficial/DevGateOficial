const modal_solicitacoes = document.getElementById('modal-solicitacoes')

function viewSolicitacao(usuario){
    console.log("Abriu a modal")
    modal_solicitacoes.style = 'display: block;'

    updateModalContent(usuario);
}

function updateModalContent(usuario) {

    console.log(usuario);

    const nomeCompleto = document.querySelector('#nomeCompleto');
    nomeCompleto.textContent = usuario.nomeCompleto;

    const nomeUsuario = document.querySelector('#nomeUsuario');
    nomeUsuario.textContent = usuario.nomeUsuario;

    const cpf = document.querySelector('#cpf');
    cpf.textContent = usuario.cpf;

    const telefone = document.querySelector('#telefone');
    telefone.textContent = usuario.telefone;

    const nomeLogradouro = document.querySelector('#nomeLogradouro');
    nomeLogradouro.textContent = usuario.nomeLogradouro;

    const numero = document.querySelector('#numero');
    numero.textContent = usuario.numero;

    const bairro = document.querySelector('#bairro');
    bairro.textContent = usuario.bairro;

    const cep = document.querySelector('#cep');
    cep.textContent = usuario.cep;

    const cidade = document.querySelector('#cidade');
    cidade.textContent = usuario.cidade;

    const pais = document.querySelector('#pais');
    pais.textContent = usuario.pais;
}


function closeSolicitacao(){
    modal_solicitacoes.style = 'display: none;'
}

