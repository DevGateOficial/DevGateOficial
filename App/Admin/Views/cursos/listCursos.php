<main class="main-list-curso">

    <div class="titulo">
        <h1> Cursos </h1>
        <p><?= count($this->data['listCursos']) ?> cursos</p>
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
    </div>

    <div class="pesquisa">
        <form method="POST" action="">
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
    </div>

    <!-- Table de cursos -->
    <div class="cursos-wrapper">
        <?php foreach ($this->data['listCursos'] as $curso) : ?>
            <div class="curso" onclick="viewCurso(<?= $curso['idCurso'] ?>)">
                <img src="<?= URLSRC; ?>assets/data/cursos/<?= $curso['idCurso'] . '/' . $curso['imagem']; ?>">
                <p style="display: none;" class='sub-titulo-list'></p>
                <h2> <?= $curso['nomeCurso'] ?></h2>
                <p class='sub-titulo-list'><?= $curso['subtituloCurso'] ?> </p>
            </div>
        <?php endforeach; ?>
    </div>
</main>