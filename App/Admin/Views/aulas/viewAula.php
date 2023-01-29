<?php
if (isset($this->data['viewAula'])) {
    $aulaInfo = $this->data['viewAula'][0];
}
?>

<div class="main-criar-aula">
    <div class="titulo">
        <h1>Visualização Aula</h1>
        <p></p>
    </div>

    <div class="curso-shower">
        <div class="txt-wrap">
            <p class="titulo-curso"><?= $aulaInfo['nomeAula'] ?></p>
            <p class="subtitulo-curso"><?= $aulaInfo['descricao'] ?>
            <p>
            <div class="btns-aula">
                <div class="btn-aula btn-criar-aula btn-aula-p" title="Criar Atividades">
                    <span class="material-symbols-sharp"> add_circle </span>
                    <p class="btn-criar-aula btn-aula-p">Criar Atividades</p>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($this->data['listAtividades'])) { ?>

        <div class="aulas-wrapper">
            <?php foreach ($this->data['listAtividades'] as $atividade) : ?>
                <div class="aula" onclick="viewAtividade(<?= $atividade['idAtividade'] ?>)">
                    <p class="titulo-curso">
                        <?= $atividade['nomeAtividade']; ?>
                    </p>
                    <p class="subtitulo-curso">
                        <?= $atividade['descricao']; ?>
                    </p>

                    <div class="btn-atv">
                        <a title="Excluir atividade" href="<?= URLADM ?>delete-atividade/index/<?= $atividade['idAtividade'] ?>">
                            <span class="material-symbols-sharp"> delete </span>
                        </a>

                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    <?php }

    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    } ?>

    <!-- MODAL DE CRIAÇÂO DE ATIVIDADE -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="modal-body">
                <span class="close-btn">&times;</span>
                <h2 class="titulo-form">Criação de Atividade</h2>
                <div class="cadastro-curso">

                    <div class="gn-form">

                        <!-- Formulário de criação de atividades -->
                        <form action="<?= URLADM ?>cadastro-atividade/index/<?= $aulaInfo['idAula'] ?>" method="POST" enctype="multipart/form-data">
                            <?php
                            $nomeAtividade = "";
                            if (isset($valueForm['nomeAtividade'])) {
                                $nomeAtividade = $valueForm['nomeAtividade'];
                            }
                            ?>
                            <div class="inputBox">
                                <p class="txt-title">Nome da Atividade</p>

                                <input type="text" placeholder="Nome da atividade" name="nomeAtividade" id="name" value="<?php echo $nomeAtividade ?>" required="required" />

                                <i></i>
                            </div>

                            <?php
                            $descricao = "";
                            if (isset($valueForm['descricao'])) {
                                $descricao = $valueForm['descricao'];
                            }
                            ?>
                            <div class="inputBox">
                                <p class="txt-title">Descrição</p>
                                <p class="descricao">Descrição sobre o conteudo</p>

                                <input type="descricao" placeholder="Descrição" name="descricao" id="descricao" value="<?php echo $descricao ?>" required="required" />

                                <i></i>
                            </div>

                            <?php
                            $tipoAtividade = "";
                            if (isset($valueForm['tipoAtividade'])) {
                                $tipoAtividade = $valueForm['tipoAtividade'];
                            }
                            ?>

                            <label class="select-box" for="tipoAtividade">
                                <p class="txt-title">Tipo de Atividade</p>
                                <p class="descricao">Selecione qual tipo de atividade deseja criar</p>

                                <select name="tipoAtividade" id="tipoAtividade">
                                    <option class="firs-opt" disabled selected value>
                                        <p>
                                            Selecione o tipo da atividade
                                        </p>
                                        <p>▼</p>
                                    </option>

                                    <option value="videoAula">Vídeo </option>
                                    <option value="materialApoio">
                                        Material de apoio / texto
                                    </option>
                                    <option value="projeto">Proposta de projeto</option>
                                </select>
                                <i></i>
                            </label>

                            <?php
                            $url = "";
                            if (isset($valueForm['url'])) {
                                $url = $valueForm['url'];
                            }
                            ?>

                            <div class="inputBox" id="input-1" style="display: none;">
                                <p class="descricao"></p>
                                <input type="text" id="campo-input" name="url" class="url_atividade" value="<?php echo $url ?>" />
                                <i></i>
                            </div>
                            <p id="msg-url"></p>

                            <?php
                            $idAula = "";
                            if (isset($aulaInfo['idAula'])) {
                                $idAula = $aulaInfo['idAula'];
                            }
                            ?>
                            <input type="hidden" name="idAula" value="<?php echo $idAula ?>" />

                            <input class="submit-btn" type="submit" name="CadastrarAtividade" value="Cadastro Atividade" />
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="aulas-wrapper">
            <div class="aula">
              <p class="titulo-curso">
                01 Titulo Aulaadssadsadsa d dasdasd asd
              </p>
              <p class="subtitulo-curso">Desc Aula</p>
              <p class="num-atv">Numero de Atividades:</p>
            </div>
          </div> -->
    </div>

</div>
</div>