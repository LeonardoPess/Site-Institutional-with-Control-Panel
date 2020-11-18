<?php
    $site = Painel::select('tb_site.config',false);
?>
<div class="box__content">
    
    <h2><i class="fas fa-user-edit"></i> Configurações Gerais</h2>

    <form method="post" enctype="multipart/form-data">

    <?php
        if(isset($_POST['acao'])){
            if(Painel::update($_POST,true)){
                Painel::alert('sucesso','O site foi Editado com sucesso!');
                $site = Painel::select('tb_site.config',false);
            }else{
                Painel::alert('erro','Campos vázios não são permitidos.');
            }
        }
    ?>

        <div class="form__group">
            <label>Título do Site:</label>
            <input type="text" name="titulo" value="<?= $site['titulo'] ?>">
        </div><!--form__group-->

        <div class="form__group">
            <label>Nome do Autor:</label>
            <input type="text" name="nome_autor" value="<?= $site['nome_autor'] ?>">
        </div><!--form__group-->

        <div class="form__group">
            <label>Descrição do Autor:</label>
            <textarea name="descricao"><?= $site['descricao'] ?></textarea>
        </div><!--form__group-->

        <?php
            for($i = 1; $i <= 3; $i++){
        ?>

            <div class="form__group">
                <label>Ícone <?= $i; ?></label>
                <input type="text" name="icone<?= $i; ?>" value="<?php echo $site['icone'.$i]; ?>">
            </div><!--form__group-->

            <div class="form__group">
                <label>Descrição do Ícone <?= $i; ?>:</label>
                <textarea name="descricao<?= $i; ?>"><?php echo $site['descricao'.$i]; ?></textarea>
            </div><!--form__group-->

        <?php } ?>

        <div class="form__group">
            <input type="hidden" name="nome_tabela" value="tb_site.config">
            <input type="submit" name="acao" value="Atualizar!">
        </div><!--form__group-->

    </form>

</div><!--box__content-->