<?php

if (isset($this->data['form'][0])) {
    $valueForm = $this->data['form'][0];
    var_dump($valueForm);
}

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
<main>
    <div class="page-text">
        <h2>DevGate</h2>
        <p>Registrar um novo curso na plataforma</p>
    </div>
</main>

<main>
    <div class="page-text">
        <h2>Aula</h2>
        <p>Pagina de Edição de aula</p>
    </div>
    <div class="gn-form">
        <form  action="" method="POST">
            <?php
            $idAula = "";
            if (isset($valueForm['idAula'])) {
                $idAula = $valueForm['idAula'];
            }
            ?>
            <input type="hidden" name="idAula" value="<?php echo $idAula ?>">

            <?php
            $nomeAula = "";
            if (isset($valueForm['nomeAula'])) {
                $nomeAula = $valueForm['nomeAula'];
            }
            ?>
            <input type="text" name="nomeAula" id="name" value="<?php echo $nomeAula ?>" required="required">

            <?php
            $descricao = "";
            if (isset($valueForm['descricao'])) {
                $descricao = $valueForm['descricao'];
            }
            ?>
            <input type="descricao" name="descricao" id="descricao" value="<?php echo $descricao ?>" required="required">

            <input class="submit-btn" type="submit" name="EditAula" value="Editar">
        </form>
    </div>
</main>