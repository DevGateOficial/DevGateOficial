<header>
    <nav>
        <div class="logo-container">
            <img class="img-logo" src="<?= URLSRC ?>assets/img/logo-devgate-branca-sem-fundo.png" alt="">
            <h2 class="logo"><a href="<?= URL ?>home">DevGate</a></h2>
        </div>
        <input type="checkbox" id="check" />
        <label for="check" class="hamburger-btn">
            <i class="fas fa-bars"></i>
        </label>

        <ul class="nav-list mobile">
            <li><a href="<?= URL ?>list-cursos">Novos Cursos</a></li>
            <li><a href="<?= URL ?>meus-cursos">Meus Cursos</a></li>
            <?php
            if ($_SESSION['user_tipoUsuario'] == "aluno" && $_SESSION['user_adms_user_sits'] != 4) {
                echo "<li><a class='a-center' href=" . URL . "upgrade-usuario class='side-menu--btn'><span class='material-symbols-sharp' id='menu-btn'> add_circle </span>Parceria</a></li>";
            } else if ($_SESSION['user_tipoUsuario'] == "administrador") {
                echo "<li><a class='a-center' href=" . URL . "acesso-adm class='side-menu--btn'><span class='material-symbols-sharp' id='menu-btn'> settings</span>Área Administrativa</a></li>";
            }
            ?>
            <li class="login-mobile">
                <a href="<?= URL ?>logout/index">
                    <img src="<?= URLSRC ?>assets/img/user 1.svg" alt="Delineado de uma pessoa" />
                    Logout
                </a>
            </li>
        </ul>

        <ul class="desktop-list">
            <li><a href="<?= URL ?>list-cursos">Novos Cursos</a></li>
            <li><a href="<?= URL ?>meus-cursos">Meus Cursos</a></li>
        </ul>

        <div class="login-btn">
            <a id="login-button">
                <img src="<?= URLSRC ?>assets/img/user 1.svg" alt="Delineado de uma pessoa" />
            </a>
        </div>
    </nav>
    <div id="side-menu" class="side-menu ">
        <div class="side-menu-content">
            <span href="#" class="close-side-menu">&times;</span>
            <div class="img-wrap">
                <img src="<?= URLSRC ?>assets/data/usuarios/<?= $_SESSION['user_imagem'] ?>" alt="Imagem de Perfil Usuário">
            </div>
            <h3 class="user-name"><?= $_SESSION['user_nomeUsuario'] ?></h3>
            <p class="email"><?= $_SESSION['user_email'] ?></p>
            <div class="btn-options">

                <?php
                if ($_SESSION['user_tipoUsuario'] == "aluno" && $_SESSION['user_adms_user_sits'] != 4) {
                    echo "<a href=" . URL . "upgrade-usuario class='side-menu--btn'><span class='material-symbols-sharp' id='menu-btn'> add_circle </span>Parceria</a>";
                } else if ($_SESSION['user_tipoUsuario'] == "administrador" or $_SESSION['user_tipoUsuario'] == "professor") {
                    echo "<a href=" . URL . "acesso-adm class='side-menu--btn'><span class='material-symbols-sharp' id='menu-btn'> settings</span>Área Administrativa</a>";
                }
                ?>

                </li>


            </div>
        </div>
        <a href="<?= URL ?>logout" class="outside-menu--btn">
            <span class="material-symbols-sharp " id="menu-btn"> logout </span>
            Logout</a>
    </div>


</header>