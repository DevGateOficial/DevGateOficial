<?php

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

echo "<a href='" . URLADM . "cadastro-aula/index/" . $this->data['viewCurso'] . "'> Cadastrar nova Aula </a><br><br>";

// VER COMO VAI FICAR ESSA EXIBIÇÃO DOS CURSOS

foreach ($this->data['listAulas'] as $aulas) :
    
    echo "<hr>";
    extract($aulas);
    echo "ID: $idAula <br>";
    echo "Nome do curso: $nomeAula <br>";
    echo "Descrição: $descricao <br>";
    echo "Descrição: $idCurso <br>";
    
    echo "<a href='" . URLADM . "view-aula/index/$idAula'> Visualizar </a><br>";
    // echo "<a href='" . URLADM . "edit-cursos/index/$idCurso'> Editar </a><br><br>";
?>


<?php endforeach; ?>