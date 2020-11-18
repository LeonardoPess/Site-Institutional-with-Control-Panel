<?php 
    if(isset($_COOKIE['lembrar'])){
        $user = $_COOKIE['user'];
        $password = $_COOKIE['password'];
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
        $sql->execute(array($user,$password));
        if($sql->rowCount() == 1){
            $info = $sql->fetch();
            $_SESSION['login'] = true;
            $_SESSION['user'] = $user;
            $_SESSION['password'] = $password;
            $_SESSION['cargo'] = $info['cargo'];
            $_SESSION['nome'] =$info['nome'];
            $_SESSION['img'] =$info['img'];
            header('location: '.INCLUDE_PATH_PAINEL);
            die();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--// TITLE //-->
    <title>Painel de controle</title>

    <!--// META //-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--// LINK //-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css">
    
</head>
<body>
    
<div class="box__login__wraper">
    <div class="box__login">
        <?php
            if(isset($_POST['acao'])){
                $user = $_POST['user'];
                $password = $_POST['password'];
                $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
                $sql->execute(array($user,$password));
                if($sql->rowCount() == 1){
                    $info = $sql->fetch();
                    //Logamos com sucesso.
                    $_SESSION['login'] = true;
                    $_SESSION['user'] = $user;
                    $_SESSION['password'] = $password;
                    $_SESSION['cargo'] = $info['cargo'];
                    $_SESSION['nome'] =$info['nome'];
                    $_SESSION['img'] =$info['img'];
                    if(isset($_POST['lembrar'])){
                        setcookie('lembrar',true,time()+(60*60*24),'/');
                        setcookie('user',$user,time()+(60*60*24),'/');
                        setcookie('password',$password,time()+(60*60*24),'/');
                    }
                    header('location: '.INCLUDE_PATH_PAINEL);
                    die();
                }else{
                    //Falhou
                    echo '<div class="erro_box"><i class="fa fa-times"></i> Usuário ou senha incorretos!</div>';
                }
            }
        ?>
        <h2>Efetue o login!</h2>
        <form method="post">
            <label for="user">Login:</label>
            <input type="text" name="user" required>
            <label for="password">Senha:</label>
            <input type="password" name="password" required>
            <div class="form__group__login w100">
                <input type="submit" name="acao" value="Logar!">
            </div><!--form__group__login-->
            <div class="form__group__login w100">
                <input type="checkbox" name="lembrar">
                <label for="lembrar">Mantenha-me conectado.</label>
            </div><!--form__group__login-->
        </form>
    </div><!--box__login-->
</div><!--box__login__wraper-->

<script src="<?php echo INCLUDE_PATH; ?>js/all.min.js"></script>
</body>
</html>