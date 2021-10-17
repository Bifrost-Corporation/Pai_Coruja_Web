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
    var nome = $('#txtNomeProfessor').val();
    var email = $('#txtEmailProfessor').val();
    var senha1 = $('#txtSenhaProfessor').val();
    var senha2 = $('#txtConfirmarSenhaProfessor').val();
    var nomeSemEspaco = nome.trim();
    var emailSemEspaco = email.trim();
    var senha1SemEspaco = senha1.trim();
    var senha2SemEspaco = senha2.trim();
    if (nome.length == 0 || nomeSemEspaco == '') {
        $('#label-nome').html('Por favor, preencha o campo de nome para o professor!');
        $('#txtNomeProfessor').addClass('erro-form');
        $('#label-nome').show();
        setTimeout(function () {
            $('#label-nome').fadeOut(1);
            $('#txtNomeProfessor').removeClass('erro-form');
        }, 5000);
        e.preventDefault();
    }
    if (email.length == 0 || emailSemEspaco == '') {
        $('#label-email').html('Por favor, preencha o campo de email para o professor!');
        $('#txtEmailProfessor').addClass('erro-form');
        $('#label-email').show();
        setTimeout(function () {
            $('#label-email').fadeOut(1);
            $('#txtEmailProfessor').removeClass('erro-form');
        }, 5000);
        e.preventDefault();
    } else {
        var verificaarroba = false;
        var verificaponto = false;
        for (var i = 0; i < email.length; i++) {
            if (email.charAt(i) == '@' && i + 1 < email.length) {
                var posicaoarroba = i;
            }
            if (email.charAt(i) == '.' && i + 1 < email.length) {
                var posicaoponto = i;
            }
        }
        if (posicaoponto > posicaoarroba) {
            var verificaarroba = true;
            var verificaponto = true;
        }
        if (verificaarroba == false || verificaponto == false) {
            $('#label-email').html('Email inválido!');
            $('#txtEmailProfessor').addClass('erro-form');
            $('#label-email').show();
            setTimeout(function () {
                $('#label-email').fadeOut(1);
                $('#txtEmailProfessor').removeClass('erro-form');
            }, 5000);
            e.preventDefault();
        }
    }
    if (senha1.length == 0 || senha1SemEspaco == ''){
        $('#label-senha1').html('Por favor, preencha o campo de senha para o professor!');
        $('#txtSenhaProfessor').addClass('erro-form');
        $('#label-senha1').show();
        setTimeout(function () {
            $('#label-senha1').fadeOut(1);
            $('#txtSenhaProfessor').removeClass('erro-form');
        }, 5000);
        e.preventDefault();
    }
    if (senha2.length == 0 || senha2SemEspaco == ''){
        $('#label-senha2').html('Por favor, preencha o campo de senha para o professor!');
        $('#txtConfirmarSenhaProfessor').addClass('erro-form');
        $('#label-senha2').show();
        setTimeout(function () {
            $('#label-senha2').fadeOut(1);
            $('#txtConfirmarSenhaProfessor').removeClass('erro-form');
        }, 5000);
        e.preventDefault();
    }
    if (senha1 != senha2){
        $('#label-senha1').html('Senhas não correspondem!');
        $('#txtSenhaProfessor').addClass('erro-form');
        $('#label-senha1').show();
        $('#label-senha2').html('Senhas não correspondem!');
        $('#txtConfirmarSenhaProfessor').addClass('erro-form');
        $('#label-senha2').show();
        setTimeout(function () {
            $('#label-senha1').fadeOut(1);
            $('#txtSenhaProfessor').removeClass('erro-form');
            $('#label-senha2').fadeOut(1);
            $('#txtConfirmarSenhaProfessor').removeClass('erro-form');
        }, 5000);
        e.preventDefault();
    } else {
        $slidePage.style.marginLeft = "-50%"
        $bullets[current - 1].classList.add('actived')
        $progressText[current - 1].classList.add('actived')
        $progressCheck[current - 1].classList.add('actived')
        console.log(current);
    }
}
function linkEtapa4(){
    $slidePage.style.marginLeft = "-75%"
}
/*
function linkCadastrar(){
    var nomeDisciplina = $('#txtNomeDisciplina').val();
    var nomeProfessor = $('#txtProfessorDisciplina').val();
    var nomeDisciplinaSemEspaco = nomeDisciplina.trim();
    var nomeProfessorSemEspaco = nomeProfessor.trim();
    if (nomeDisciplina.length == 0 || nomeDisciplinaSemEspaco == '') {
        $('#label-nomeDisciplina').html('Por favor, preencha o campo de nome para a disciplina!');
        $('#txtNomeDisciplina').addClass('erro-form');
        $('#label-nomeDisciplina').show();
        setTimeout(function () {
            $('#label-nomeDisciplina').fadeOut(1);
            $('#txtNomeDisciplina').removeClass('erro-form');
        }, 5000);
        document.querySelector('#formProfessorDisciplina').addEventListener('submit', function(e){
            e.preventDefault();
        });
    }
    else if (nomeProfessor.length == 0 || nomeProfessorSemEspaco == '') {
        $('#label-professor').html('Por favor, preencha o campo de nome para o professor responsável pela disciplina!');
        $('#txtProfessorDisciplina').addClass('erro-form');
        $('#label-professor').show();
        setTimeout(function () {
            $('#label-professor').fadeOut(1);
            $('#txtProfessorDisciplina').removeClass('erro-form');
        }, 5000);
        document.querySelector('#formProfessorDisciplina').addEventListener('submit', function(e){
            e.preventDefault();
        });
        
    } else{
        current = 2
        $bullets[current - 1].classList.add('actived')
        $progressText[current - 1].classList.add('actived')
        $progressCheck[current - 1].classList.add('actived')
    }
}
*/


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
    var nomeTurma = $('#txtNomeTurma').val();
    if (nomeTurma.length != 3) {
        $('#label-nomeTurma').html('Por favor, preencha o campo de nome para a turma corretamente!');
        $('#txtNomeTurma').addClass('erro-form');
        $('#label-nomeTurma').show();
        setTimeout(function () {
            $('#label-nomeTurma').fadeOut(1);
            $('#txtNomeTurma').removeClass('erro-form');
        }, 5000);
    }else{
            $slidePageForm2.style.marginLeft = "-50%"
            $bulletsForm2[current - 1].classList.add('actived')
            $progressTextForm2[current - 1].classList.add('actived')
            $progressCheckForm2[current - 1].classList.add('actived')
    }
    
}
function linkEtapa4Form2(){
    $slidePageForm2.style.marginLeft = "-75%"
}

function linkCadastrarForm2(){  
    current = 2
    $bulletsForm2[current - 1].classList.add('actived')
    $progressTextForm2[current - 1].classList.add('actived')
    $progressCheckForm2[current - 1].classList.add('actived')
}



const $slidePageform3 = document.querySelector('.slidePage-form3')

const $prevBtnThirdform3 = document.querySelector('.prev-page-2-form3')
const $submitBtnform3 = document.querySelector('.submitBtn-form3')
const $progressTextform3 = document.querySelectorAll('.steps-form3 p')
const $progressCheckform3 = document.querySelectorAll('.steps-form3 .bullet-check-form3')
const $bulletsform3 = document.querySelectorAll('.steps-form3 .bullet-form3')
let maxform3 = 2
let currentform3 = 1

function linkEtapa1form3(){
    $slidePageform3.style.marginLeft = "0%"
    currentform3 = 1
    $bulletsform3[current - 1].classList.remove('actived')
    $progressTextform3[current - 1].classList.remove('actived')
    $progressCheckform3[current - 1].classList.remove('actived')
}
function linkEtapa2form3(){
    $slidePageform3.style.marginLeft = "-25%"
    currentform3 = 1
    $bulletsform3[current - 1].classList.remove('actived')
    $progressTextform3[current - 1].classList.remove('actived')
    $progressCheckform3[current - 1].classList.remove('actived')
}
function linkEtapa3form3(){
    var nomeAluno = $('#txtNomeAluno').val();
    var dataNasc = $('#dataNasc').val();
    var turma = $('#txtTurmaAluno').val();
    var nomeAlunoSemEspaco = nomeAluno.trim();
    var dataNascSemEspaco = dataNasc.trim();
    var turmaSemEspaco = turma.trim();
    var falha = false;
    if (nomeAluno.length == 0 || nomeAlunoSemEspaco == '') {
        $('#label-nomeAluno').html('Por favor, preencha o campo de nome para o aluno!');
        $('#txtNomeAluno').addClass('erro-form');
        $('#label-nomeAluno').show();
        setTimeout(function () {
            $('#label-nomeAluno').fadeOut(1);
            $('#txtNomeAluno').removeClass('erro-form');
        }, 5000);
        falha = true;
    }
    if (dataNasc.length == 0 || dataNascSemEspaco == '') {
        $('#label-dataNasc').html('Por favor, preencha o campo de data de nascimento!');
        $('#dataNasc').addClass('erro-form');
        $('#label-dataNasc').show();
        setTimeout(function () {
            $('#label-dataNasc').fadeOut(1);
            $('#dataNasc').removeClass('erro-form');
        }, 5000);
        falha = true;
    } else {
        var dataNasc = $('#dataNasc').val().replace(/-/g, ",");
        var dataFormatada = new Date(dataNasc);
        var ano = dataFormatada.getFullYear();
        var anoAtual = new Date().getFullYear();
        if (ano >= anoAtual) {
            $('#label-dataNasc').html('Data de nascimento inválida!');
            $('#dataNasc').addClass('erro-form');
            $('#label-dataNasc').show();
            setTimeout(function () {
                $('#label-dataNasc').fadeOut(1);
                $('#dataNasc').removeClass('erro-form');
            }, 5000);
            falha = true;
        }
    }
    if (turma.length == 0 || turmaSemEspaco == '') {
        $('#label-turma').html('Por favor, preencha o campo de turma do aluno!');
        $('#txtTurmaAluno').addClass('erro-form');
        $('#label-turma').show();
        setTimeout(function () {
            $('#label-turma').fadeOut(1);
            $('#txtTurmaAluno').removeClass('erro-form');
        }, 5000);
        falha = true;
    }
    if(falha == true){

    }else{
        $slidePageform3.style.marginLeft = "-50%"
        $bulletsform3[current - 1].classList.add('actived')
        $progressTextform3[current - 1].classList.add('actived')
        $progressCheckform3[current - 1].classList.add('actived')
        $('#txtAlunoResponsavel').val(nomeAluno)
    }
}
function linkEtapa4form3(){
    $slidePageform3.style.marginLeft = "-75%"
}

/*
function linkCadastrarform3(){  
    current = 2
    $bulletsform3[current - 1].classList.add('actived')
    $progressTextform3[current - 1].classList.add('actived')
    $progressCheckform3[current - 1].classList.add('actived')
    alert('Cadastrado com sucesso!')
}
*/