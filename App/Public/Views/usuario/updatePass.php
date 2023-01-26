<?php

if (isset($this->data['form'])) {
    $valueForm = $this->data['form'];
    //var_dump($valueForm);
}

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

<main class="main-cadastro">
    <div class="texto">
        <form method="POST" action="" class="form-cadastro">
            <h2>Nova senha</h2>

            <div class="inputBox-cadastro">
                <?php
                $senha = "";
                if (isset($valueForm['senha'])) {
                    $senha = $valueForm['senha'];
                }
                ?>
                <input type="text" name="senha" id="senha" value="<?php echo $senha ?>" required="required">
                <span>Nova senha</span>
                <i></i>
            </div>

            <div class="links-cadastro">
                <input type="submit" name="UpdatePass" value="Enviar">
                <a href="<?php echo URL; ?>login/index"> Sign in </a>
            </div>
        </form>
    </div>
</main>