<main class="container-userList">

    <div class="titulo">
        <h1> Usuarios </h1>
        <p><?= count($this->data['listUsuarios']) ?> usuarios</p>
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
        <?php foreach ($this->data['listUsuarios'] as $usuario) : ?>
            <div class="line">
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

                <?php
                $situations = [
                    1 => "active",
                    2 => "inactive",
                    3 => "emailConf",
                    4 => "upgradeConf"
                ];
                ?>
                <div class="situacao">
                    <span class="<?= $situations[$usuario['adms_user_sits']] ?>"></span>
                    <p>
                        <?php
                        if ($usuario['adms_user_sits'] == 1)
                            echo 'Ativo';
                        else if ($usuario['adms_user_sits'] == 2)
                            echo 'Inativo';
                        else if ($usuario['adms_user_sits'] == 3)
                            echo 'Aguardando confirmação de email';
                        else if ($usuario['adms_user_sits'] == 4)
                            echo 'Aguardando upgrade';
                        ?>
                    </p>
                </div>


                <div class="visualizar">
                    <a href="<?= URLADM ?>delete-usuario/index/<?= $usuario['idUsuario'] ?>" class="btn">Deletar</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</main>