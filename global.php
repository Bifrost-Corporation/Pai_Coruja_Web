<?php

    spl_autoload_register('procurarClasse');

    function procurarClasse($nomeClasse){
        if(file_exists('classes/'.$nomeClasse.'.php')){
            require_once 'classes/'.$nomeClasse.'.php';
        }
    }

?>