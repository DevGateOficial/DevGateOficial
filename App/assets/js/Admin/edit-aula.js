//EDIÇÃO DA AULA
const edit = document.getElementById('edit-aula');
const aula = document.getElementById('modal-editAula');
const close = document.getElementById('close-editAula');

edit.addEventListener('click', function(){
    aula.style.display = 'block'
})

close.addEventListener('click', function(){
    aula.style.display = 'none'
})

