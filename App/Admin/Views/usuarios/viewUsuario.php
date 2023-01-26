<?php
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

<div class="criar-curso">
    <main>
        <h2> Detalhes do usuário </h2>
        <table class="sideways-table .table-holder ">
            <tr>
                <th>Nome Usuario</th>
                <?php
                if (!empty($this->data['viewUser'])) {
                    extract($this->data['viewUser'][0]);
                    echo "<td  class='td-sideways'>$nomeUsuario </td>";
                }
                ?>
            </tr>
            <tr>
                <th>Nome Completo</th>
                <?php
                if (!empty($this->data['viewUser'])) {
                    extract($this->data['viewUser'][0]);
                    echo "<td  class='td-sideways'>$nomeCompleto </td>";
                }
                ?>
            </tr>
            <tr>
                <th>E-mail</th>
                <?php
                if (!empty($this->data['viewUser'])) {
                    extract($this->data['viewUser'][0]);
                    echo "<td  class='td-sideways'>$email </td>";
                }
                ?>
            </tr>
            <tr>
                <th>Data de Nascimento</th>
                <?php
                if (!empty($this->data['viewUser'])) {
                    extract($this->data['viewUser'][0]);
                    echo "<td  class='td-sideways'>$dtNascimento </td>";
                }
                ?>
            </tr>
            <tr>
                <th>CPF</th>
                <?php
                if (!empty($this->data['viewUser'])) {
                    extract($this->data['viewUser'][0]);
                    echo "<td  class='td-sideways'>$cpf </td>";
                }
                ?>
            </tr>
            <tr>
                <th>Telefone</th>
                <?php
                if (!empty($this->data['viewUser'])) {
                    extract($this->data['viewUser'][0]);
                    echo "<td  class='td-sideways'>$telefone </td>";
                }
                ?>
            </tr>
            <tr>
                <th>ID</th>
                <?php
                if (!empty($this->data['viewUser'])) {
                    extract($this->data['viewUser'][0]);
                    echo "<td  class='td-sideways'>$idUsuario </td>";
                }
                ?>
            </tr>
            <tr>
                <th>Opções</th>
                <td class='td-sideways options'>
                    <?php
                    if (!empty($this->data['viewUser'])) {
                        extract($this->data['viewUser'][0]);

                        echo " <a href='" . URLADM . "list-users/index'> Listar |  </a>";
                        if (!empty($this->data['viewUser'])) {
                            echo "<a href='" . URLADM . "edit-users/index/" . $this->data['viewUser'][0]['idUsuario'] . "'> Editar | </a>";
                            echo "<a href='" . URLADM . "delete-usuario/index/" . $this->data['viewUser'][0]['idUsuario'] . "'> Deletar </a>";
                        }
                        echo "</td>";
                    }
                    ?>
            </tr>
        </table>
        <table>

            <!-- TABLE endereço WITH CSS -->
            <?php
            if (!empty($this->data['viewUser'])) {
                extract($this->data['viewUser'][0]);
                if (isset($idEndereco)) {
                    echo "<tr>";
                    echo "<th>ID Endereço</th>";
                    echo "<td  class='td-sideways'>$idEndereco </td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>CEP</th>";
                    echo "<td  class='td-sideways'>$cep </td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>Pais</th>";
                    echo "<td  class='td-sideways'>$pais </td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>Estado</th>";
                    echo "<td  class='td-sideways'>$estado </td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>Cidade</th>";
                    echo "<td  class='td-sideways'>$cidade </td>";
                    echo "</tr>";
                }
            }
            ?>


            <?php
            if (!empty($this->data['viewUser'])) {
                echo "ID: $idUsuario <br>";
                echo "Nome usuário: $nomeUsuario <br>";
                echo "Nome completo: $nomeCompleto <br>";
                echo "Email: $email <br>";
                echo "Data de nascimento: $dtNascimento <br>";
                echo "CPF: $cpf <br>";
                echo "Telefone: $telefone <br> <br>";
                if (isset($idEndereco)) {
                    echo "<hr>";

                    echo "Endereço do usuário <br><br>";
                    echo "ID: $idEndereco <br>";
                    echo "CEP: $cep <br>";
                    echo "País: $pais <br>";
                    echo "Estado: $estado <br>";
                    echo "Cidade: $cidade <br>";
                }

                echo "<a href='" . URLADM . "list-users/index'> Listar </a><br>";
                if (!empty($this->data['viewUser'])) {
                    echo "<a href='" . URLADM . "edit-users/index/" . $this->data['viewUser'][0]['idUsuario'] . "'> Editar </a><br>";
                    echo "<a href='" . URLADM . "delete-usuario/index/" . $this->data['viewUser'][0]['idUsuario'] . "'> Deletar </a><br><br>";
                }
            }
            ?>
        </table>

    </main>

</div>
</div>