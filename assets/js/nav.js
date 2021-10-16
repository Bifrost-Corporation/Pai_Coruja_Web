// COD PRA ABRIR O MENU NO MOBILE E OS DROPDOWN
function Navbar(botaoAbrir, menu, botaoFechar) {
    const botaoAbrirNav = document.querySelector(botaoAbrir)
    const menuNav = document.querySelector(menu)
    const botaoFecharNav = document.querySelector(botaoFechar)

    botaoAbrirNav.addEventListener("click", function() {
        console.log(menuNav)
        menuNav.style.display = "block"
    });

    botaoFecharNav.addEventListener("click", function() {
        console.log(menuNav)
        menuNav.style.display = "none"
    });

}

const mobileMenu = new Navbar(".btn-nav-open", ".sidebar", ".btn-nav-close", ".container-main")

function Navbar1(botaoAbrir, menu, botaoFechar, container) {
    const botaoAbrirNav = document.querySelector(botaoAbrir)
    const menuNav = document.querySelector(menu)
    const botaoFecharNav = document.querySelector(botaoFechar)
    const containerMain = document.querySelector(container)

    botaoAbrirNav.addEventListener("click", function() {
        console.log(menuNav)
        botaoAbrirNav.firstElementChild.remove()
        botaoAbrirNav.createElement

        menuNav.classList.toggle("compact-nav")
        containerMain.classList.toggle("container-maior")
        if(botaoAbrirNav.firstElementChild.src == "../img/pai2.png"){
            botaoAbrirNav.firstElementChild.src = "../img/pai_coruja_branca.png"
        }
    });

}

const mobileMenu3 = new Navbar1(".btn-nav-pc-open", ".sidebar", ".btn-nav-close", ".container-main")