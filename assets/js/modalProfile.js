
//MODAL DO ALTERAR IMAGEM

const modalProfileButton = document.getElementById("alterar-imagem-perfil")
const modalProfileContent = document.getElementById("modalProfile")
const modalProfileClose = document.getElementsByClassName("closeModalProfile")[0];

modalProfileButton.onclick = function() {
  modalProfileContent.classList.toggle("modal-active");
}

modalProfileClose.onclick = function() {
  modalProfileContent.classList.toggle("modal-active");
}

window.onclick = function(event) {
  if (event.target == modalProfileContent) {
    modalProfileContent.classList.toggle("modal-active");
  }
}
