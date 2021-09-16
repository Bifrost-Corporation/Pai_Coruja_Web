// COD PRA ABRIR O MENU NO MOBILE E OS DROPDOWN
function Navbar(botaoAbrir, menu, botaoFechar) {
    const botaoAbrirNav = document.querySelector(botaoAbrir)
    const menuNav = document.querySelector(menu)
    const botaoFecharNav = document.querySelector(botaoFechar)

    botaoAbrirNav.addEventListener("click", function () {
        console.log(menuNav)
        menuNav.style.display = "block"
    });

    botaoFecharNav.addEventListener("click", function () {
        console.log(menuNav)
        menuNav.style.display = "none"
    });

}

const mobileMenu = new Navbar(".btn-nav-open", ".sidebar", ".btn-nav-close")

// DROPDOWN AINDA N FUNFA COM A FUNCTION, MAS VAI FUNFAR

const subMenu = document.getElementById("sub-menu");
const subMenu2 = document.getElementById("sub-menu-2");
const subMenuButton = document.getElementById("sub-menu-button");
const subMenuButton2 = document.getElementById("sub-menu-button-2");


function openMenu() {
    subMenu.style.transition = "4s";
    subMenu.style.display = "block";
    subMenuButton.onclick = function () { fechaMenu() };
    subMenuButton.classList.add("button-drop-opened")
}
function openMenu2() {
    subMenu2.style.transition = "4s";
    subMenu2.style.display = "block";
    subMenuButton2.onclick = function () { fechaMenu2() };
    subMenuButton2.classList.add("button-drop-opened")
}

function fechaMenu() {
    subMenu.style.transition = "4s";
    subMenu.style.display = "none";
    subMenuButton.onclick = function () { openMenu() };
    subMenuButton.classList.remove("button-drop-opened")
}
function fechaMenu2() {
    subMenu2.style.transition = "4s";
    subMenu2.style.display = "none";
    subMenuButton2.onclick = function () { openMenu2() };
    subMenuButton2.classList.remove("button-drop-opened")
}









