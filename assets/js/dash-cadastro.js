
function openTab(evt, idTab) {
    const abaLink = document.getElementsByClassName("aba-cadastro")

    const abaConteudo = document.getElementsByClassName("conteudo-aba")

    let i
    
    for (i = 0; i < abaConteudo.length; i++) {
        abaConteudo[i].style.display = "none";
    }

    for (i = 0; i < abaLink.length; i++) {
        abaLink[i].className = abaLink[i].className.replace(" aba-cadastro-active", "");
    }

    document.getElementById(idTab).style.display = "block";
    evt.currentTarget.className += " aba-cadastro-active";
}

