<?php

    include_once ('../secretaria/sentinela.php');
    include_once ('../classes/Responsavel.php');
    include_once ('../classes/Aluno.php');
    include_once ('../classes/Turma.php');
    include_once ('../classes/EnderecoResponsavel.php');
    include_once ('../classes/TelefoneResponsavel.php');
    include_once ('../classes/Usuario.php');

    try{
        header('Location: ../secretaria/cadastrar-responsavel.php');
        $nomeResponsavel = $_POST['txtNome'];
        $emailResponsavel = $_POST['txtEmail'];
        $senhaResponsavel = $_POST['txtSenha'];
        $cpfResponsavel = $_POST['txtCpf'];
        $nomeAluno = $_POST['txtAluno'];
        $logradouro = $_POST['txtRua'];
        $numCasa = $_POST['txtNumero'];
        $complemento = $_POST['txtComplemento'];
        $cep = $_POST['txtCep'];
        $bairro = $_POST['txtBairro'];
        $cidade = $_POST['txtCidade'];
        $telefone = $_POST['txtTelefone'];
        $responsavel = new Responsavel();
        $aluno = new Aluno();
        $turma = new Turma();
        $endereco = new EnderecoResponsavel();
        $contato = new TelefoneResponsavel();
        $listaResponsavel = $responsavel->listar();
        $listaAluno = $aluno->listar();
        $listaTurma = $turma->listar();
        $nomeTurma = $aluno->selecionarNomeTurma();
        $repeteEmail = false;
        $repeteCpf = false;
        $repeteAluno = false;
        foreach($nomeTurma as $linha){
            $nomeBanco = $linha['nomeAluno'] . ' ' . $linha['nomeTurma'];
            if($nomeAluno == $nomeBanco){
                foreach($listaResponsavel as $linha2){
                    if($linha2['idAluno'] == $linha['idAluno']){
                        $repeteAluno = true;
                    }
                }
                if($repeteAluno == false){
                    $idAluno = $linha['idAluno'];
                }
            }
        }
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
            $responsavel->setSenhaResponsavel($senhaResponsavel);
            $responsavel->setIdAluno($idAluno);
            $responsavel->cadastrar($responsavel);
            $listaIdResponsavel = $responsavel->selecionarUltimoResponsavel();
            $idResponsavel;
            foreach($listaIdResponsavel as $linha){
                $idResponsavel = $linha['idResponsavel'];
            }
            $endereco->setLogradouroEnderecoResponsavel($logradouro);
            $endereco->setNumCasaEnderecoResponsavel($numCasa);
            $endereco->setComplementoEnderecoResponsavel($complemento);
            $endereco->setCepEnderecoResponsavel($cep);
            $endereco->setBairroEnderecoResponsavel($bairro);
            $endereco->setCidadeEnderecoResponsavel($cidade);
            $endereco->setIdResponsavel($idResponsavel);
            $endereco->cadastrar($endereco);
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

        
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>