<?php
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $noticia = Painel::select('tb_site.noticias','id = ?',array($id));
    }else{
        Painel::alert('erro','Você precisa passar o parametro ID.');
        die();
    }
?>
<div class="box__content">
    
    <h2><i class="fas fa-user-edit"></i> Editar Notícia</h2>

    <form method="post" enctype="multipart/form-data">

    <?php
        if(isset($_POST['acao'])){
            //I sent my form

            $titulo = $_POST['titulo'];
            $categoria = $_POST['categoria_id'];
            $conteudo = $_POST['conteudo'];
            $imagem = $_FILES['capa'];
            $imagem_atual = $_POST['imagem_atual'];
            $verifica = MySql::conectar()->prepare("SELECT `id` FROM `tb_site.noticias` WHERE titulo = ? AND categoria_id = ? AND id != ?");
            $verifica->execute(array($titulo,$categoria,$id));

            if($verifica->rowCount() == 0){
                if($imagem['name'] != ''){
                    //There is image upload.
                    if(Painel::imagemValida($imagem)){
                        Painel::deleteFile($imagem_atual);
                        $imagem = Painel::uploadFile($imagem);
                        $slug = Painel::generateSlug($titulo);
                        $arr = ['titulo'=>$titulo,'data'=>date('Y-m-d'),'categoria_id'=>$categoria,'conteudo'=>$conteudo,'capa'=>$imagem,'slug'=>$slug,'id'=>$id,'nome_tabela'=>'tb_site.noticias'];
                        Painel::update($arr);
                        $noticia = Painel::select('tb_site.noticias','id = ?',array($id));
                        Painel::alert('sucesso','A Notícia "'.$titulo.'" foi editado junto com a imagem!');
                    }else{
                        Painel::alert('erro','O formato da imagem não é válido');
                    }
                }else{
                    $imagem = $imagem_atual;
                    $slug = Painel::generateSlug($titulo);
                    $arr = ['titulo'=>$titulo,'categoria_id'=>$categoria,'conteudo'=>$conteudo,'capa'=>$imagem,'slug'=>$slug,'id'=>$id,'nome_tabela'=>'tb_site.noticias'];
                    Painel::update($arr);
                    $noticia = Painel::select('tb_site.noticias','id = ?',array($id));
                    Painel::alert('sucesso','A Notícia "'.$titulo.'" foi editado com sucesso!');
                }
            }else{
                Painel::alert('erro','Já existe uma notícia com esse nome "'.$titulo.'"!');
            }

        }
    ?>

        <div class="form__group">
            <label>Título:</label>
            <input type="text" name="titulo" required value="<?php echo $noticia['titulo'] ?>">
        </div><!--form__group-->

        <div class="form__group">
            <label>Conteúdo:</label>
            <textarea class="tinymce" name="conteudo"><?php echo $noticia['conteudo'] ?></textarea>
        </div><!--form__group-->

        <div class="form__group">
            <label>Categoria:</label>
            <select name="categoria_id">
                <?php
                    $categorias = Painel::selectAll('tb_site.categorias');
                    foreach($categorias as $key => $value){
                ?>
                    <option <?php if($value['id'] == $noticia['categoria_id'])echo 'selected' ?> value="<?= $value['id'] ?>"><?= $value['nome'] ?></option>
                <?php } ?>
            </select>
        </div><!--form__group-->

        <div class="form-group">
			<label>Capa:</label>
			<input type="file" name="capa"/>
			<input type="hidden" name="imagem_atual" value="<?php echo $noticia['capa']; ?>">
		</div><!--form-group-->

        <div class="form__group">
            <input type="submit" name="acao" value="Atualizar">
        </div><!--form__group-->

    </form>

</div><!--box__content-->