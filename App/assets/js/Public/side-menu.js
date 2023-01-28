var loginBtn = document.getElementById('login-button')
var sideMenu = document.getElementById('side-menu')
var closeBtn = document.getElementsByClassName('close-side-menu')[0]

loginBtn.addEventListener('click', function () {
  sideMenu.classList.add('show-side-menu')
})

closeBtn.addEventListener('click', function () {
  sideMenu.classList.remove('show-side-menu')
})
window.addEventListener('resize', () => {
  if (window.matchMedia('(min-width: 600px)').matches) {
    sideMenu.classList.remove('show-side-menu')
  }
})
