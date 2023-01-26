<main class="main-list-curso">

    <h2> Meus Cursos </h2>

    <!-- VERIFICAR SE A SEARCH BAR FUNCIONA-->
    <form class="search" method="POST" action="">
        <?php
        $pesquisa = "";
        if (isset($valueForm['pesquisa'])) {
            $pesquisa = $valueForm['pesquisa'];
        }
        ?>

        <input type="text" name="pesquisa" class="searchTerm" placeholder="Search" value="<?php echo $pesquisa ?>">
        <button type="submit" class="searchButton" name="pesquisar" value="pesquisar">
            <span class="material-symbols-sharp"> search </span>
        </button>

    </form>

    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>


    <!-- Table de cursos -->

    <div class="cursos-wrapper">

        <?php foreach ($this->data['meusCursos'] as $curso) : ?>

            <div class="curso mine" class="modal-button">
                <img src="<?= URLSRC; ?>assets/data/cursos/<?= $curso[0]['idCurso'] . '/' . $curso[0]['imagem']; ?>" alt="imagem do curso">
                <p style="display: none;" class='sub-titulo-list'></p>
                <h2><?= $curso[0]['nomeCurso'] ?> </h2>
                <p class='sub-titulo-list'><?= $curso[0]['subtituloCurso'] ?> </p>
                <div class='obj-list'> <?= $curso[0]['objetivos'] ?></div>
                <span class='visit-btn'><a href="<?= URL ?>view-curso/index/<?= $curso[0]['idCurso'] ?>"> Continuar </a></span>
            </div>
        <?php endforeach; ?>

    </div>
</main>