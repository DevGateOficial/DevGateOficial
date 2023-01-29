let input = document.getElementById("file-input");
let label = document.getElementById("file-label");
let photo = document.getElementById("file-icon");

// É acionado quando o usuário adiciona uma imagem no campo de input
input.addEventListener('change', function (e) {
    let file = input.files[0];
    let fileName = file.name;

    //coloca o nome do arquivo visivel para o usuario
    label.innerHTML = fileName;
});
