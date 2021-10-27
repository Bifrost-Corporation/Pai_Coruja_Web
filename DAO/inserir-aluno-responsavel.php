<?php

    include("../secretaria/sentinela.php");
    include("../classes/Aluno.php");
    include("../classes/Turma.php");
    include_once ('../classes/Responsavel.php');
    include_once ('../classes/EnderecoResponsavel.php');
    include_once ('../classes/TelefoneResponsavel.php');
    include_once ('../classes/Usuario.php');

    try{
        header("Location: ../secretaria/cadastrar-dados.php");
        unset($_SESSION['turmaInvalida']);
        $nomeAluno = $_POST['txtNomeAluno'];
        $dataNasc = $_POST['dataNasc'];
        $turmaAluno = $_POST['txtTurmaAluno'];
        $idEscola = $_SESSION['idEscola'];
        $nomeResponsavel = $_POST['txtNomeResponsavel'];
        $emailResponsavel = $_POST['txtEmailResponsavel'];
        $senhaResponsavel = $_POST['txtSenhaResponsavel'];
        $cpfResponsavel = $_POST['txtCpf'];
        $logradouro = $_POST['txtRua'];
        $numCasa = $_POST['txtNumero'];
        $complemento = $_POST['txtComplemento'];
        $cep = $_POST['txtCep'];
        $bairro = $_POST['txtBairro'];
        $cidade = $_POST['txtCidade'];
        $telefone = $_POST['txtTelefone'];
        $turma = new Turma();
        $listaturma = $turma->listar($_SESSION['idEscola']);
        $turmaInvalida = true;
        foreach($listaturma as $linha){
            if($turmaAluno == $linha['nomeTurma'] && $idEscola == $linha['idEscola']){
                $turmaInvalida = false;
                $aluno = new Aluno();
                $aluno->setNomeAluno($nomeAluno);
                $aluno->setDataNascAluno($dataNasc);
                $aluno->setIdTurma($linha['idTurma']);
                $aluno->setIdEscola($idEscola);
                echo $aluno->cadastrar($aluno);
                $listaAluno = $aluno->selecionarUltimoAluno();
                foreach($listaAluno as $linha){
                    $idAluno = $linha['idAluno'];
                }
                $repeteEmail = false;
                $repeteCpf = false;
                $repeteAluno = false;
                $responsavel = new Responsavel();
                $listaResponsavel = $responsavel->listar($_SESSION['idEscola']);
                foreach($listaResponsavel as $linha){
                    if($emailResponsavel == $linha['emailResponsavel']){
                        $repeteEmail = true;
                    }
                    if($cpfResponsavel == $linha['cpfResponsavel']){
                        $repeteCpf = true;
                    }
                }
                if($repeteAluno == false && $repeteEmail == false && $repeteCpf == false){
                    $responsavel->setNomeResponsavel($nomeResponsavel);
                    $responsavel->setCpfResponsavel($cpfResponsavel);
                    $responsavel->setEmailResponsavel($emailResponsavel);
                    $responsavel->setSenhaResponsavel(md5($senhaResponsavel));
                    $responsavel->setPrimeiroAcessoResponsavel('V');
                    $responsavel->setIdAluno($idAluno);
                    echo $responsavel->cadastrar($responsavel);
                    $listaIdResponsavel = $responsavel->selecionarUltimoResponsavel();
                    $idResponsavel;
                    foreach($listaIdResponsavel as $linha){
                        $idResponsavel = $linha['idResponsavel'];
                    }
                    $endereco = new EnderecoResponsavel();
                    $endereco->setLogradouroEnderecoResponsavel($logradouro);
                    $endereco->setNumCasaEnderecoResponsavel($numCasa);
                    $endereco->setComplementoEnderecoResponsavel($complemento);
                    $endereco->setCepEnderecoResponsavel($cep);
                    $endereco->setBairroEnderecoResponsavel($bairro);
                    $endereco->setCidadeEnderecoResponsavel($cidade);
                    $endereco->setIdResponsavel($idResponsavel);
                    echo $endereco->cadastrar($endereco);
                    $contato = new TelefoneResponsavel();
                    $contato->setNumTelefoneResponsavel($telefone);
                    $contato->setIdResponsavel($idResponsavel);
                    $contato->cadastrar($contato);
                    $usuario = new Usuario();
                    $usuario->setIdResponsavel($idResponsavel);
                    echo $usuario->cadastrar($usuario);
                    return 'Dados cadastrados com sucesso!';
                } else {
                    if($repeteAluno == true){
                        $_SESSION['nomeAluno'] = $nomeAluno;
                    }
                    if($repeteCpf == true){
                        $_SESSION['cpfResponsavel'] = $cpfResponsavel;
                    }
                    if($repeteEmail == true){
                        $_SESSION['emailResponsavel'] = $emailResponsavel;
                    }
                }
            }
        }
        if($turmaInvalida == true){
            $_SESSION['turmaInvalida'] = $turmaAluno;
        }
        

    }catch(Exception $e){
        echo $e->getMessage();
    }

?>