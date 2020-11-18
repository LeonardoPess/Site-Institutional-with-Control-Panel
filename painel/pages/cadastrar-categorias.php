<div class="box__content">
    
    <h2><i class="fas fa-user-edit"></i> Cadastrar Categoria</h2>

    <form method="post" enctype="multipart/form-data">

    <?php
        if(isset($_POST['acao'])){
            $nome = $_POST['nome'];

            if($nome == ''){
                Painel::alert('erro','O campo nome está vázio!');
            }else{
                    //only register at db
                    $verificar = MySql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE nome = ?");
                    $verificar->execute(array($_POST['nome']));
                    if($verificar->rowCount() == 0){
                        $slug = Painel::generateSlug($nome);
                        $arr = ['nome'=>$nome,'slug'=>$slug,'order_id'=>'0','nome_tabela'=>'tb_site.categorias'];
                        Painel::insert($arr);
                        Painel::alert('sucesso','O cadastro da categoria "'.$nome.'" foi feito com sucesso!');
                    }else{
                        Painel::alert('erro','Já existe uma categoria "'.$nome.'"!');
                    }
                }
            }
    ?>

        <div class="form__group">
            <label>Nome da categoria:</label>
            <input type="text" name="nome">
        </div><!--form__group-->

        <div class="form__group">
            <input type="submit" name="acao" value="Cadastrar">
        </div><!--form__group-->

    </form>

</div><!--box__content-->