<?php

    session_start();
    date_default_timezone_set('America/Sao_Paulo');
    $autoload = function($class){
        if($class == 'Email'){
            require_once('classes/phpmailer/PHPMailerAutoload.php');
        }
        include('classes/'.$class.'.php');
    };

    spl_autoload_register($autoload);

    define('INCLUDE_PATH','http://localhost/curso-web-master/back_end/projetos/projeto_01/');
    define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');

    define('BASE_DIR_PAINEL',__DIR__.'/painel');


    //Connect with database!
    define('HOST','localhost');
    define('USER','root');
    define('PASSWORD','');
    define('DATABASE','projeto_01');

    //Constant for control panel
    define('NOME_EMPRESA','Danki Code');

    //Functions of panel
    function pegaCargo($indice){
            return Painel::$cargos[$indice];
    }

    function selecionadoMenu($par){
        $url = explode('/',@$_GET['url'])[0];
        if($url == $par){
            echo 'class="menu__active"';
        }
    }

    function verificaPermissaoMenu($permissao){
        if($_SESSION['cargo'] <= $permissao){
            return;
        }else{
            echo 'style="display:none"';
        }
    }

    function verificaPermissaoPagina($permissao){
        if($_SESSION['cargo'] <= $permissao){
            return;
        }else{
            include('painel/pages/permissao_negada.php');
            die();
        }
    }

    function recoverPost($post){
        if(isset($_POST[$post])){
            echo $_POST[$post];
        }
    }