<?php

if (isset($this->data['form'])) {
    $valueForm = $this->data['form'];
}
?>

<main>
    <div class="texto">
        <h2>Recuperar senha</h2>

        <div class="login-form pass-wrap">
            <form method="POST" action="">
                <?php
                $email = "";
                if (isset($valueForm['email'])) {
                    $email = $valueForm['email'];
                }
                ?>

                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>

                <input type="email" name="email" placeholder="devgate@sicdev.com" maxlength="60" value="<?php echo $email ?>" />
                <input class="btn" type="submit" name="Enviar" value="Enviar" />

                <span><a href="<?php echo URL; ?>login/index">Acesse Aqui</a></span>
            </form>
        </div>
    </div>
</main>