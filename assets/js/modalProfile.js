
//MODAL DO ALTERAR IMAGEM

const modalProfileButton = document.getElementById("alterar-imagem-perfil")
const modalProfileContent = document.getElementById("modalProfile")
const modalProfileClose = document.getElementsByClassName("closeModalProfile")[0];
const modalProfileContent2 = document.getElementsByClassName("modal-content-profile");

modalProfileButton.onclick = function() {
  modalProfileContent.classList.toggle("modal-active");
}

modalProfileClose.onclick = function() {
  modalProfileContent.classList.toggle("modal-active");
}

modalProfileContent.onclick = function(event) {
  if (event.target == modalProfileContent) {
    modalProfileContent.classList.toggle("modal-active");
  }
}
modalProfileContent2.addEventListener = function(event) {
  console.log("apapapapap");
  if (event.target == modalProfileContent2) {
    modalProfileContent2.classList.toggle("modal-active");
  }
}


