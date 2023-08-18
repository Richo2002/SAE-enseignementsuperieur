//chargement d'une nouvelle page pour les boutons
function chargerPage(url) {
    window.location.href = url;
}

//ouverture du menu-nurger
function toggleMenu() {
    const menu = document.querySelector('.menu');
    menu.classList.toggle('active');
}

//ouverture du sous-menu au clic
function toggleSubmenu(submenuId) {
    const submenu = document.getElementById(submenuId);
    submenu.classList.toggle('active');

    const allSubmenus = document.querySelectorAll('.submenu');
    allSubmenus.forEach(item => {
        if (item !== submenu) {
            item.classList.remove('active');
        }
    })
}

document.addEventListener('click', function(event) {
    const submenus = document.querySelectorAll('.submenu');
    const menuBurger = document.querySelector('.menu-burger');
    const menu = document.querySelector('.menu');
  
    // Fermer les sous-menus ouverts lorsqu'on clique en dehors
    submenus.forEach(submenu => {
      if (!submenu.contains(event.target) && !menuBurger.contains(event.target) && !menu.contains(event.target)) {
        submenu.classList.remove('active');
      }
    });    
  });