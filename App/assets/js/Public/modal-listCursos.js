const curso = document.querySelectorAll('.curso')
const modal = document.getElementById('modal')
const closeButton = document.querySelector('.close-button')

let idCurso_data

curso.forEach(curso => {
  curso.addEventListener('click', () => {
    const idCurso = curso.getAttribute('data-id');
    modal.style.display = "block"

    // AJAX call
    fetch('http://localhost/DevGateOficial/view-curso/viewCursoAJAX/' + idCurso)
      .then(response => {
        if (!response.ok) {
          throw new Error(response.statusText)
        }
        if (response.headers.get("content-type").includes("application/json")) {
          return response.json()
        }
        else {
          throw new Error("Response is not JSON")
        }
      })
      .then(data => {
        // update modal content

        console.log(data);

        const imgCurso = document.getElementById('img-curso');
        imgCurso.src = "http://localhost/DevGateOficial/app/assets/data/cursos/" + data[0].idCurso + "/" + data[0].imagem;

        const nomeCurso = document.getElementById('modal-nomeCurso');
        nomeCurso.innerHTML = data[0].nomeCurso;

        const subtituloCurso = document.getElementById('modal-subtituloCurso');
        subtituloCurso.innerHTML = data[0].subtituloCurso;

        const descricao = document.getElementById('modal-descricao');
        descricao.innerHTML = data[0].descricao;
       
        const objetivos = document.getElementById('modal-objetivos');
        objetivos.innerHTML = data[0].objetivos;

        const requisitos = document.getElementById('modal-requisitos');
        requisitos.innerHTML = data[0].requisitos;

        idCurso_data = data[0].idCurso;
      })
      // .then(() => modal.style.display = "none")
      .catch(error => {
        console.log(error)
        // modal.style.display = "none"
      });
  })
})

closeButton.addEventListener('click', () => {
  modal.style.display = 'none'
})

window.addEventListener('click', e => {
  if (e.target == modal) {
    modal.style.display = 'none'
  }
})

function registerCurso(){
  var url = "http://localhost/DevGateOficial/register-curso/index/" + idCurso_data;
  window.location.href = url;
}

