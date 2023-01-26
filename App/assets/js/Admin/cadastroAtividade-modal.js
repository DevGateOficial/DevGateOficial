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
