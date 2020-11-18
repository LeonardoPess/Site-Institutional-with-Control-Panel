<?php
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $depoimento = Painel::select('tb_site.depoimentos','id = ?',array($id));
    }else{
        Painel::alert('erro','Você precisa passar o parametro ID.');
        die();
    }
?>
<div class="box__content">
    
    <h2><i class="fas fa-user-edit"></i> Editar Depoimento</h2>

    <form method="post" enctype="multipart/form-data">

    <?php
        if(isset($_POST['acao'])){
            if(Painel::update($_POST)){
                Painel::alert('sucesso','O depoimento foi Editado com sucesso!');
                $depoimento = Painel::select('tb_site.depoimentos','id = ?',array($id));
            }else{
                Painel::alert('erro','Campos vázios não são permitidos.');
            }
        }
    ?>

        <div class="form__group">
            <label>Nome da pessoa:</label>
            <input type="text" name="nome" value="<?php echo $depoimento['nome']; ?>">
        </div><!--form__group-->

        <div class="form__group">
            <label>Depoimento:</label>
            <textarea name="depoimento"><?php echo $depoimento['depoimento']; ?></textarea>
        </div><!--form__group-->

        <div class="form__group">
            <label>Data:</label>
            <input formato=data type="text" name="data" value="<?php echo $depoimento['data']; ?>">
        </div><!--form__group-->

        <div class="form__group">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" name="nome_tabela" value="tb_site.depoimentos">
            <input type="submit" name="acao" value="Atualizar!">
        </div><!--form__group-->

    </form>

</div><!--box__content-->