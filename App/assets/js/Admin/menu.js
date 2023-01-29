// Menu na VIEW mobile 
const sideMenu = document.querySelector('aside')
const menuBtn = document.querySelector('#menu-btn')
const closeBtn = document.querySelector('#close-btn')

menuBtn.addEventListener('click', () => {
  sideMenu.style.display = 'block'
})

closeBtn.addEventListener('click', () => {
  sideMenu.style.display = 'none'
})

window.addEventListener('resize', () => {
  if (window.matchMedia('(min-width: 600px)').matches) {
    sideMenu.style.removeProperty('display')
  }
})


const cadastro_curso = document.getElementById('cadastro_curso')
window.addEventListener('load', function() {

  if(this.window.location.href == "http://localhost/DevGateOficial/admin-cadastro-curso/index"){
    cadastro_curso.classList.add("active");
  } else{
    cadastro_curso.classList.remove("active");
  }
  
})

// Adiciona a classe "ativa" ao item de menu que foi selecionado antes de recarregar a página
var itemSelecionado = localStorage.getItem("itemMenuSelecionado");

if (itemSelecionado) {
  // Verifica se o item de menu selecionado é o mesmo que o item na página atual
  if (itemSelecionado === window.location.href) {
    var itemMenu = document.querySelector(`aside .sidebar a[href="${itemSelecionado}"]`);
    if (itemMenu) {
      itemMenu.classList.add("ativo");
    }
  } else {
    // Se não for o mesmo, remove o item selecionado do armazenamento local
    localStorage.removeItem("itemMenuSelecionado");
  }
} else {
  // Se não houver item selecionado no armazenamento local, adiciona a classe "ativa" ao item de menu padrão
  var itemMenuPadrao = document.querySelector("aside .sidebar a[href='/padrao']");
  itemMenuPadrao.classList.add("ativo");
}

// Função para alternar a classe "ativa" entre os itens de menu
function alternarAtivo(el) {
  // Remove a classe "ativa" de todos os itens de menu
  var itensMenu = document.querySelectorAll("aside .sidebar a");
  itensMenu.forEach(function (item) {
    item.classList.remove("ativo");
  });

  // Adiciona a classe "ativa" ao item de menu clicado
  el.classList.add("ativo");

  // Armazena o item de menu selecionado no armazenamento local
  localStorage.setItem("itemMenuSelecionado", el.getAttribute("href"));
}
