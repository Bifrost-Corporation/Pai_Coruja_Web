
const subMenu = document.getElementById("sub-menu");
const subMenu2 = document.getElementById("sub-menu-2");
const subMenuButton = document.getElementById("sub-menu-button");
const subMenuButton2 = document.getElementById("sub-menu-button-2");

// const spanAlt = document.getElementsByClassName("close")[0];
// const spanAdd = document.getElementsByClassName("close")[1];


function openMenu() {
    subMenu.style.transition = "4s";
    subMenu.style.display = "block";
    subMenuButton.onclick = function() {fechaMenu()};
}
function openMenu2() {
    subMenu2.style.transition = "4s";
    subMenu2.style.display = "block";
    subMenuButton2.onclick = function() {fechaMenu2()};
}

function fechaMenu() {
    subMenu.style.transition = "4s";
    subMenu.style.display = "none";
    subMenuButton.onclick = function() {openMenu()};
}
function fechaMenu2() {
    subMenu2.style.transition = "4s";
    subMenu2.style.display = "none";
    subMenuButton2.onclick = function() {openMenu2()};
}

// spanAlt.onclick = function() {
//   alterModal.style.display = "none";
//   modalAdicionar.style.display = "none";
// }

// spanAdd.onclick = function() {
//   alterModal.style.display = "none";
//   modalAdicionar.style.display = "none";
// }

// window.onclick = function(event) {
//   if (event.target == modalAlterar || event.target == modalAdicionar) {
//     modalAlterar.style.display = "none";
//     modalAdicionar.style.display = "none";
//   }
// }



// const altBotao = document.getElementById("alterar-termo");

// altBotao.disabled
