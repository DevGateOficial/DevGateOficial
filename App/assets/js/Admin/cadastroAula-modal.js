// Botão de abrir alguma modal
const btn = document.querySelector('.btn-criar-aula')
// modal geral
const modal = document.getElementById('modal')

// Botões de fechar as modais
const closeBtnModal = document.querySelector('.close-btn')
const closeBtnAula = document.querySelector('.close-btn1')
const closeAtv = document.getElementById('close-atv')

btn.addEventListener('click', function () {
  // Show the modal
  modal.style.display = 'block'
})

closeAtv.addEventListener('click', function () {
  modal.style.display = 'none'
})

closeBtnAula.addEventListener('click', function () {
  // Hide the modal
  modal.style.display = 'none'
})

closeBtnModal.addEventListener('click', function () {
  // Hide the modal
  modal.style.display = 'none'
})

var select = document.getElementById('tipoAtividade')
// id = 1 file input
var input1 = document.getElementById('input-1')
// id =2 video aula
var input2 = document.getElementById('input-2')
// id = 3 material de apoio
var input3 = document.getElementById('input-3')
// Add an event listener to the select element
select.addEventListener('change', function () {
  // Get the selected option's value
  var selectedOption = this.options[this.selectedIndex].value

  // Check if the selected option's value is the one you want
  if (selectedOption === 'videoAula') {
    // Show the file input
    input1.style.display = 'none'
    input2.style.display = 'block'
    input3.style.display = 'none'
  } else if (selectedOption === 'materialApoio') {
    // Hide the file input
    input1.style.display = 'block'
    input2.style.display = 'none'
    input3.style.display = 'none'
  } else if (selectedOption === 'projeto') {
    // Hide the file input
    input1.style.display = 'none'
    input2.style.display = 'none'
    input3.style.display = 'block'
  }
})
