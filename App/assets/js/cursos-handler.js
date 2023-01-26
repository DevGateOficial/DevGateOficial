//redireciona para a visualização de cursos
function viewCurso(id) {
  var url = "http://localhost/Devgate_rebuild/admin-view-curso/index/" + id;
  window.location.href = url;
}

function editarCurso(idCurso) {
  var url = "http://localhost/Devgate_rebuild/admin-edit-curso/index/" + idCurso;
  window.location.href = url;
}

// function cadastroAula(idCurso) {
//   var url = "http://localhost/Devgate_rebuild/admin-cadastro-aula/index/" + idCurso;
//   window.location.href = url;
// }

function viewAula(idAula){
  var url = "http://localhost/Devgate_rebuild/admin-view-aula/index/" + idAula;
  window.location.href = url;
}

function viewAtividade(idAtividade){
  var url = "http://localhost/Devgate_rebuild/admin-view-atividade/index/" + idAtividade;
  window.location.href = url;
}
