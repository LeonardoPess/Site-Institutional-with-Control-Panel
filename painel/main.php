<?php
    if(isset($_GET['loggout'])){
        Painel::loggout();
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

    <aside>
        <div class="aside__wraper">
            <div class="box__usuario">
                <?php
                    if($_SESSION['img'] == ''){
                ?>
                <div class="avatar__usuario">
                    <i class="fa fa-user"></i>
                </div><!--avatar__usuario-->
                <?php }else{ ?>
                <div class="imagem__usuario">
                    <img src="<?php echo INCLUDE_PATH_PAINEL; ?>uploads/<?php echo $_SESSION['img']; ?>">
                </div><!--imagem__usuario-->
                <?php } ?>

                <div class="nome__usuario">
                    <p><?php echo $_SESSION['nome']; ?></p>
                    <p><?php echo pegaCargo($_SESSION['cargo']); ?></p>
                </div><!--nome__usuario-->

            </div><!--box__usuario-->

            <div class="itens__menu">
                <h2>Cadastro</h2>
                <a <?php selecionadoMenu('cadastrar-depoimento'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-depoimento">Cadastrar Depoimento</a>
                <a <?php selecionadoMenu('cadastrar-servico'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-servico">Cadastrar serviço</a>
                <a <?php selecionadoMenu('cadastrar-slides'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-slides">Cadastrar Slides</a>
                <h2>Gestão</h2>
                <a <?php selecionadoMenu('listar-depoimentos'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-depoimentos">Listar Depoimentos</a>
                <a <?php selecionadoMenu('listar-servicos'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-servicos">Listar Serviços</a>
                <a <?php selecionadoMenu('listar-slides'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>listar-slides">Listar Slides</a>
                <h2>Administração do Painel</h2>
                <a <?php selecionadoMenu('editar-usuario'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-usuario">Editar Usuário</a>
                <a <?php selecionadoMenu('adicionar-usuarios'); ?> <?php verificaPermissaoMenu(0); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>adicionar-usuarios">Adicionar Usuários</a>
                <h2>Configuração Geral</h2>
                <a <?php selecionadoMenu('editar-site'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-site">Editar Site</a>
                <h2>Gestão de notícias</h2>
                <a <?php selecionadoMenu('cadastrar-categorias'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-categorias">Cadastrar Categorias</a>
                <a <?php selecionadoMenu('gerenciar-categorias'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-categorias">Gerenciar Categorias</a>
                <a <?php selecionadoMenu('cadastrar-noticias'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-noticias">Cadastrar notícias</a>
                <a <?php selecionadoMenu('gerenciarr-noticias'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-noticias">Gerenciar notícias</a>
            </div><!--itens__menu-->

        </div><!--aside_wraper-->
    </aside>

    <header>
        <div class="container">

            <div class="menu__btn">
                <i class="fa fa-bars"></i>
            </div><!--menu__btn-->
            
            <div class="loggout">
                <a <?php if(@$_GET['url'] == ''){ ?> style="color: #2F3D42;" <?php } ?> href="<?php echo INCLUDE_PATH_PAINEL ?>"><i class="fas fa-home"></i><span> Página Inicial</span></a>
                <a href="<?php echo INCLUDE_PATH_PAINEL ?>?loggout"><i class="fa fa-window-close"></i><span> Sair</span></a>
            </div><!--loggout-->

        <div class="clear"></div><!--clear-->
        </div><!--container-->
    </header>

    <div class="content">

        <?php
            Painel::loadPage();
        ?>

    </div><!--content-->


<script src="<?php echo INCLUDE_PATH; ?>js/all.min.js"></script>
<script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL; ?>js/jquery.mask.min.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL; ?>js/main.js"></script>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>
  tinymce.init({ 
  	selector:'.tinymce',
  	plugins: "image",
  	height:300
   });
  </script>
</body>
</html>