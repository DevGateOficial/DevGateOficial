<?php
if (isset($this->data['form'])) {
    $valueForm = $this->data['form'];
    var_dump($valueForm);
}
?>
<main class="main-list-curso">

    <h2> Cursos Disponiveis </h2>

    <!-- Search bar -->
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

        <?php foreach ($this->data['listCursos'] as $curso) : ?>
            <div class="curso" class="modal-button" data-id="<?= $curso['idCurso']; ?>">
                <img src="<?= URLSRC; ?>assets/data/cursos/<?= $curso['idCurso'] . '/' . $curso['imagem']; ?>">

                <p style="display: none;" class='sub-titulo-list'></p>
                <h2> <?= $curso['nomeCurso'] ?></h2>
                <p class='sub-titulo-list'><?= $curso['subtituloCurso'] ?> </p>
                <div class='obj-list'> <?= $curso['objetivos'] ?></div>
                <span class='visit-btn'><a> Visualizar </a></span>
            </div>
        <?php endforeach; ?>
    </div>

    <div id="modal" class="modal">
        <div class="modal-content ">
            <div class="modal-body">

                <span class="close-button">&times;</span>
                <!-- Colocar a img do curso -->
                <img src="<?= URLSRC; ?>assets/data/cursos/<?= $curso['idCurso'] . '/' . $curso['imagem']; ?>" id="img-curso">

                <div class="modal-txt">
                    <h2 id="modal-nomeCurso"> </h2>
                    <h3 id="modal-subtituloCurso"></h3>
                    <p id="modal-descricao"></p>
                    <p id="modal-objetivos"></p>
                    <p id="modal-requisitos"></p>
                </div>
                <div class="registrar">
                    <span class='visit-btn' onclick="registerCurso()"><a> Registrar-se no Curso </a></span>
                </div>
            </div>

        </div>
    </div>

</main>