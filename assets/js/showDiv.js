
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


const ExibirDadosSecretaria = new ShowElement(
    '#btn-show-div-exibir-dados',
    '.container-exibir-dados'
    )

const ExibirSubDadosSecretaria = new ShowElement(
    '.dropdown-dados',
    '.dropdown-dados-lista'
)




