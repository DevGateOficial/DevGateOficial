<?php
if (isset($this->data['form'])) {
    $valueForm = $this->data['form'];
}
?>

<main>
    <div class="texto">
        <h2>DevGate</h2>
        <p>Sic Dev creatus est <br><span>"Assim o dev foi criado"</span></p>

    </div>
    <div class="login-form">

        <!-- retirei o campo (id="login") pois estava impedindo o funcionamento do form. possivel problema no JS -->
        <form method="POST" action="" autocomplete="off">
            <?php
            $user = "";
            if (isset($valueForm['user'])) {
                $user = $valueForm['user'];
            }
            ?>
            <input type="text" name="user" placeholder="Login" value="<?php echo $user ?>">
            <input type="password" name="password" placeholder="Senha">

            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            if (isset($_SESSION['email'])) {
                echo $_SESSION['email'];
                unset($_SESSION['email']);
            }
            ?>

            <input class="btn" type="submit" name="SendLogin" value="Entrar">

            <span><a href="<?= URL; ?>recover-pass/index">Recuperar a Senha</a></span>
            <span><a href="<?= URL; ?>cadastro-usuario/index">Novo? Registrar-se aqui!</a></span>
        </form>
    </div>
</main>