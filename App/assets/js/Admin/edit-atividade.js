//EDIÇÃO DA ATIVIDADE
const edit_atividade = document.getElementById('edit-ativ');
const atividade = document.getElementById('modal-editAtiv');
const close_atividade = document.getElementById('close-editAtiv');

//Event listener para abrir o modal de edição de atividade
edit_atividade.addEventListener('click', function () {
    //Exibe o modal de edição de atividade
    atividade.style.display = 'block';
});

//Event listener para fechar o modal de edição de atividade
close_atividade.addEventListener('click', function () {
    //Oculta o modal de edição de atividade
    atividade.style.display = 'none';
});


// CAMPO DE INPUT
document.addEventListener("DOMContentLoaded", function () {

    // Obtém o elemento do tipo de atividade
    const tipoAtividade = document.getElementById("tipoAtividade");
    // Obtém o elemento da caixa de input
    const inputBox = document.getElementById("inputBox");
    // Obtém o elemento da URL de input
    const inputUrl = document.getElementById("campo-input");

    const label = document.getElementById("file-label-atividade");
    console.log(inputUrl.value)
    label.innerHTML = inputUrl.value

    // Verifica se o tipo de atividade é "videoAula"
    if (tipoAtividade.value === "videoAula") {
        // Exibe a caixa de input
        inputBox.style.display = "block";
        // Altera o tipo de input para "text"
        inputUrl.type = 'text'
    } else {
        // Exibe a caixa de input
        inputBox.style.display = "block";
        // Altera o tipo de input para "file"
        inputUrl.type = 'file';
    }

    // Adiciona um ouvinte de eventos "change" ao tipo de atividade
    tipoAtividade.addEventListener("change", function () {
        // Verifica se o valor selecionado é "videoAula"
        if (this.value === "videoAula") {
            // Exibe a caixa de input
            inputBox.style.display = "block";
            // Altera o tipo de input para "text"
            inputUrl.type = 'text'
        } else {
            // Exibe a caixa de input
            inputBox.style.display = "block";
            // Altera o tipo de input para "file"
            inputUrl.type = 'file'
        }
    });
});





