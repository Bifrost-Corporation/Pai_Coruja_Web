
const btnProfile = document.querySelector("#openProfile")
const dropdownProfile = document.querySelector(".dropdown-menu-profile")
 btnProfile.onclick = function(){
    dropdownProfile.classList.toggle("dropdown-menu-profile-active")
 }

 window.onclick = function(event) {
    if (event.target == dropdownProfile) {
        dropdownProfile.classList.toggle("dropdown-menu-profile-active");
    }
  }


// // COD PRA ABRIR O MENU NO MOBILE E OS DROPDOWN
// function Navbar(botaoAbrir, menu, botaoFechar) {
//     const botaoAbrirNav = document.querySelector(botaoAbrir)
//     const menuNav = document.querySelector(menu)
//     const botaoFecharNav = document.querySelector(botaoFechar)

//     botaoAbrirNav.addEventListener("click", function() {
//         console.log(menuNav)
//         menuNav.style.display = "block"
//     });

//     botaoFecharNav.addEventListener("click", function() {
//         console.log(menuNav)
//         menuNav.style.display = "none"
//     });

// }

// const mobileMenu = new Navbar(".btn-nav-open", ".sidebar", ".btn-nav-close", ".container-main")

function valor_cookie(nome_cookie) {
    // Adiciona o sinal de = na frente do nome do cookie
    var cname = ' ' + nome_cookie + '=';
    
    // Obtém todos os cookies do documento
    var cookies = document.cookie;
    
    // Verifica se seu cookie existe
    if (cookies.indexOf(cname) == -1) {
        return false;
    }
    
    // Remove a parte que não interessa dos cookies
    cookies = cookies.substr(cookies.indexOf(cname), cookies.length);

    // Obtém o valor do cookie até o ;
    if (cookies.indexOf(';') != -1) {
        cookies = cookies.substr(0, cookies.indexOf(';'));
    }
    
    // Remove o nome do cookie e o sinal de =
    cookies = cookies.split('=')[1];
    
    // Retorna apenas o valor do cookie
    return decodeURI(cookies);
}

// Verificar se o cookie do navbar compacto é true para deixar ativado quando trocar de pag
{
    const containerMain = document.querySelector(".container-main")
    const menuNav = document.querySelector(".sidebar")

    let cookie = valor_cookie('Compact-Menu-boolean')
    console.log(cookie)

    if (cookie == 'True'){
        menuNav.classList.toggle("sidebar-compact")
        containerMain.classList.toggle("container-maior")
    }
}



function Navbar1(botaoAbrir, menu, botaoFechar, container) {
    const botaoAbrirNav = document.querySelector(botaoAbrir)
    const menuNav = document.querySelector(menu)
    const botaoFecharNav = document.querySelector(botaoFechar)
    const containerMain = document.querySelector(container)

    botaoAbrirNav.addEventListener("click", function() {

        let cookie = valor_cookie('Compact-Menu-boolean')
        console.log(cookie)

        if (window.innerWidth > 720){
            console.log(menuNav)

           
            if (cookie == 'True'){
                menuNav.classList.toggle("sidebar-compact")
                containerMain.classList.toggle("container-maior")
                document.cookie = 'Compact-Menu-boolean=False';
            }else{
                menuNav.classList.toggle("sidebar-compact")
                containerMain.classList.toggle("container-maior")
                document.cookie = 'Compact-Menu-boolean=True';
            }
        }else{
            if (cookie == 'True'){
                menuNav.classList.toggle("sidebar-mobile-active")
                menuNav.classList.remove("sidebar-compact")
            }else{
                menuNav.classList.toggle("sidebar-mobile-active")
            }
            
        }
    });

    botaoFecharNav.addEventListener("click", function() {
        let cookie = valor_cookie('Compact-Menu-boolean')
        console.log(cookie)

        if (cookie == 'True'){
            menuNav.classList.toggle("sidebar-mobile-active")
            menuNav.classList.add("sidebar-compact")
        }else{
            menuNav.classList.toggle("sidebar-mobile-active")
        }
    })
}

const mobileMenu3 = new Navbar1(".btn-nav-pc-open", ".sidebar", ".btn-nav-close", ".container-main")


{
    const containerMain = document.querySelector(".container-main")
    const menuNav = document.querySelector(".sidebar")

    const botaoAbrirNav = document.querySelector(".btn-nav-pc-open")

    let cookie = valor_cookie('Compact-Menu-boolean')
    console.log(cookie)
    
    if (window.innerWidth < 720 && cookie == "True") {
        menuNav.classList.remove("sidebar-compact")
    }
    else if (window.innerWidth > 720 && cookie == "True") {
        menuNav.classList.add("sidebar-compact")
    }

}


window.addEventListener('resize',()=>{
    let control = 0
    const containerMain = document.querySelector(".container-main")
    const menuNav = document.querySelector(".sidebar")
    console.log("rfffr");

    if (control == 0){
        control += 1
    }else{
        if (window.innerWidth < 1000) {
            menuNav.classList.toggle("sidebar-compact")
            containerMain.classList.toggle("container-maior")
        }
    }

    
})
    


if (window.matchMedia("(max-width: 1000px)").matches) {
    

        
        
    }

