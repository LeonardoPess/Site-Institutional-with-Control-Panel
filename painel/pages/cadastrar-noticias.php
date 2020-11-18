<div class="box__content">
    
    <h2><i class="fas fa-user-edit"></i> Cadastrar Notícias</h2>

    <form method="post" enctype="multipart/form-data">

    <?php
        if(isset($_POST['acao'])){
            $categoria_id =$_POST['categoria_id'];
            $titulo = $_POST['titulo'];
            $conteudo = $_POST['conteudo'];
            $capa = $_FILES['capa'];

            if($titulo == '' || $conteudo == ''){
                Painel::alert('erro','Campos vázios não são permitidos!');
            }else if($capa['tmp_name'] == ''){
                Painel::alert('erro','A imagem de capa precisa ser selecionada!');
            }else{
                if(Painel::imagemValida($capa)){
                    $verifica = MySql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE titulo = ? AND categoria_id = ?");
                    $verifica->execute(array($titulo,$categoria_id));
                    if($verifica->rowCount() == 0){
                        $imagem = Painel::uploadFile($capa);
                        $slug = Painel::generateSlug($titulo);
                        $arr = [
                            'categoria_id'=>$categoria_id,
                            'data'=>date('Y-m-d'),
                            'titulo'=>$titulo,
                            'conteudo'=>$conteudo,
                            'capa'=>$imagem,
                            'slug'=>$slug,
                            'order_id'=>'0',
                            'nome_tabela'=>'tb_site.noticias'
                            ];
                        if(Painel::insert($arr)){
                            Painel::redirect(INCLUDE_PATH_PAINEL.'cadastrar-noticias?sucesso');
                            //Painel::alert('sucesso','O cadastro da notícia '.$titulo.' foi realizado com sucesso!');
                        }
                    }else{
                        Painel::alert('erro','Já existe uma notícia com esse nome!');
                    }
                }else{
                    Painel::alert('erro','Selecione uma imagem válida!');
                }
            }
        }
        if(isset($_GET['sucesso']) && !isset($_POST['acao']))
            Painel::alert('sucesso','O cadastro da notícia foi realizado com sucesso!');
    ?>

        <div class="form__group">
            <label>Categoria:</label>
            <select name="categoria_id">
                <?php
                    $categorias = Painel::selectAll('tb_site.categorias');
                    foreach($categorias as $key => $value){
                ?>
                    <option <?php if($value['id'] == @$_POST['categoria_id'])echo 'selected' ?> value="<?= $value['id'] ?>"><?= $value['nome'] ?></option>
                <?php } ?>
            </select>
        </div><!--form__group-->

        <div class="form__group">
            <label>Título:</label>
            <input type="text" name="titulo" value="<?php recoverPost('titulo'); ?>">
        </div><!--form__group-->

        <div class="form__group">
            <label>Conteúdo:</label>
            <textarea class="tinymce" name="conteudo"><?php recoverPost('conteudo'); ?></textarea>
        </div><!--form__group-->

        <div class="form-group">
			<label>Capa:</label>
			<input type="file" name="capa"/>
		</div><!--form-group-->

        <div class="form__group">
            <input type="hidden" name="order_id" value="0">
            <input type="hidden" name="nome_tabela" value="tb_site.noticias">
            <input type="submit" name="acao" value="Cadastrar">
        </div><!--form__group-->

    </form>

</div><!--box__content-->