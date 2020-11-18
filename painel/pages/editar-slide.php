<?php
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $slide = Painel::select('tb_site.slides','id = ?',array($id));
    }else{
        Painel::alert('erro','Você precisa passar o parametro ID.');
        die();
    }
?>
<div class="box__content">
    
    <h2><i class="fas fa-user-edit"></i> Editar Slide</h2>

    <form method="post" enctype="multipart/form-data">

    <?php
        if(isset($_POST['acao'])){
            //I sent my form

            $nome = $_POST['nome'];
            $imagem = $_FILES['imagem'];
			$imagem_atual = $_POST['imagem_atual'];

            if($imagem['name'] != ''){

                //There is image upload.
                if(Painel::imagemValida($imagem)){
                    Painel::deleteFile($imagem_atual);
                    $imagem = Painel::uploadFile($imagem);
                    $arr = ['nome'=>$nome,'slide'=>$imagem,'id'=>$id,'nome_tabela'=>'tb_site.slides'];
                    Painel::update($arr);
                    $slide = Painel::select('tb_site.slides','id = ?',array($id));
                    Painel::alert('sucesso','O Slide foi editado junto com a imagem!');
                }else{
                    Painel::alert('erro','O formato da imagem não é válido');
                }
            }else{
                $imagem = $imagem_atual;
                $arr = ['nome'=>$nome,'slide'=>$imagem,'id'=>$id,'nome_tabela'=>'tb_site.slides'];
                Painel::update($arr);
                $slide = Painel::select('tb_site.slides','id = ?',array($id));
                Painel::alert('sucesso','O Slide foi editado com sucesso!');
            }

        }
    ?>

        <div class="form__group">
            <label>Nome:</label>
            <input type="text" name="nome" required value="<?php echo $slide['nome'] ?>">
        </div><!--form__group-->

        <div class="form-group">
			<label>Imagem</label>
			<input type="file" name="imagem"/>
			<input type="hidden" name="imagem_atual" value="<?php echo $slide['slide']; ?>">
		</div><!--form-group-->

        <div class="form__group">
            <input type="submit" name="acao" value="Atualizar">
        </div><!--form__group-->

    </form>

</div><!--box__content-->