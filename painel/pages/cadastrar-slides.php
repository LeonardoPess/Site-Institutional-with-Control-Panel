<div class="box__content">
    
    <h2><i class="fas fa-user-edit"></i> Cadastrar Slide</h2>

    <form method="post" enctype="multipart/form-data">

    <?php
        if(isset($_POST['acao'])){
            $nome = $_POST['nome'];
            $imagem = $_FILES['imagem'];

            if($nome == ''){
                Painel::alert('erro','O campo nome está vázio!');
            }else{
                //can register
                if(Painel::imagemValida($imagem) == false){
                    Painel::alert('erro','O formato  de imagem especificado não está correto!'); 
                }else{
                    //only register at db
                    include('../classes/lib/WideImage.php');
                    $imagem = Painel::uploadFile($imagem);
                    WideImage::load('uploads/'.$imagem)->resize(100)->saveToFile('uploads/'.$imagem);
                    $arr = ['nome'=>$nome,'slide'=>$imagem,'order_id'=>'0','nome_tabela'=>'tb_site.slides'];
                    Painel::insert($arr);
                    Painel::alert('sucesso','O cadastro do slide '.$nome.' foi feito com sucesso!');
                }
            }
        }
    ?>

        <div class="form__group">
            <label>Nome do slide:</label>
            <input type="text" name="nome">
        </div><!--form__group-->

        <div class="form-group">
			<label>Imagem</label>
			<input type="file" name="imagem"/>
		</div><!--form-group-->

        <div class="form__group">
            <input type="submit" name="acao" value="Atualizar">
        </div><!--form__group-->

    </form>

</div><!--box__content-->