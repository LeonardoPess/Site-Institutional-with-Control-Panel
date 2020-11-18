<?php
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        $selectImagem = MySql::conectar()->prepare("SELECT capa FROM `tb_site.noticias` WHERE id = ?");
        $selectImagem->execute(array($_GET['excluir']));

        $imagem = $selectImagem->fetch()['capa'];
        Painel::deleteFile($imagem);
        Painel::deletar('tb_site.noticias',$idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'gerenciar-noticias');
    }else if(isset($_GET['order']) && isset($_GET['id'])){
        Painel::orderItem('tb_site.noticias',$_GET['order'],$_GET['id']);
    }

    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 4;
    
    $noticias = Painel::selectAll('tb_site.noticias',($paginaAtual - 1) * $porPagina,$porPagina);
    
?>
<div class="box__content">
    
    <h2><i class="fas fa-user-edit"></i> Notícias Cadastradas</h2>

    <div class="wraper__table">
    <table>
        <tr>
            <td>Título</td>
            <td>Categoria</td>
            <td>Capa</td>
            <td>Editar</td>
            <td>Excluir</td>
            <td>Subir</td>
            <td>Descer</td>
        </tr>

        <?php
            foreach($noticias as $key => $value){
            $nomeCategoria = Painel::select('tb_site.categorias','id=?',array($value['categoria_id']))['nome'];
        ?>

        <tr>
            <td><?php echo $value['titulo']; ?></td>
            <td><?php echo $nomeCategoria; ?></td>
            <td><img style="width:50px;height:50px"; src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $value['capa']; ?>"></td>
            <td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-noticia?id=<?php echo $value['id']; ?>"><i class="fas fa-pencil-alt"></i> Editar</a></td>
            <td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-noticias?excluir=<?php echo $value['id']; ?>"><i class="fas fa-times"></i> Excluir</a></td>
            <td>&nbsp;&nbsp;<a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-noticias?order=up&id=<?php echo $value['id']; ?>"><i class="fa fa-angle-up"></i></a></td>
            <td>&nbsp;&nbsp;&nbsp;<a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-noticias?order=down&id=<?php echo $value['id']; ?>"><i class="fa fa-angle-down"></i></a></td>
        </tr>

        <?php } ?>

    </table>
    </div><!--wraper__table-->

    <div class="paginacao">
        <?php
            $totalPaginas = ceil(count(Painel::selectAll('tb_site.noticias')) / $porPagina);

            for($i = 1; $i <= $totalPaginas; $i++){
                if($i == $paginaAtual)
                    echo '<a class="page__selected" href="'.INCLUDE_PATH_PAINEL.'gerenciar-noticias?pagina='.$i.'">'.$i.'</a>';
                else
                    echo '<a href="'.INCLUDE_PATH_PAINEL.'gerenciar-noticias?pagina='.$i.'">'.$i.'</a>';
            }
        ?>
	</div><!--paginacao-->

</div><!--box__content-->