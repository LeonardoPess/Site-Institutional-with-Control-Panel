<?php
    $porPagina = 6;
    $url = explode('/',$_GET['url']);
	if(!isset($url[2]))
	{
    $categoria = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE slug = ?");
	$categoria->execute(array(@$url[1]));
	$categoria = $categoria->fetch();
?>
<section class="header__noticias">
    <div class="container">
        <h2><i class="fa fa-bell"></i></h2>
        <h2>Acompanhe as últimas <b>notícias do portal</b></h2>
    </div><!--container-->
</section><!--header__noticias-->

<section class="container__portal">
    <div class="container">
        <div class="sidebar left">

            <div class="box__content__sidebar">
                <h3><i class="fa fa-search"></i> Realizar uma busca:</h3>
                <form method="post">
                    <input type="text" name="parametro" placeholder="O que deseja procurar?" required>
                    <input type="submit" name="buscar" value="Buscar">
                </form>
            </div><!--box__content__sidebar-->

            <div class="box__content__sidebar">
                <h3><i class="fa fa-list-ul"></i> Selecione a categoria:</h3>
                <form>
                    <select name="categoria">
                    <option value="" selected="">Todas as categorias</option>
                        <?php
                            $categorias = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` ORDER BY order_id ASC");
                            $categorias->execute();
                            $categorias = $categorias->fetchAll();
								foreach ($categorias as $key => $value) {
                        ?>
                        
                        <option <?php if($value['slug'] == @$url[1]) echo 'selected'; ?> value="<?php echo $value['slug'] ?>"><?php echo $value['nome']; ?></option>

                        <?php } ?>

                    </select>
                </form>
            </div><!--box__content__sidebar-->

            <div class="box__content__sidebar">
                <h3><i class="fa fa-user"></i> Sobre o autor:</h3>

                <div class="autor__box__portal">
                    <div class="box__img__autor"></div><!--box__img__autor-->
                        <div class="box__texto__autor text-center">
                            <?php 
                                $infoSite = MySql::conectar()->prepare("SELECT * FROM `tb_site.config`");
                                $infoSite->execute();
                                $infoSite = $infoSite->fetch();
                            ?>
                                <h3><?php echo $infoSite['nome_autor'] ?></h3>
                                <p><?php echo substr($infoSite['descricao'],0,500).'...' ?></p>
                        </div><!--box__texto__autor-->
                </div><!--autor__box__portal-->

            </div><!--box__content__sidebar-->

        </div><!--sidebar-->

        <div class="conteudo__portal left">
        
            <div class="header__conteudo__portal">
                <?php
                    if(!isset($_POST['parametro'])){
                        if(isset($categoria['nome']) == ''){
                            echo '<h2>Visualizando todos os Posts</h2>';
                        }else{
                            echo '<h2>Visualizando Posts em <span>'.$categoria['nome'].'</span></h2>';
                        }  
                    }else{
                        if(isset($categoria['nome']) == ''){
                            echo '<h2><i class=""fa fa-check></i>Busca por <span>"'.$_POST['parametro'].'"</span>  realizada com sucesso!</h2>';
                        }else{
                            echo '<h2><i class=""fa fa-check></i>Busca por <span>"'.$_POST['parametro'].'"</span> na categoria <span>'.$categoria['nome'].'</span> realizada com sucesso!</h2>';
                        }
                        
                    }

                    $query = "SELECT * FROM `tb_site.noticias` ";
                    if(isset($categoria['nome']) != ''){
                        $categoria['id'] = (int)$categoria['id'];
                        $query.="WHERE categoria_id = $categoria[id]";
                    }
                    if(isset($_POST['parametro'])){
                        if(strstr($query,'WHERE') !== false){
                            $busca = $_POST['parametro'];
                            $query.=" AND titulo LIKE '%$busca%' OR conteudo LIKE '%$busca%'";
                        }else{
                            $busca = $_POST['parametro'];
                            $query.=" WHERE titulo LIKE '%$busca%' OR conteudo LIKE '%$busca%'";
                        }
                    }
                    $query2 = "SELECT * FROM `tb_site.noticias` ";
                    if(isset($categoria['nome']) != ''){
                        $categoria['id'] = (int)$categoria['id'];
                        $query2.="WHERE categoria_id = $categoria[id]";
                    }
                    if(isset($_POST['parametro'])){
                        if(strstr($query2,'WHERE') !== false){
                            $busca = $_POST['parametro'];
                            $query2.=" AND titulo LIKE '%$busca%' OR conteudo LIKE '%$busca%'";
                        }else{
                            $busca = $_POST['parametro'];
                            $query2.=" WHERE titulo LIKE '%$busca%' OR conteudo LIKE '%$busca%'";
                        }
                    }
                    $totalPaginas = MySql::conectar()->prepare($query2);
                    $totalPaginas->execute();
                    $totalPaginas = ceil($totalPaginas->rowCount() / $porPagina);
                    if(!isset($_POST['parametro'])){
                        if(isset($_GET['pagina'])){
                            $pagina = (int)$_GET['pagina'];
                            if($pagina > $totalPaginas)
                                $pagina = 1;
                            $queryPg = ($pagina - 1) * $porPagina;
                            $query.=" ORDER BY order_id ASC LIMIT $queryPg,$porPagina";
                        }else{
                            $pagina = 1;
                            $query.=" ORDER BY order_id ASC LIMIT 0,$porPagina";
                        }
                    }else{
                        $query.=" ORDER BY order_id ASC";
                    }
                    $sql = MySql::conectar()->prepare($query);
                    $sql->execute();
                    $noticias = $sql->fetchAll();
                ?>
            </div><!--header__conteudo__portal-->

            <?php 
                foreach($noticias as $key => $value){
                $sql = MySql::conectar()->prepare("SELECT `slug` FROM `tb_site.categorias` WHERE id = ?");
                $sql->execute(array($value['categoria_id']));
                $categoriaNome = $sql->fetch()['slug'];
            ?>

            <div class="box__single__conteudo">
                <h2><?php echo date('d/m/Y',strtotime($value['data'])) ?> - <?php echo $value['titulo'] ?></h2>
                <p><?php echo substr(strip_tags($value['conteudo']),0,500).'...'; ?></p>
                <a href="<?= INCLUDE_PATH; ?>noticias/<?php echo $categoriaNome?>/<?php echo $value['slug']; ?> ">Leia mais</a>
            </div><!--box__single__conteudo-->

            <?php } ?>

            <div class="paginator">
                <?php 
                    if(!isset($_POST['parametro'])){
                        for($i = 1; $i <= $totalPaginas; $i++){
                            $catStr = (isset($categoria['nome']) != '') ? '/'.$categoria['slug'] : '';
                            if($pagina == $i)
                                echo '<a class="active__page" href="'.INCLUDE_PATH.'noticias'.$catStr.'?pagina='.$i.'">'.$i.'</a>';
                            else
                                echo '<a href="'.INCLUDE_PATH.'noticias'.$catStr.'?pagina='.$i.'">'.$i.'</a>';
                        }
                    }
                ?>
            </div><!--paginator-->

        </div><!--conteudo__portal-->

    <div class="clear"></div>
    </div><!--container-->
</section><!--container__portal-->

<?php }else{
    include('noticia-single.php');
    }
?>