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

// get currently selected menu item from local storage
var selectedItem = localStorage.getItem("selectedMenuItem");

// add active class to selected menu item
if (selectedItem) {
  var menuItem = document.querySelector(`aside .sidebar a[href="${selectedItem}"]`);
  if (menuItem) {
    menuItem.classList.add("active");
  }
}

function toggleActive(el) {
  // remove active class from all menu items
  var menuItems = document.querySelectorAll("aside .sidebar a");
  menuItems.forEach(function (item) {
    item.classList.remove("active");
  });

  // add active class to clicked menu item
  el.classList.add("active");

  // store currently selected menu item in local storage
  localStorage.setItem("selectedMenuItem", el.getAttribute("href"));
}