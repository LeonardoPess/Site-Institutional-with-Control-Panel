<?php
    $url = explode('/',$_GET['url']);

    $verificaCategoria = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE slug = ?");
    $verificaCategoria->execute(array($url[1]));
    if($verificaCategoria->rowCount() == 0){
        Painel::redirect(INCLUDE_PATH.'noticias');
    }
    $categoriaInfo = $verificaCategoria->fetch();

    $post = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE slug = ? and categoria_id = ?");
    $post->execute(array($url[2],$categoriaInfo['id']));
    if($post->rowCount() == 0){
        Painel::redirect(INCLUDE_PATH.'noticias');
    }
    //My news exists
    $post = $post->fetch();
?>
<section class="noticia__single">
    <div class="container">

        <header>
            <h1><i class="far fa-newspaper"></i> <?php echo $post['data'] ?> - <?php echo $post['titulo'] ?></h1>
        </header>

        <article>
            <?php echo $post['conteudo'] ?>
        </article>
    </div><!--container-->
</section><!--noticia__single-->