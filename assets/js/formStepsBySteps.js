const $slidePage = document.querySelector('.slidePage')
const $firstNextBtn = document.querySelector('.nextBtn')

const $prevBtnSec = document.querySelector('.prev-page-1')
const $nextBtnSec = document.querySelector('.next-page-1')

const $prevBtnThird = document.querySelector('.prev-page-2')
const $submitBtn = document.querySelector('.submitBtn')
const $progressText = document.querySelectorAll('.steps p')
const $progressCheck = document.querySelectorAll('.steps .bullet-check')
const $bullets = document.querySelectorAll('.steps .bullet')
let max = 4
let current = 1

$firstNextBtn.addEventListener('click', () => {
    $slidePage.style.marginLeft = "-25%"
    $bullets[current - 1].classList.add('actived')
    $progressText[current - 1].classList.add('actived')
    $progressCheck[current - 1].classList.add('actived')
    current += 1
})
$nextBtnSec.addEventListener('click', () => {
    $slidePage.style.marginLeft = "-50%"
    $bullets[current - 1].classList.add('actived')
    $progressText[current - 1].classList.add('actived')
    $progressCheck[current - 1].classList.add('actived')
    current += 1
})
$submitBtn.addEventListener('click', () => {
    $bullets[current - 1].classList.add('actived')
    $progressText[current - 1].classList.add('actived')
    $progressCheck[current - 1].classList.add('actived')
    current += 1
    setTimeout(() => {
        alert('Cadastrado com sucesso!')

    }, 800)
})

$prevBtnSec.addEventListener('click', () => {
    $slidePage.style.marginLeft = "0%"
    $bullets[current - 2].classList.remove('actived')
    $progressText[current - 2].classList.remove('actived')
    $progressCheck[current - 2].classList.remove('actived')
    current -= 1

})
$prevBtnThird.addEventListener('click', () => {
    $slidePage.style.marginLeft = "-25%"
    $bullets[current - 2].classList.remove('actived')
    $progressText[current - 2].classList.remove('actived')
    $progressCheck[current - 2].classList.remove('actived')
    current -= 1
})
