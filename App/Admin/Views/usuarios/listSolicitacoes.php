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

            <div class="line">
                <div class="user">
                    <div class="profile">
                        <img src="<?= URLSRC; ?>assets/img/profileImgs/profileImg.png" alt="" />
                    </div>

                    <div class="detalhes">
                        <h2 class="nome"><?= $usuario['nomeCompleto'] ?></h2>
                        <h3 class="username"><?= $usuario['nomeUsuario'] ?></h3>
                    </div>
                </div>

                <div class="email">
                    <p><?= $usuario['email'] ?></p>
                </div>

                <div class="situacao">
                    <span></span>
                    <p><?php if ($usuario['adms_user_sits']) echo 'Aguardando upgrade' ?></p>
                </div>

                <div class="visualizar" onclick='viewSolicitacao(<?= json_encode($usuario); ?>)'>
                    <span class="btn">Visualizar</span>
                </div>

                <div class="visualizar">
                    <a href="<?= URLADM ?>upgrade-usuario/index/<?= $usuario['idUsuario'] ?>">
                        <span class="material-symbols-outlined">done</span>
                    </a>
                </div>

                <div class="visualizar">
                    <a href="<?= URLADM ?>upgrade-usuario/recusar/<?= $usuario['idUsuario'] ?>">
                        <span class="material-symbols-outlined">close</span>
                    </a>
                </div>


            </div>
        <?php endforeach; ?>

    </div>

    <div class="modal" id="modal-solicitacoes" style="display: none;">
        <div class="modal-content">
            <div class="modal-body">

                <span class="close-btn" onclick="closeSolicitacao()">&times;</span>

                <div class="text-editor">
                    <p class="txt-title"> Solicitação de upgrade </p>

                    <br>

                    <p> Informações do usuário </p>
                    <p id="nomeCompleto"></p>
                    <p id="nomeUsuario"></p>

                    <p> Campos adicionados </p>
                    <br>
                    <p id="cpf"></p>
                    <p id="telefone"></p>

                    <br>

                    <p id="nomeLogradouro"></p>
                    <p id="numero"></p>
                    <p id="bairro"></p>
                    <p id="cep"></p>
                    <p id="cidade"></p>
                    <p id="pais"></p>
                </div>
            </div>
        </div>
    </div>

</main>