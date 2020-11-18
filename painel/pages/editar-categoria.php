<?php
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $categoria = Painel::select('tb_site.categorias','id = ?',array($id));
    }else{
        Painel::alert('erro','Você precisa passar o parametro ID.');
        die();
    }
?>
<div class="box__content">
    
    <h2><i class="fas fa-user-edit"></i> Editar Categoria</h2>

    <form method="post" enctype="multipart/form-data">

    <?php
        if(isset($_POST['acao'])){
            $slug = Painel::generateSlug($_POST['nome']);
            $arr = array_merge($_POST,array('slug'=>$slug));
            $verificar = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE nome = ? AND id != ?");
            $verificar->execute(array($_POST['nome'],$id));
            if($verificar->rowCount() == 1){
                Painel::alert('erro','Já existe uma categoria com esse nome!');
            }else{
                if(Painel::update($arr)){
                Painel::alert('sucesso','A categoria foi atualizada com sucesso!');
                $categoria = Painel::select('tb_site.categorias','id = ?',array($id));
                }else{
                Painel::alert('erro','Campos vázios não são permitidos.');
                }
            }
        }
    ?>

        <div class="form__group">
            <label>Categoria:</label>
            <input type="text" name="nome" value="<?php echo $categoria['nome'] ?>">
        </div><!--form__group-->

        <div class="form__group">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" name="nome_tabela" value="tb_site.categorias">
            <input type="submit" name="acao" value="Atualizar!">
        </div><!--form__group-->

    </form>

</div><!--box__content-->