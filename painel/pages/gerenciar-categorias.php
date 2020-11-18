<?php
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        Painel::deletar('tb_site.categorias',$idExcluir);
        $noticias = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE categoria_id = ?");
        $noticias->execute(array($idExcluir));
        $noticias = $noticias->fetchAll();
        foreach($noticias as $key => $value){
            $imgDelete = $value['capa'];
            Painel::deleteFile($imgDelete);
        }
        $noticias = MySql::conectar()->prepare("DELETE FROM `tb_site.noticias` WHERE categoria_id = ?");
        $noticias->execute(array($idExcluir));
        Painel::redirect(INCLUDE_PATH_PAINEL.'gerenciar-categorias');
    }else if(isset($_GET['order']) && isset($_GET['id'])){
        Painel::orderItem('tb_site.categorias',$_GET['order'],$_GET['id']);
    }

    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 4;
    
    $categorias = Painel::selectAll('tb_site.categorias',($paginaAtual - 1) * $porPagina,$porPagina);
    
?>
<div class="box__content">
    
    <h2><i class="fas fa-user-edit"></i> Categorias Cadastradas</h2>

    <div class="wraper__table">
    <table>
        <tr>
            <td>Título</td>
            <td>Editar</td>
            <td>Excluir</td>
            <td>Subir</td>
            <td>Descer</td>
        </tr>

        <?php
            foreach($categorias as $key => $value){
        ?>

        <tr>
            <td><?php echo $value['nome']; ?></td>
            <td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-categoria?id=<?php echo $value['id']; ?>"><i class="fas fa-pencil-alt"></i> Editar</a></td>
            <td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-categorias?excluir=<?php echo $value['id']; ?>"><i class="fas fa-times"></i> Excluir</a></td>
            <td>&nbsp;&nbsp;<a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-categorias?order=up&id=<?php echo $value['id']; ?>"><i class="fa fa-angle-up"></i></a></td>
            <td>&nbsp;&nbsp;&nbsp;<a class="btn order" href="<?php echo INCLUDE_PATH_PAINEL ?>gerenciar-categorias?order=down&id=<?php echo $value['id']; ?>"><i class="fa fa-angle-down"></i></a></td>
        </tr>

        <?php } ?>

    </table>
    </div><!--wraper__table-->

    <div class="paginacao">
        <?php
            $totalPaginas = ceil(count(Painel::selectAll('tb_site.categorias')) / $porPagina);

            for($i = 1; $i <= $totalPaginas; $i++){
                if($i == $paginaAtual)
                    echo '<a class="page__selected" href="'.INCLUDE_PATH_PAINEL.'gerenciar-categorias?pagina='.$i.'">'.$i.'</a>';
                else
                    echo '<a href="'.INCLUDE_PATH_PAINEL.'gerenciar-categorias?pagina='.$i.'">'.$i.'</a>';
            }
        ?>
	</div><!--paginacao-->

</div><!--box__content-->