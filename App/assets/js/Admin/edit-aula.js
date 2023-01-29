//EDIÇÃO DA AULA
const edit = document.getElementById('edit-aula')
const aula = document.getElementById('modal-editAula')
const close = document.getElementById('close-editAula')

<<<<<<< Updated upstream
edit.addEventListener('click', function () {
  aula.style.display = 'block'
})

close.addEventListener('click', function () {
  aula.style.display = 'none'
})
=======
//Event listener para abrir o modal de edição de aula
edit.addEventListener('click', function(){
    //Exibe o modal de edição de aula
    aula.style.display = 'block';
});

//Event listener para fechar o modal de edição de aula
close.addEventListener('click', function(){
    //Oculta o modal de edição de aula
    aula.style.display = 'none';
});


>>>>>>> Stashed changes
