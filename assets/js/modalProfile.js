// //MODAL DO ALTERAR IMAGEM

// const modalProfileButton = document.getElementById("alterar-imagem-perfil")
// const modalProfileContent = document.getElementById("modalProfile")
// const modalProfileContent2 = document.getElementsByClassName("modal-content-profile");

// modalProfileButton.onclick = function() {
//   modalProfileContent.classList.toggle("modal-active");
// }



// modalProfileContent.onclick = function(event) {
//   if (event.target == modalProfileContent) {
//     modalProfileContent.classList.toggle("modal-active");
//   }
// }
// modalProfileContent2.addEventListener = function(event) {
//   console.log("apapapapap");
//   if (event.target == modalProfileContent2) {
//     modalProfileContent2.classList.toggle("modal-active");
//   }
// }

//Modal Profile

const url = window.location.href
const ModalProfile = document.querySelector("#modalProfile")
const modalProfileClose = document.getElementsByClassName("closeModalProfile")[0];

if (url.includes("php#ProfileEdit")) {
  ModalProfile.classList.toggle("modal-active");
}

ModalProfile.onclick = function (event) {
  if (event.target == ModalProfile) {
    ModalProfile.classList.toggle("modal-active");
    window.history.pushState("object or string", "Title", "#");
  }
}

modalProfileClose.onclick = function () {
  ModalProfile.classList.toggle("modal-active");
  window.history.pushState("object or string", "Title", "#");
}

function onFileSelected(event) {
  var selectedFile = event.target.files[0];
  var reader = new FileReader();

  var imgtag = document.getElementById("imgPerfilPreview");
  imgtag.title = selectedFile.name;

  reader.onload = function(event) {
      imgtag.src = event.target.result;
  };

  reader.readAsDataURL(selectedFile);
  }
