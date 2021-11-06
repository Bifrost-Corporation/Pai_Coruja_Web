
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
    return cookies
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
    
    let cookie = valor_cookie('Compact-Menu-boolean')
    console.log(cookie)

    botaoAbrirNav.addEventListener("click", function() {
        if (window.innerWidth > 720){
            console.log(menuNav)
            if (cookie == 'True'){
                menuNav.classList.toggle("sidebar-compact")
                containerMain.classList.toggle("container-maior")
                console.log(cookie+"dfgfg")
                document.cookie = 'Compact-Menu-boolean=False;path=/;';
            }else{
                menuNav.classList.toggle("sidebar-compact")
                containerMain.classList.toggle("container-maior")
                console.log(cookie+" nãoddddd")
                document.cookie = 'Compact-Menu-boolean=True;path=/;';
            }
        }else{
            if (cookie == 'True'){
                menuNav.classList.toggle("sidebar-mobile-active")
                menuNav.classList.remove("sidebar-compact")
                console.log(cookie)
            }else{
                menuNav.classList.toggle("sidebar-mobile-active")
            }
            
        }
    });

    botaoFecharNav.addEventListener("click", function() {
        if (cookie == 'True'){
            menuNav.classList.remove("sidebar-mobile-active")
            menuNav.classList.add("sidebar-compact")
            console.log(cookie)
        }else{
            menuNav.classList.remove("sidebar-mobile-active")
        }
    })

    window.addEventListener('resize',()=>{
        if (window.innerWidth > 720) {
            if (cookie == 'True'){
                menuNav.classList.remove("sidebar-mobile-active")
                menuNav.classList.add("sidebar-compact")
            }else{
                menuNav.classList.remove("sidebar-mobile-active")
            }
        }
    })
}

const mobileMenu3 = new Navbar1(".btn-nav-pc-open", ".sidebar", ".btn-nav-close", ".container-main")


