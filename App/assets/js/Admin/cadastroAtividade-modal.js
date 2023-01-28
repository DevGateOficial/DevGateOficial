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



const controller = 'http://localhost/DevGateOficial/admin-cadastro-atividade/verifyUrl/';
const url_atividade = document.querySelector('.url_atividade');
const valor = encodeURIComponent(url_atividade.value);

url_atividade.addEventListener('input', function() {
  

console.log(encodeURIComponent(url_atividade.value))

  // fetch(controller + encodeURIComponent(url_atividade.value))
  // .then(response => response.json())
  // .then(data => {
  //   console.log(data)
  // })
});


