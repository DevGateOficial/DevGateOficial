<?php

if (isset($this->data['form'])) {
    $valueForm = $this->data['form'];
    //var_dump($valueForm);
}

?>

<main class="main-cadastro">
    <div class="texto">
        <h2>Nova senha</h2>
        <div class="login-form pass-wrap">
            <form method="POST" action="">
                <div class="inputBox-cadastro">
                    <?php
                    $senha = "";
                    if (isset($valueForm['senha'])) {
                        $senha = $valueForm['senha'];
                    }

                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>
                    <input type="password" name="senha" placeholder="nova senha" id="senha" value="<?php echo $senha ?>" required="required">
                    <input class="btn" type="submit" name="UpdatePass" value="Enviar">

                </div>
            </form>
        </div>
</main>