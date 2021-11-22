
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
