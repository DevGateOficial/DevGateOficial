<nav class="mobile-nav">
    <div class="wrapper">
        <span class="material-symbols-sharp" id="menu-btn"> menu </span>
        <div class="logo-wrap">
            <div class="logo">
                <h2 id="menu-btn">DevGate</h2></span>
            </div>
        </div>
    </div>
</nav>

<aside>
    <div class="top">
        <a href="<?= URL; ?>home/">
            <div class="logo">
                <img src="<?= URLSRC; ?>assets/img/logo-devgate-bg-preto.png" alt="" />
                <h2>DevGate</h2>
            </div>
        </a>
        <div class="close" id="close-btn">
            <span class="material-symbols-sharp"> close </span>
        </div>
    </div>
    <div class="sidebar">
        <a href="<?= URLADM; ?>cadastro-curso/" id="cadastro_curso" onclick="toggleActive(this)">
            <span class="material-symbols-sharp"> menu_book </span>
            <h3>Criar Curso</h3>
        </a>
        <a href="<?= URLADM; ?>list-cursos/" onclick="toggleActive(this)">
            <span class="material-symbols-sharp"> format_list_bulleted </span>
            <h3>Listar Cursos</h3>
        </a>

        <!-- Seção ADM -->
        
        <?php if ($_SESSION['user_tipoUsuario'] == 'administrador') { ?>
            <a href="<?= URLADM; ?>list-usuarios/"onclick="toggleActive(this)">
                <span class="material-symbols-sharp "> group </span>
                <h3>Listar Usuários</h3>
            </a>
            <a href="<?= URLADM; ?>list-solicitacoes/" onclick="toggleActive(this)">
                <span class="material-symbols-sharp"> notifications_active</span>
                <h3>Solicitações</h3>
            </a>
            <a href="<?= URLADM; ?>edit-email-info/" onclick="toggleActive(this)">
                <span class="material-symbols-sharp"> email </span>
                <h3>Editar Email</h3>
            </a>
        <?php } ?>

        <a href="<?= URL; ?>logout/">
            <span class="material-symbols-sharp"> logout </span>
            <h3>Logout</h3>
        </a>

    </div>
</aside>

<div class="container-adm">