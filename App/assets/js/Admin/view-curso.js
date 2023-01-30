// Botão de abrir a modal criar aula
const btnModalCriarAula = document.querySelector('.btn-modal-criar-aula')

// Botão de fechar a modal
const closeBtnCriarAula = document.querySelector('.close-btn1')

// Pega a modal de criar aula
const modalCriarAula = document.getElementById('modal-criar-aula')

// Botão para abrir a modal de confirmação de exclusão
const btnDeletPop = document.querySelector('.btn-aula-excluir')

// modal de confimarção
const modalConf = document.getElementById('modal-confirmacao')

// botão de fechar a modal de confirmação
const closeBtnConfirmacao = document.querySelector('.close-btn2')

// Botão de voltar e não excluir o curso
const undo = document.querySelector('.undo-conf')

// Abre modal de criação de aula
btnModalCriarAula.addEventListener('click', () => {
  modalCriarAula.style.display = 'block'
})
// Fecha a modal de criação de aula
closeBtnCriarAula.addEventListener('click', () => {
  modalCriarAula.style.display = 'none'
})

// Abre modal de exclusão de curso
btnDeletPop.addEventListener('click', () => {
  modalConf.style.display = 'block'
})
// Fecha a modal de exclusão de curso
closeBtnConfirmacao.addEventListener('click', () => {
  modalConf.style.display = 'none'
})
// Fecha a modal de exclusão de curso
undo.addEventListener('click', () => {
  modalConf.style.display = 'none'
})
