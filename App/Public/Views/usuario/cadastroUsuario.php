<?php
if (isset($this->data['form'])) {
    $valueForm = $this->data['form'];
}
?>

<main>
    <div class="texto">
        <h2>DevGate</h2>
        <p>Embarque nesse barco e aprenda a programar</p>
    </div>

    <div class="login-form">
        <form method="POST" autocomplete="off" action="">
            <?php
            $nomeUsuario = "";
            if (isset($valueForm['nomeUsuario'])) {
                $nomeUsuario = $valueForm['nomeUsuario'];
            }
            ?>
            <input type="text" name="nomeUsuario" placeholder="Nome Usuário" maxlength="30" value="<?php echo $nomeUsuario ?>" />

            <?php
            $nomeCompleto = "";
            if (isset($valueForm['nomeCompleto'])) {
                $nomeCompleto = $valueForm['nomeCompleto'];
            }
            ?>

            <input type="text" name="nomeCompleto" placeholder="Nome completo" maxlength="30" value="<?php echo $nomeCompleto ?>" />
            <?php

            $email = "";
            if (isset($valueForm['email'])) {
                $email = $valueForm['email'];
            }
            ?>
            <input type="email" name="email" placeholder="devgate@sicdev.com" maxlength="60" value="<?php echo $email ?>" />

            <input type="password" name="senha" placeholder="Senha" minlength="8" maxlength="30" />

            <?php
            $dtNascimento = "";
            if (isset($valueForm['dtNascimento'])) {
                $dtNascimento = $valueForm['dtNascimento'];
            }
            ?>
            <input type="date" name="dtNascimento" value=" <?php echo $dtNascimento ?>">

            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
            <span><a href="<?= URL ?>login/index">Ja tem cadastro? Sign in</a></span>

            <input class="btn" type="submit" name="Cadastrar" value="Registrar-se" />
        </form>
    </div>
</main>