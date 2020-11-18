<div class="box__content">
    
    <h2><i class="fas fa-user-edit"></i> Editar Usuário</h2>

    <form method="post" enctype="multipart/form-data">

    <?php
        if(isset($_POST['acao'])){
            //I sent my form

            $nome = $_POST['nome'];
            $senha = $_POST['password'];
            $imagem = $_FILES['imagem'];
			$imagem_atual = $_POST['imagem_atual'];
            $usuario = new Usuario();

            if($imagem['name'] != ''){
                //There is image upload.
                if(Painel::imagemValida($imagem)){
                    Painel::deleteFile($imagem_atual);
                    $imagem = Painel::uploadFile($imagem);
                    if($usuario->atualizarUsuario($nome,$senha,$imagem)){
                        $_SESSION['img'] = $imagem;
                        Painel::redirect(INCLUDE_PATH_PAINEL.'editar-usuario');
                        Painel::alert('sucesso','Atualizado com sucesso junto com a imagem!');
                    }else{
                        Painel::alert('erro','Ocorreu um erro ao atualizar junto com a imagem');
                    }
                }else{
                    Painel::alert('erro','O formato da imagem não é válido');
                }
            }else{
                $imagem = $imagem_atual;
                if($usuario->atualizarUsuario($nome,$senha,$imagem)){
                    Painel::alert('sucesso','Atualizado com sucesso!');
                }else{
                    Painel::alert('erro','Ocorreu um erro ao atualizar...');
                }
            }

        }
    ?>

        <div class="form__group">
            <label>Nome:</label>
            <input type="text" name="nome" required value="<?php echo $_SESSION['nome'] ?>">
        </div><!--form__group-->

        <div class="form__group">
            <label>Senha:</label>
            <input type="password" name="password" required value="<?php echo $_SESSION['password']?>">
        </div><!--form__group-->

        <div class="form-group">
			<label>Imagem</label>
			<input type="file" name="imagem"/>
			<input type="hidden" name="imagem_atual" value="<?php echo $_SESSION['img']; ?>">
		</div><!--form-group-->

        <div class="form__group">
            <input type="submit" name="acao" value="Atualizar">
        </div><!--form__group-->

    </form>

</div><!--box__content-->