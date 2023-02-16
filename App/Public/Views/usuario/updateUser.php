<?php

if (isset($this->data['form'])) {
    $valueForm = $this->data['form'];
    //var_dump($valueForm);
}

?>

<div class="main-cadastro">
    <div class="box-cadastro">
        <form method="POST" action="" class="form-cadastro">
            <h2>Sign up</h2>

            <!-- Informações na tabela usuario -->
            <div class="inputBox-cadastro">
                <?php
                $cpf = "";
                if (isset($valueForm['cpf'])) {
                    $cpf = $valueForm['cpf'];
                }
                ?>
                <input type="text" name="cpf" id="name" value="<?php echo $cpf ?>" required="required">
                <span>CPF</span>
                <i></i>
            </div>

            <div class="inputBox-cadastro">
                <?php
                $telefone = "";
                if (isset($valueForm['telefone'])) {
                    $telefone = $valueForm['telefone'];
                }
                ?>
                <input type="telefone" name="telefone" id="telefone" value="<?php echo $telefone ?>" required="required">
                <span>Telefone</span>
                <i></i>
            </div>

            <!-- Informações na tabela endereco -->
            <div class="inputBox-cadastro">
                <?php
                $nomeLogradouro = "";
                if (isset($valueForm['nomeLogradouro'])) {
                    $nomeLogradouro = $valueForm['nomeLogradouro'];
                }
                ?>
                <input type="text" name="nomeLogradouro" value="<?php echo $nomeLogradouro ?>" required="required">
                <span>Logradouro</span>
                <i></i>
            </div>

            <div class="inputBox-cadastro">
                <?php
                $numero = "";
                if (isset($valueForm['numero'])) {
                    $numero = $valueForm['numero'];
                }
                ?>
                <input type="text" name="numero" value="<?php echo $numero ?>" required="required">
                <span>Numero</span>
                <i></i>
            </div>

            <div class="inputBox-cadastro">
                <?php
                $complemento = "";
                if (isset($valueForm['complemento'])) {
                    $complemento = $valueForm['complemento'];
                }
                ?>
                <input type="text" name="complemento" value=" <?php echo $complemento ?>">
                <span>Complemento</span>
                <i></i>
            </div>

            <div class="inputBox-cadastro">
                <?php
                $cep = "";
                if (isset($valueForm['cep'])) {
                    $cep = $valueForm['cep'];
                }
                ?>
                <input type="text" name="cep" id="name" value="<?php echo $cep ?>" required="required">
                <span>CEP</span>
                <i></i>
            </div>

            <div class="inputBox-cadastro">
                <?php
                $bairro = "";
                if (isset($valueForm['bairro'])) {
                    $bairro = $valueForm['bairro'];
                }
                ?>
                <input type="text" name="bairro" id="name" value="<?php echo $bairro ?>" required="required">
                <span>Bairro</span>
                <i></i>
            </div>

            <div class="inputBox-cadastro">
                <?php
                $cidade = "";
                if (isset($valueForm['cidade'])) {
                    $cidade = $valueForm['cidade'];
                }
                ?>
                <input type="text" name="cidade" id="name" value="<?php echo $cidade ?>" required="required">
                <span>Cidade</span>
                <i></i>
            </div>

            <div class="inputBox-cadastro">
                <?php
                $estado = "";
                if (isset($valueForm['estado'])) {
                    $estado = $valueForm['estado'];
                }
                ?>
                <input type="text" name="estado" id="name" value="<?php echo $estado ?>" required="required">
                <span>Estado</span>
                <i></i>
            </div>

            <div class="inputBox-cadastro">
                <?php
                $pais = "";
                if (isset($valueForm['pais'])) {
                    $pais = $valueForm['pais'];
                }
                ?>
                <input type="text" name="pais" id="name" value="<?php echo $pais ?>" required="required">
                <span>Pais</span>
                <i></i>
            </div>

            <div class="links-cadastro">
                <input type="submit" name="UpdateUser" value="Enviar Requisicao">
                <a href="<?php echo URL; ?>login/index"> Sign in </a>
            </div>
        </form>
    </div>
</div>