const url = window.location.href
let modals = document.getElementById("myModal");

console.log(url)


if(url.includes("php?idProfessor")){
    modals.classList.toggle("modal-active");
    let formProfessor = document.querySelector("#formProfessor")
    formProfessor.style.display = "block"
}
if(url.includes("php?idDisciplina")){
    modals.classList.toggle("modal-active");
    let formProfessor = document.querySelector("#formDisciplina")
    formProfessor.style.display = "block"
}
if(url.includes("php?idTurma")){
    modals.classList.toggle("modal-active");
    let formProfessor = document.querySelector("#formTurma")
    formProfessor.style.display = "block"
}
if(url.includes("php?idAluno")){
    modals.classList.toggle("modal-active");
    let formProfessor = document.querySelector("#formAluno")
    formProfessor.style.display = "block"
}
if(url.includes("php?idResponsavel")){
    modals.classList.toggle("modal-active");
    let formProfessor = document.querySelector("#formResponsavel")
    formProfessor.style.display = "block"
}




//ADM
if(url.includes("php?idEscola")){
    modals.classList.toggle("modal-active");
    let formEscola = document.querySelector("#formEscola")
    formEscola.style.display = "block"
}


modals.onclick = function(event) {
    if (event.target == modals) {
      modals.classList.toggle("modal-active");
    }
  }


