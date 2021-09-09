<?php

    include_once ('../adm/sentinela.php');
    include_once ('../classes/Secretaria.php');
    include_once ('../classes/Escola.php');
    include_once ('../classes/Usuario.php');

    try{
        header('Location: ../adm/cadastrar-secretaria.php');
        $nomeSecretaria = $_POST['txtUsuarioSecretaria'];
        $emailSecretaria = $_POST['txtEmailSecretaria'];
        $senhaSecretaria = $_POST['txtSenhaSecretaria'];
        $escolaSecretaria = $_POST['txtConsultaEscola'];
        $idAdministrador = $_SESSION['idAdministrador'];
        $escola = new Escola();
        $secretaria = new Secretaria();
        $listaescola = $escola->listar();
        $listasecretaria = $secretaria->listar();
        $repeteemail = false;
        $repeteescola = false;
        foreach($listasecretaria as $linha){
            if($emailSecretaria == $linha['emailSecretaria']){
                $repeteemail = true;
            }
        }
        foreach($listaescola as $linha){
            if($escolaSecretaria == $linha['nomeEscola']){
                foreach($listasecretaria as $linha2){
                    if($linha['idEscola'] == $linha2['idEscola']){
                        $repeteescola = true;
                    }
                }
                if($repeteescola == false){
                    $idEscola = $linha['idEscola'];
                }
            }
        }
        if($repeteemail == false && $repeteescola == false ) {
            $secretaria->setNomeSecretaria($nomeSecretaria);
            $secretaria->setEmailSecretaria($emailSecretaria);
            $secretaria->setSenhaSecretaria($senhaSecretaria);
            $secretaria->setIdEscola($idEscola);
            $secretaria->setIdAdministrador($idAdministrador);
            echo $secretaria->cadastrar($secretaria);
            $listaSecretaria = $secretaria->selecionarUltimoSecretaria();
            foreach($listaSecretaria as $linha2){
                $idSecretaria = $linha2['idSecretaria'];
            }
            $usuario = new Usuario();
            $usuario->setIdSecretaria($idSecretaria);
            echo $usuario->cadastrar($usuario);
            return 'Cadastro da secretaria realizado com sucesso!';
        }else{
            if($repeteemail == true){
                return 'Email já cadastrado!';
            }
            if($repeteescola == true){
                return 'Escola já cadastrada!';
                echo "<script>
                            alert('Escola já cadastrada!');
                      </script>";
            }
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>