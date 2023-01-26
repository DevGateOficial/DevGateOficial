<style>
    /* Table */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    /* Table header */
    th {
        background-color: #f2f2f2;
        font-weight: bold;
        text-align: left;
        padding: 8px;
    }

    /* Table cell */
    td {
        border: 1px solid #ccc;
        padding: 8px;
    }

    /* Emphasized text */
    .emphasized {
        font-weight: bold;
    }

    /* View button */
    .view-button {
        text-align: right;
    }

    /* Custom button */
    .custom-button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
</style>

<table>
    <tr>
        <th>ID</th>
        <th>Nome do Curso</th>
        <th>Objetivos</th>
        <th>Descrição</th>
        <th>Ação</th>
    </tr>
    <?php
    foreach ($this->data['listCursos'] as $curso) {
        extract($curso);
        echo "<tr>";
        echo "<td>$idCurso</td>";
        echo "<td class='emphasized'>$nomeCurso</td>";
        echo "<td>$objetivos</td>";
        echo "<td>$descricao</td>";
        echo "<td class='view-button'><a class='custom-button' href='" . URLADM . "view-curso/index/$idCurso'>Visualizar</a></td>";
        echo "</tr>";
    }
    ?>
</table>
