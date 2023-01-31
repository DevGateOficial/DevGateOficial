<main class="container-serverList">
    <div class="titulo">
        <h1> Servidores de E-mail </h1>
    </div>
    <div class="list-email">
        <?php
        $servers = $this->data['form'];
        foreach ($servers as $server) :
        ?>
            <div class="line-email">
                <div class="server-email">
                    <div class="detail-email">
                        <h2 class="title"><?= $server['title'] ?></h2>
                        <h3 class="name"><?= $server['name'] ?></h3>
                        <h3 class="email"><?= $server['email'] ?></h3>
                        <h3 class="host"><?= $server['host'] ?></h3>
                        <h3 class="username"><?= $server['username'] ?></h3>
                        <h3 class="password"><?= $server['password'] ?></h3>
                        <h3 class="smtpsecure"><?= $server['smtpsecure'] ?></h3>
                        <h3 class="port"><?= $server['port'] ?></h3>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    </div>

    <div class="line-email" data-server-id="<?= $server['idEmail'] ?>">
        <div id="edit-server-modal" class="modal">
            <div class="modal-content">
                <form>
                    <label for="title">Título:</label>
                    <input type="text" id="title" name="title">

                    <label for="name">Nome:</label>
                    <input type="text" id="name" name="name">

                    <label for="name">Email:</label>
                    <input type="text" id="email" name="email">

                    <label for="name">Host:</label>
                    <input type="text" id="host" name="host">

                    <label for="name">Username:</label>
                    <input type="text" id="username" name="username">

                    <label for="name">Password:</label>
                    <input type="text" id="password" name="password">

                    <label for="name">Smtpsecure:</label>
                    <input type="text" id="smtpsecure" name="smtpsecure">

                    <label for="name">Port:</label>
                    <input type="text" id="port" name="port">

                    <input type="submit" value="Salvar">
                </form>
            </div>
        </div>
    </div>
</main>