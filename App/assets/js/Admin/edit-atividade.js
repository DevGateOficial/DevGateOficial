//EDIÇÃO DA ATIVIDADE
const edit_atividade = document.getElementById('edit-ativ')
const atividade = document.getElementById('modal-editAtiv')
const close_atividade = document.getElementById('close-editAtiv')

//Event listener para abrir o modal de edição de atividade
edit_atividade.addEventListener('click', function () {
  //Exibe o modal de edição de atividade
  atividade.style.display = 'block'
})

//Event listener para fechar o modal de edição de atividade
close_atividade.addEventListener('click', function () {
  //Oculta o modal de edição de atividade
  atividade.style.display = 'none'
})

// CAMPO DE INPUT
document.addEventListener('DOMContentLoaded', function () {
  // Obtém o elemento do tipo de atividade
  const tipoAtividade = document.getElementById('tipoAtividade')
  // Obtém o elemento da caixa de input
  const inputBox = document.getElementById('inputBox')
  // Obtém o elemento da URL de input
  const inputUrl = document.getElementById('campo-input')

  const label = document.getElementById('file-label-atividade')
  const instruction = document.getElementById('instrucao-input')

  console.log(inputUrl.value)
  console.log(instruction)
  label.innerHTML = inputUrl.value

  // Adiciona um ouvinte de eventos "change" ao tipo de atividade
  tipoAtividade.addEventListener('change', function () {

    const i_tag = document.getElementById('i-tag')
    const label_input = document.getElementById('label-file')

    console.log(i_tag, label_input)

    // Verifica se o valor selecionado é "videoAula"
    // if (this.value === 'videoAula') {
    //   // Exibe a caixa de input
    //   inputBox.style.display = 'block'
    //   // Altera o tipo de input para "text"
    //   inputUrl.type = 'text'

    //   instruction.innerHTML =
    //     'O input Video aula espera um link de video do youtube comum, que pode ser pego atráves da barra de navegação ou barra de endereço'
    // } else if (tipoAtividade.value === 'materialApoio') {
    //   // Exibe a caixa de input
    //   inputBox.style.display = 'block'
    //   // Altera o tipo de input para "file"
    //   inputUrl.type = 'file'
    //   instruction.innerHTML = 'O input material de apoio espera um arquivo pdf'
    // } else {
    //   // Exibe a caixa de input
    //   inputBox.style.display = 'block'
    //   // Altera o tipo de input para "file"
    //   inputUrl.type = 'file'
    //   instruction.innerHTML =
    //     'O input proposta de projeto espera um arquivo pdf'
    // }

    // Verifica se o tipo de atividade é "videoAula"
    if (tipoAtividade.value === 'videoAula') {
      // Exibe a caixa de input
      inputBox.style.display = 'block'
      // Altera o tipo de input para "text"
      inputUrl.type = 'text'
      label_input.style.display = 'none'
      i_tag.style.display = 'block'

      inputUrl.className = 'url_atividade';
      // instrução pro usuario sobre como fazer o input
      instruction.innerHTML =
        'O input Video aula espera um link de video do youtube comum, que pode ser pego atráves da barra de navegação ou barra de endereço'

    } else if (tipoAtividade.value === 'materialApoio') {
      // Exibe a caixa de input
      inputBox.style.display = 'block'
      // Altera o tipo de input para "file"
      inputUrl.type = 'file'
      inputUrl.className = 'url_atividade file-inpt';
      i_tag.style.display = 'none';
      label_input.style.display = 'block';

      // instrução pro usuario sobre como fazer o input
      instruction.innerHTML = 'O input material de apoio espera um arquivo pdf'
    } else {
      // Exibe a caixa de input
      inputBox.style.display = 'block'
      // Altera o tipo de input para "file"
      inputUrl.type = 'file'
      inputUrl.className = 'url_atividade file-inpt';
      i_tag.style.display = 'none';
      label_input.style.display = 'block';

      // instrução pro usuario sobre como fazer o input
      instruction.innerHTML = 'O input proposta de projeto espera um arquivo pdf'
    }
  })
})
