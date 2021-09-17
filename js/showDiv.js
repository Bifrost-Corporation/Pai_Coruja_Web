
function ShowElement(botaoAbrir, divSection, botaoFechar) {
    const btnOpen = document.querySelector(botaoAbrir)
    const divSectionContainer = document.querySelector(divSection)
    const btnClose = document.querySelector(botaoFechar)
    

    btnOpen.addEventListener("click", function () {
        if (divSectionContainer.style.display === "flex" || divSectionContainer.style.display === "block") {
            divSectionContainer.style.opacity = "0"
            divSectionContainer.style.display = "none"
    
        } else {
            divSectionContainer.style.transform = "translateY(0%)"
            divSectionContainer.style.display = "flex"
            divSectionContainer.style.opacity = "1"
    
        }
    });
}

// esse cod ainda n tá pronto, quero fazer ele adicionar style por classe
// q aí vai dar pra usar em vários casos diferentes, mas eu quero arrumar os css daq antes
// ent por enquanto, deixa assim, vamos esperar a apresentação primeiro

const ExibirDadosSecretaria = new ShowElement(
    '#btn-show-div-exibir-dados',
    '.container-exibir-dados'
    )

const ExibirSubDadosSecretaria = new ShowElement(
    '.dropdown-dados',
    '.dropdown-dados-lista'
)




