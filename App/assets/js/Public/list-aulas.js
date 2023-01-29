let url = 'http://localhost/DevGateOficial/aula-assistida/index/'
let url_viewAula = 'http://localhost/DevGateOficial/view-aula/viewAulaAJAX/'
let url_listAtividades =
  'http://localhost/DevGateOficial/list-atividades/listAtividadesAJAX/'
let url_files = 'http://localhost/DevGateOficial/app/assets/data/atividades/'

function checkAula(idAula) {
  console.log(url + idAula)

  fetch(url + idAula)
    // .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.log(error))
}

// Pegar os dados da aula
window.addEventListener('load', function () {
  const aula_padrao = document.getElementById('aula-padrao').getAttribute('data-id');
  console.log(aula_padrao);
  getAula(aula_padrao);
  getAtividades(aula_padrao);
})

//verifica a aula que foi clicada
const aulas = document.querySelectorAll('#aula-side')
aulas.forEach(aula => {
  aula.addEventListener('click', function () {
    const idAula = this.getAttribute('data-id')

    //instancia o getAula
    getAula(idAula)

    //instancia o getAtividades
    getAtividades(idAula)
  })
})

//requisita os dados da aula clicada para o controller
function getAula(idAula) {
  fetch(url_viewAula + idAula)
    .then(response => response.json())
    .then(data => {
      console.log(data)
      updateContent(data)
    })
}

//atualiza o conteudo da aula no HTML
function updateContent(data) {
  const tituloAula = document.querySelector('.titulo-aula')
  const descAula = document.querySelector('.desc-aula')

  tituloAula.textContent = data[0].nomeAula
  descAula.innerHTML = data[0].descricao
}

function getAtividades(idAula) {
  fetch(url_listAtividades + idAula)
    .then(response => response.json())
    .then(data => {
      console.log(data)
      updateContentAtiv(data)
    })
}

// atualiza as atividades no HTML
function updateContentAtiv(data) {
  const atividades = data
  const atividadesContainer = document.querySelector('.atividades-container')
  const atividadeDiv = document.createElement('div')

  atividadesContainer.innerHTML = ''

  atividades.forEach(atividade => {
    // Create a new div for each activity
    const atividadeDiv = document.createElement('div')
    atividadeDiv.classList.add('atividade', 'btn-atividade')
    atividadeDiv.classList.add('atividade')
    atividadeDiv.setAttribute('id', atividade.idAtividade)

    atividadeDiv.addEventListener('click', function () {
      showModalAtividade(atividade)
    })

    if (atividade.tipoAtividade === 'videoAula') {
      atividadeDiv.innerHTML = `<span class="material-symbols-sharp"> play_circle </span>
            <div class="atv-text-wrap">
            <h4>${atividade.nomeAtividade}</h4>
            <p>${atividade.descricao}</p> 
            </div>
            `
      atividadeDiv.classList.add('btn-atividade-video')
    } else {
      atividadeDiv.innerHTML = `<span class="material-symbols-sharp"> picture_as_pdf </span>
            <div class="atv-text-wrap">
            <h4>${atividade.nomeAtividade}</h4>
            <p>${atividade.descricao}</p>
            </div>
            `
      atividadeDiv.classList.add('btn-atividade-pdf')
    }

    // Add the div to the container
    atividadesContainer.appendChild(atividadeDiv)
  })
}

function showModalAtividade(atividade) {
  // buscar os dados da atividade pelo id
  // exibir a modal
  const modal = document.querySelector('#modal')
  modal.style.display = 'block'

  // preencher o conteúdo da modal com os dados da atividade
  const modalTxt = document.querySelector('.modal-txt')
  modalTxt.innerHTML = `<p class="desc-atv">${atividade.descricao}</p><h4 class="titulo-atv">${atividade.nomeAtividade}</h4>`

  // adicionar o link ou iframe para a url, dependendo do tipo de atividade
  if (atividade.tipoAtividade === 'videoAula') {
    modalTxt.innerHTML += `<blockquote class="embedly-card" ><h4>
                                <a href="${atividade.url}"></a>
                                </h4></blockquote>`
  } else {
    // modalTxt.innerHTML += `<embed src="${url_files + atividade.idAtividade + '/' + atividade.url}" type="application/pdf" frameBorder="0" scrolling="auto" height="80%" width="80%"></embed>`;

    modalTxt.innerHTML +=
      '<object data="' +
      url_files +
      atividade.idAtividade +
      '/' +
      atividade.url +
      '" type="application/pdf" width="800px" height="600px"></object>'
  }
}
