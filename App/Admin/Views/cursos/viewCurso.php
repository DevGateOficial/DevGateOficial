<?php

if (isset($_SESSION['msg'])) {
    // echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

if (!empty($this->data['viewCurso'])) {
    extract($this->data['viewCurso'][0]);
}
?>
<div class="main-criar-aula">

    <div class="titulo">
        <h1>Criação de Aulas</h1>
        <p></p>
    </div>

    <div class="curso-shower">
        <img src="<?= URLSRC; ?>assets/data/cursos/<?= $idCurso . '/' . $imagem; ?>" alt="imagem do curso">

        <div class="txt-wrap">
            <p class="titulo-curso">
                <?= $nomeCurso ?>
            </p>

            <p class="subtitulo-curso">
                <?= $subtituloCurso ?>
            </p>

            <div class="btns-aula">


                <div class="btn-aula" title="Editar curso" onclick="editarCurso(<?= $idCurso ?>)">
                    <span class="material-symbols-sharp"> edit_document </span>
                    <p>
                        Editar
                    </p>
                </div>

                <div class="btn-aula btn-criar-aula btn-aula-p" title="Criar Aula">
                    <span class="material-symbols-sharp"> add_circle </span>
                    <p>Criar Aula</p>
                </div>

                <div class="btn-aula-excluir" title="Excluir curso">
                    <span class="material-symbols-sharp"> delete </span>
                </div>

            </div>
        </div>
    </div>

    <!-- MODAL DE COMFIRMAÇÂO -->
    <div id="modal-confirmacao" class="modal ">
        <div class="modal-content-conf">
            <div class="modal-body">

                <span class="close-btn2 close-btn">&times;</span>
                <h2 class="titulo-form">Deseja excluir este curso?</h2>

                <div class="btns-curso-conf">
                    <a href="<?= URLADM ?>delete-curso/index/<?= $idCurso ?> ">
                        <div class="btn-aula-excluir" title="Excluir curso">
                            <span class="material-symbols-sharp"> delete </span>
                            <p>Sim</p>
                        </div>
                    </a>

                    <div class="undo-conf close-btn2 " title="Voltar">
                        <span class="material-symbols-sharp"> undo </span>
                        <p>Não</p>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- MODAL DE CRIAÇÂO DE AULA -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="modal-body">

                <span class="close-btn1 close-btn">&times;</span>
                <h2 class="titulo-form">Aula</h2>

                <!-- Formulário de cadastro -->
                <form method="POST" action="<?= URLADM ?>cadastro-aula/index/<?= $idCurso ?>">
                    <div class="inputBox" for="name">
                        <p class="txt-title">Nome da Aula</p>
                        <input type="text" placeholder="" name="nomeAula" id="name" value="" required="required" />
                        <i></i>
                    </div>
                    <div class="text-editor">
                        <p class="txt-title">Descrição</p>
                        <p class="descricao">
                            Descrição de como sera desenvolvida as atividades. Assim
                            como sobre a dinamica das mesmas
                        <p>
                            <br>
                            <?php
                            $descricao = "";
                            if (isset($valueForm['descricao'])) {
                                $descricao = $valueForm['descricao'];
                            }
                            ?>
                            <textarea placeholder="Descrição" name="descricao" id="editor" value="" required="required" maxlength="512"></textarea>
                            <br>

                            <input type="hidden" name="idCurso" value="<?= $idCurso ?>">
                    </div>

                    <input type="submit" class="submit-btn" name="CadastrarAula" value="Criar Aula"></input>
                </form>

            </div>
        </div>
    </div>

    <!-- Listagem de aulas do curso -->
    <?php if (isset($this->data['listAulas'])) { ?>
        <div class="aulas-wrapper">
            <?php foreach ($this->data['listAulas'] as $aula) : ?>


                <div class="aula" onclick="viewAula( <?= $aula['idAula'] ?>)">
                    <p class="titulo-curso">
                        <?= $aula['nomeAula']; ?>
                    </p>
                    <p class="subtitulo-curso">
                        <?= $aula['descricao']; ?>
                    </p>

                    <div class="btn-atv">
                        <a title="Excluir aula" href="<?= URLADM ?>delete-aula/index/<?= $aula['idAula'] ?>">
                            <span class="material-symbols-sharp"> delete </span>
                        </a>

                    </div>


                </div>
            <?php endforeach; ?>
        </div>
    <?php } ?>

</div>
</div>


</div>