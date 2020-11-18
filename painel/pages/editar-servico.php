<?php
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $servico = Painel::select('tb_site.servicos','id = ?',array($id));
    }else{
        Painel::alert('erro','Você precisa passar o parametro ID.');
        die();
    }
?>
<div class="box__content">
    
    <h2><i class="fas fa-user-edit"></i> Editar Servicos</h2>

    <form method="post" enctype="multipart/form-data">

    <?php
        if(isset($_POST['acao'])){
            if(Painel::update($_POST)){
                Painel::alert('sucesso','O servico foi Editado com sucesso!');
                $servico = Painel::select('tb_site.servicos','id = ?',array($id));
            }else{
                Painel::alert('erro','Campos vázios não são permitidos.');
            }
        }
    ?>

        <div class="form__group">
            <label>Servicos:</label>
            <textarea name="servico"><?php echo $servico['servico']; ?></textarea>
        </div><!--form__group-->

        <div class="form__group">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" name="nome_tabela" value="tb_site.servicos">
            <input type="submit" name="acao" value="Atualizar!">
        </div><!--form__group-->

    </form>

</div><!--box__content-->