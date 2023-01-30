<?php
if (isset($this->data['form'])) {
    $valueForm = $this->data['form'][0];
}

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

<main class="main-cadastro-curso ">

    <div class="titulo">
        <h1> Edição de Curso </h1>
        <!-- <p>Edição de cursos</p> -->
    </div>

    <div class="cadastro-curso">
        <form method="POST" action="" autocomplete="off" enctype="multipart/form-data">
            <?php
            $idCurso = "";
            if (isset($valueForm['idCurso'])) {
                $idCurso = $valueForm['idCurso'];
            }
            ?>
            <input type="hidden" placeholder="" name="idCurso" id="name" value="<?= $idCurso ?>" required="required">

            <?php
            $nomeCurso = "";
            if (isset($valueForm['nomeCurso'])) {
                $nomeCurso = $valueForm['nomeCurso'];
            }
            ?>
            <div class="inputBox" for="name">
                <input type="text" placeholder="" name="nomeCurso" id="name" value="<?= $nomeCurso ?>" required="required">
                <span> Nome do Curso</span>
                <i></i>
            </div>

            <?php
            $subtituloCurso = "";
            if (isset($valueForm['subtituloCurso'])) {
                $subtituloCurso = $valueForm['subtituloCurso'];
            }
            ?>
            <div class="inputBox" for="name">
                <input type="text" placeholder="" name="subtituloCurso" id="sub-name" value="<?php echo $subtituloCurso ?>" required="required">
                <span> Subtitulo do Curso</span>
                <i></i>
            </div>

            <div class="text-editor">
                <p class="txt-title">Descrição</p>
                <p class='descricao'> Descrição de como e sobre o que o curso trata. Assim como sobre a dinamica das aulas ministradas </p>
                <br>
                <?php
                $descricao = "";
                if (isset($valueForm['descricao'])) {
                    $descricao = $valueForm['descricao'];
                }
                ?>
                <textarea placeholder="Descrição" name="descricao" id="editor" required="required" maxlength="512">
                    <?= $descricao ?>
                </textarea>
                <br>
            </div>

            <div class="text-editor">
                <p class="txt-title">
                    Objetivos
                </p>
                <p class='descricao'>Objetivos que devem ser alcançados ao longo do curso </p>
                <br>
                <?php
                $objetivos = "";
                if (isset($valueForm['objetivos'])) {
                    $objetivos = $valueForm['objetivos'];
                }
                ?>
                <textarea placeholder="Objetivos" name="objetivos" id="editor2" required="required">
                    <?= $objetivos ?>
                </textarea>
                <br>
            </div>

            <div class="text-editor">
                <p class="txt-title">
                    Requisitos
                </p>
                <p class='descricao'>Requisitos que o aluno precisa ter antes de começar o curso </p>
                <br>
                <?php
                $requisitos = "";
                if (isset($valueForm['requisitos'])) {
                    $requisitos = $valueForm['requisitos'];
                }
                ?>
                <textarea placeholder="Requisitos Básicos" name="requisitos" id="editor3" required="required">
                    <?= $requisitos ?>
                </textarea>
                <br>
            </div>

            <!-- Antigo -->
            <!-- <div class="input-file">
                <input type="file" name="imagem" id="imagem" required="required">
                <label for="file_id">Choose a file</label>
            </div> -->

            <!--Novo -->
            <label for="file-input">
                <p class="txt-title">
                    Imagem
                </p>
                <p class='descricao'>Imagem de perfil do curso </p>
                <br>
                <div id="file-drop-area">
                    <h2> Clique para selecionar o arquivo</h2>
                    <input type="file" name="imagem" id="file-input" required="required" accept="image/*" multiple>

                    <div class="file-info">
                        <span class="material-symbols-outlined" id="file-icon" style="display: none;">photo</span>
                        <p id="file-label" style="color: #41f1b6;"></p>
                    </div>

                </div>
            </label>
            <br>

            <input type="hidden" name="idResponsavel" value="<?= $_SESSION['user_idUsuario'] ?>">

            <!-- submit button -->
            <div class="visualizar">
                <!-- Adicionei o "submit-" antes do btn -->
                <input class="submit-btn" type="submit" value="Editar Curso" name="EditCurso">

                <!-- exemplo -->
                <!-- <input class="submit-btn" type="submit" value="Registrar Curso" name="Cadastrar"> -->
            </div>

        </form>

    </div>

</main>