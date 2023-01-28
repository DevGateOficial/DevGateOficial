<main class="container-userList">

    <div class="titulo">
        <h1> Solicitações de Upgrade de usuario </h1>
        <p>
            <?php
            if (count($this->data['listSolicitacoes']) > 0) {
                echo count($this->data['listSolicitacoes']) . " solicitacões";
            }
            ?>
        </p>
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

    <div class="list">
        <?php foreach ($this->data['listSolicitacoes'] as $usuario) : ?>

            <div class="line solicitacao-line">
                <div class="user">
                    <div class="profile">
                        <img src="<?= URLSRC; ?>assets/data/usuarios/<?= $usuario['imagem'] ?>" alt="" />
                    </div>

                    <div class="detalhes">
                        <h2 class="nome"><?= $usuario['nomeCompleto'] ?></h2>
                        <h3 class="username"><?= $usuario['nomeUsuario'] ?></h3>
                    </div>
                </div>

                <div class="email">
                    <p><?= $usuario['email'] ?></p>
                </div>

                <div class="situacao situacao-solicitacao">
                    <span></span>
                    <p><?php if ($usuario['adms_user_sits']) echo 'Aguardando upgrade' ?></p>
                </div>

                <div class="visualizar" onclick='viewSolicitacao(<?= json_encode($usuario); ?>)'>
                    <span class="btn">Visualizar</span>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

    <div class="modal" id="modal-solicitacoes" style="display: none;">
        <div class="modal-content solicitacao-modal">
            <div class="modal-body ">

                <span class="close-btn" onclick="closeSolicitacao()">&times;</span>

                <div class="user-info-wrap">
                    <p class="txt-title"> Solicitação de upgrade </p>

                    <br>

                    <p class="info-title"> Informações do usuário </p>
                    <p id="nomeCompleto"></p>
                    <p id="nomeUsuario"></p>
                    <p id="email"></p>

                    <br>
                    <p class="info-sub-title"> Cpf </p>
                    <p id="cpf"></p>
                    <br>
                    <p class="info-sub-title"> Telefone </p>
                    <p id="telefone"></p>

                    <br>

                    <p class="info-sub-title"> Endereco </p>
                    <p id="bairro"></p>
                    <p id="nomeLogradouro"> </p>
                    <p id="numero"></p>
                    <p id="cep"></p>
                    <p id="cidade"></p>
                    <p id="pais"></p>
                </div>
                <div class="btns-curso-conf">

                    <a title="Confirmar upgrade" href="<?= URLADM ?>upgrade-usuario/index/<?= $usuario['idUsuario'] ?>">
                        <div class="undo-conf">
                            <span class="material-symbols-outlined">done</span>
                        </div>
                    </a>
                    <a title="Negar upgrade" href="<?= URLADM ?>upgrade-usuario/recusar/<?= $usuario['idUsuario'] ?>">
                        <div class="btn-aula-excluir">
                            <span class="material-symbols-outlined">close</span>
                        </div>
                    </a>
                </div>


            </div>
        </div>
    </div>

</main>