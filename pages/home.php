<section class="banner__container">
    <div class="banner__single" style="background-image: url('<?php echo INCLUDE_PATH; ?>images/predio.jpg');"></div><!--banner__single-->
    <div class="banner__single" style="background-image: url('<?php echo INCLUDE_PATH; ?>images/livro.jpg');"></div><!--banner__single-->
    <div class="banner__single" style="background-image: url('<?php echo INCLUDE_PATH; ?>images/predios.jpg');"></div><!--banner__single-->
        <div class="overlay"></div><!--overlay-->
        <div class="container">

            <form class="ajax-form" method="post">
                <h2>Qual o seu melhor E-mail</h2>
                <input type="email" name="email" required>
                <input type="hidden" name="identificador" value="form_home">
                <input type="submit" name="acao" value="Cadastrar!">
            </form>

        </div><!--container-->

        <div class="bullets">
        </div><!--bullets-->

    </section><!--banner__principal-->

    <section id="sobre" class="descricao__autor">
        <div class="container">

            <div class="titulo__autor">
                <img src="<?php echo INCLUDE_PATH; ?>images/perfil.jpg">
                <h2><?php echo $infoSite['nome_autor']; ?></h2>
            </div><!--titulo__autor-->
                <p><?php echo $infoSite['descricao']; ?></p>

        </div><!--container-->
    </section><!--descricao__autor-->

    <section class="especialidades">
            <h2 class="title">Especialidades</h2>
            <div class="container">

                <div class="especialidades__box w33 left">
                    <h3><i class="<?php echo $infoSite['icone1']; ?>"></i></h3>
                    <h4>CSS3</h4>
                    <p><?php echo $infoSite['descricao1']; ?></p>
                </div><!--especialidades__box-->

                <div class="especialidades__box w33 left">
                    <h3><i class="<?php echo $infoSite['icone2']; ?>"></i></h3>
                    <h4>HTML5</h4>
                    <p><?php echo $infoSite['descricao2']; ?></p>
                </div><!--especialidades__box-->

                <div class="especialidades__box w33 left">
                    <h3><i class="<?php echo $infoSite['icone3']; ?>"></i></h3>
                    <h4>JavaScript</h4>
                    <p><?php echo $infoSite['descricao3']; ?></p>
                </div><!--especialidades__box-->

            <div class="clear"></div>
            </div><!--container-->
    </section><!--especialidades-->

    <section class="extras">
        <div class="container">

            <div class="w50 left servicos__container">
                <div class="title">Serviços</div>
                
                <div class="servicos">
                    <ul>
                        <?php
                            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.servicos` ORDER BY order_id ASC LIMIT 3");
                            $sql->execute();
                            $servicos = $sql->fetchAll();
                            foreach($servicos as $key => $value){
                        ?>
                        <li><?php echo $value['servico'] ?></li>
                        <?php }?>
                    </ul>
                </div><!--servicos-->

            </div><!--w50-->

            <div id="depoimentos" class="w50 left depoimento__container">
                <div class="title">Depoimentos dos nossos clientes</div>
                <?php
                    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.depoimentos` ORDER BY order_id ASC LIMIT 3");
                    $sql->execute();
                    $depoimentos = $sql->fetchAll();
                    foreach($depoimentos as $key => $value){
                ?>
                <div class="depoimento__single">
                    <p class="depoimento__descricao">"<?php echo $value['depoimento']; ?>"</p>
                    <p class="nome__autor"><?php echo $value['nome']; ?> - <?php echo $value['data']; ?></p>
                </div><!--depoimento__single-->   
                <?php } ?>         
            </div><!--w50-->

        <div class="clear"></div>
        </div><!--container-->
    </section><!--extras-->
