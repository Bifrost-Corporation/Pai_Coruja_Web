const $slidePage = document.querySelector('.slidePage')

const $prevBtnThird = document.querySelector('.prev-page-2')
const $submitBtn = document.querySelector('.submitBtn')
const $progressText = document.querySelectorAll('.steps p')
const $progressCheck = document.querySelectorAll('.steps .bullet-check')
const $bullets = document.querySelectorAll('.steps .bullet')
let max = 2
let current = 1

function linkEtapa1(){
    $slidePage.style.marginLeft = "0%"
    current = 1
    $bullets[current - 1].classList.remove('actived')
    $progressText[current - 1].classList.remove('actived')
    $progressCheck[current - 1].classList.remove('actived')
}
function linkEtapa2(){
    $slidePage.style.marginLeft = "-25%"
    current = 1
    $bullets[current - 1].classList.remove('actived')
    $progressText[current - 1].classList.remove('actived')
    $progressCheck[current - 1].classList.remove('actived')
}
function linkEtapa3(){
    $slidePage.style.marginLeft = "-50%"
    $bullets[current - 1].classList.add('actived')
    $progressText[current - 1].classList.add('actived')
    $progressCheck[current - 1].classList.add('actived')
    console.log(current);
}
function linkEtapa4(){
    $slidePage.style.marginLeft = "-75%"
}

function linkCadastrar(){  
    current = 2
    $bullets[current - 1].classList.add('actived')
    $progressText[current - 1].classList.add('actived')
    $progressCheck[current - 1].classList.add('actived')
    alert('Cadastrado com sucesso!')
}


const $slidePageForm2 = document.querySelector('.slidePage-form2')

const $prevBtnThirdForm2 = document.querySelector('.prev-page-2-form2')
const $submitBtnForm2 = document.querySelector('.submitBtn-form2')
const $progressTextForm2 = document.querySelectorAll('.steps-form2 p')
const $progressCheckForm2 = document.querySelectorAll('.steps-form2 .bullet-check-form2')
const $bulletsForm2 = document.querySelectorAll('.steps-form2 .bullet-form2')
let maxForm2 = 2
let currentForm2 = 1

function linkEtapa1Form2(){
    $slidePageForm2.style.marginLeft = "0%"
    currentForm2 = 1
    $bulletsForm2[current - 1].classList.remove('actived')
    $progressTextForm2[current - 1].classList.remove('actived')
    $progressCheckForm2[current - 1].classList.remove('actived')
}
function linkEtapa2Form2(){
    $slidePageForm2.style.marginLeft = "-25%"
    currentForm2 = 1
    $bulletsForm2[current - 1].classList.remove('actived')
    $progressTextForm2[current - 1].classList.remove('actived')
    $progressCheckForm2[current - 1].classList.remove('actived')
}
function linkEtapa3Form2(){
    $slidePageForm2.style.marginLeft = "-50%"
    $bulletsForm2[current - 1].classList.add('actived')
    $progressTextForm2[current - 1].classList.add('actived')
    $progressCheckForm2[current - 1].classList.add('actived')
}
function linkEtapa4Form2(){
    $slidePageForm2.style.marginLeft = "-75%"
}

function linkCadastrarForm2(){  
    current = 2
    $bulletsForm2[current - 1].classList.add('actived')
    $progressTextForm2[current - 1].classList.add('actived')
    $progressCheckForm2[current - 1].classList.add('actived')
    alert('Cadastrado com sucesso!')
}
