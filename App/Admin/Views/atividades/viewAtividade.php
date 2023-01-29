<?php
if (isset($this->data['viewAtividade'])) {
    $atividadeInfo = $this->data['viewAtividade'][0];
}
?>

<div class="main-criar-aula">
    <div class="titulo">
        <h1>Visualização da Atividade</h1>
        <p></p>
    </div>

    <div class="curso-shower">
        <div class="txt-wrap">
            <p class="titulo-curso"><?= $atividadeInfo['nomeAtividade'] ?></p>
            <p class="subtitulo-curso"><?= $atividadeInfo['descricao'] ?>
            <p>
            <div class="btns-aula">
                <div class="btn-aula" title="Editar curso" id="edit-ativ">
                    <span class="material-symbols-sharp"> edit_document </span>
                    <p>
                        Editar
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?php if ($atividadeInfo['tipoAtividade'] == 'videoAula') { ?>

        <blockquote class="embedly-card">
            <h4>
                <a href="<?= $atividadeInfo['url'] ?>"></a>
            </h4>
        </blockquote>

    <?php } else { ?>

        <object data="<?= URL_atividade . '/' . $atividadeInfo['idAtividade'] . '/' . $atividadeInfo['url'] ?>" type="application/pdf" width="800px" height="600px"></object>

    <?php } ?>

    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <div id="modal-editAtiv" class="modal">
        <div class="modal-content">
            <div class="modal-body">
                <span class="close-btn" id="close-editAtiv">&times;</span>
                <h2 class="titulo-form">Criação de Atividade</h2>
                <div class="cadastro-curso">

                    <div class="gn-form">

                        <!-- Formulário de edição de atividades -->
                        <form action="<?= URLADM ?>edit-atividade/index/<?= $atividadeInfo['idAtividade'] ?>" method="POST" enctype="multipart/form-data">
                            <div class="inputBox">
                                <p class="txt-title">Nome da Atividade</p>

                                <input type="text" placeholder="Nome da atividade" name="nomeAtividade" id="name" value="<?= $atividadeInfo['nomeAtividade'] ?>" required="required" />

                                <i></i>
                            </div>

                            <div class="inputBox">
                                <p class="txt-title">Descrição</p>
                                <p class="descricao">Descrição sobre o conteudo</p>

                                <input type="descricao" placeholder="Descrição" name="descricao" id="descricao" value="<?= $atividadeInfo['descricao'] ?>" required="required" />

                                <i></i>
                            </div>

                            <label class="select-box" for="tipoAtividade">
                                <p class="txt-title">Tipo de Atividade</p>
                                <p class="descricao">Selecione qual tipo de atividade deseja criar</p>

                                <select name="tipoAtividade" id="tipoAtividade">
                                    <option class="firs-opt" disabled selected value>
                                        <p> Selecione o tipo da atividade </p>
                                        <p>▼</p>
                                    </option>

                                    <option value="videoAula" <?= $atividadeInfo['tipoAtividade'] == 'videoAula' ? 'selected' : '' ?>>Vídeo </option>
                                    <option value="materialApoio" <?= $atividadeInfo['tipoAtividade'] == 'materialApoio' ? 'selected' : '' ?>>Material de apoio / texto </option>
                                    <option value="projeto" <?= $atividadeInfo['tipoAtividade'] == 'projeto' ? 'selected' : '' ?>>Proposta de projeto</option>
                                </select>
                                <i></i>
                            </label>

                            <div class="inputBox" id="inputBox" style="display: none;">
                                <p class="descricao"></p>
                                <input type="text" id="campo-input" name="url" class="url_atividade" value="<?= $atividadeInfo['url'] ?>" />
                                <i></i>
                            </div>
                            <p id="msg-url"></p>
                            <p id="file-label-atividade" style="color: #41f1b6;"> </p>

                            <input type="hidden" id="idAtividade" name="idAtividade" value="<?= $atividadeInfo['idAtividade'] ?>" />
                            <input type="hidden" name="idAula" value="<?= $atividadeInfo['idAula'] ?>" />

                            <input class="submit-btn" type="submit" name="EditAtividade" value="Editar Atividade" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>