<div class="box__content">
    
    <h2><i class="fas fa-user-edit"></i> Adicionar Serviço</h2>

    <form method="post" enctype="multipart/form-data">

    <?php
        if(isset($_POST['acao'])){
            if(Painel::insert($_POST)){
                Painel::alert('sucesso','O cadastro do serviço foi feito com sucesso!');
            }else{
                Painel::alert('erro','Campos vázios não são permitidos');
            }
        }
    ?>
        <div class="form__group">
            <label>Descreva o serviço:</label>
            <textarea name="servico"></textarea>
        </div><!--form__group-->

        <div class="form__group">
            <input type="hidden" name="order_id" value="0">
            <input type="hidden" name="nome_tabela" value="tb_site.servicos">
            <input type="submit" name="acao" value="Cadastrar">
        </div><!--form__group-->

    </form>

</div><!--box__content-->