<?php include('config.php'); ?>
<?php Site::updateUsuarioOnline(); ?>
<?php Site::contador(); ?>
<?php
    $infoSite = MySql::conectar()->prepare("SELECT * FROM `tb_site.config`");
    $infoSite->execute();
    $infoSite = $infoSite->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--// TITLE //-->
    <title><?php echo $infoSite['titulo']; ?></title>

    <!--// META //-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--// LINK //-->
    <link rel="icon" href="<?php echo INCLUDE_PATH; ?>code.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/style.css">

</head>
<body>

<base base="<?php echo INCLUDE_PATH; ?>">

    <?php

        $url = isset($_GET['url']) ? $_GET['url'] : 'home';

        switch ($url) {
            case 'depoimentos':
                echo '<target target="depoimentos" />';
            break;

            case 'sobre':
                echo '<target target="sobre" />';
            break;
        }

    ?>
        <div class="sucesso">Formulário enviado com sucesso!</div><!--sucesso-->
        <div class="erro">Não foi possivel enviar o formulário!</div><!--erro-->
        <div class="overlay__loading">
            <img src="<?php echo INCLUDE_PATH; ?>images/ajax-loader.gif">
        </div><!--overlay__loading-->

    <header>
        <div class="container">

            <a href="<?php echo INCLUDE_PATH; ?>"><div class="logo left">LOGOMARCA</div></a>

            <nav class="desktop right">
                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Depoimentos</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>noticias">Notícias</a></li>
                    <li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                </ul>
            </nav><!--desktop-->

            <nav class="mobile right">

                <div class="mobile__menu"><i class="fa fa-bars"></i></div>

                <ul>
                    <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Depoimentos</a></li>
                    <li><a href="<?php echo INCLUDE_PATH; ?>noticias">Notícias</a></li>
                    <li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                </ul>
            </nav><!--mobile-->

        <div class="clear"></div>
        </div><!--container-->
    </header>

    <div class="container__principal">
    <?php

        if(file_exists('pages/'.$url.'.php')){
            include('pages/'.$url.'.php');
        }else{
            //podemos fazer o que quiser pois a pagina não existe.
            if($url != 'depoimentos' && $url != 'sobre'){
                $urlPar = explode('/',$url)[0];
                if($urlPar != 'noticias'){
                    $pagina404 = true;
                    include('pages/404.php');
                }else{
                    include('pages/noticias.php');
                }
            }else{
                include('pages/home.php');
            }
        }

    ?>
    </div><!--container__principal-->

    <footer <?php if(isset($pagina404) && $pagina404 == true) echo 'class="fixeds"' ?>>
        <div class="container">
            <p>Todos os direitos reservados!</p>
        </div><!--container-->
    </footer>


<script src="<?php echo INCLUDE_PATH; ?>js/all.min.js"></script>
<script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
<script src="<?php echo INCLUDE_PATH; ?>js/constants.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDHPNQxozOzQSZ-djvWGOBUsHkBUoT_qH4"></script>
<script src="<?php echo INCLUDE_PATH; ?>js/map.js"></script>
<script src="<?php echo INCLUDE_PATH; ?>js/functions.js"></script>

<?php 
    if($url != 'contato' || $url == '404.php'){
?>
<script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>
<?php } ?>

<?php 
    if(is_array($url) && strstr($url[0],'noticias') !== false){
?>
    <script>
        $(function(){
            $('select').change(function(){
                location.href=include_path+"noticias/"+$(this).val();
            })
        });
    </script>
<?php } ?>

<!--<script src="js/exemplo.js"></script>-->
<script src="<?php echo INCLUDE_PATH; ?>js/formularios.js"></script>
<script src="<?php echo INCLUDE_PATH; ?>js/exemplo.js"></script>
</body>
</html>