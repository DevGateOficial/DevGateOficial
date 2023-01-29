document.getElementById("tipoAtividade").addEventListener("change", function () {
  switch (this.value) {
    case "videoAula":
      document.getElementById("input-1").style = `display: block;`
      document.getElementById("input-1").placeholder = "URL do vídeo";
      document.getElementById("campo-input").type = "text";
      break;
    case "materialApoio":
      document.getElementById("input-1").style = `display: block;`
      document.getElementById("input-1").placeholder = "Selecione o arquivo";
      document.getElementById("campo-input").type = "file";
      break;
    case "projeto":
      document.getElementById("input-1").style = `display: block;`
      document.getElementById("input-1").placeholder = "URL da proposta de projeto";
      document.getElementById("campo-input").type = "file";
      break;
    default:
      break;
  }
});


// VERIFICAÇÃO DA URL NO CADASTRO DE ATIVIDADE

// Seleciona o input onde será inserida a URL
const url_atividade = document.querySelector('.url_atividade');
// Seleciona o elemento onde será exibida a mensagem
let msg = document.getElementById('msg-url')

// Adiciona um evento de "input" ao input, ou seja, sempre que o valor do input for alterado, a função será chamada
url_atividade.addEventListener('input', function () {

  // Recebe o tipo da atividade
  const tipoAtividade = document.getElementById("tipoAtividade").value

  // Armazena o valor atual do input
  let link = url_atividade.value

  // Caso a atividade seja do tipo `videoAula` -> chama a função que verifica se a URL é válida
  if (tipoAtividade === 'videoAula') {
    verifyUrl(link)
  } else {
    msg.style.display = 'none'
  }

});

// Função que verifica se a URL é válida
function verifyUrl(link) {
  console.log(link)

  // Verifica se a URL inclui "youtube.com" ou "youtu.be"
  if (link.includes("youtube.com") || link.includes("youtu.be")) {
    // Armazena o ID do vídeo a partir da URL
    const videoId = link.split("v=")[1];
    // Verifica se o ID do vídeo existe e tem 11 caracteres
    if (videoId && videoId.length === 11) {
      // Chama a função que exibe a mensagem de URL válida
      alerUrl(true)
    } else {
      // Chama a função que exibe a mensagem de URL inválida
      alerUrl(false)
    }
  } else {
    // Se não for um link do youtube, chama a função que exibe a mensagem de URL inválida
    alerUrl(false)
  }
}

// Função que exibe a mensagem de URL válida ou inválida
function alerUrl(result) {
  // Verifica se a URL é válida ou inválida e exibe a mensagem correspondente
  msg.style.display = 'block'
  
  if (result) {
    msg.innerHTML = 'Link é válido'
    msg.style.color = 'limegreen';
  } else {
    msg.innerHTML = 'Link não é válido'
    msg.style.color = 'red';
  }
}





