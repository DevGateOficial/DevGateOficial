<?php

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

foreach ($this->data['listAulas'] as $aulas){
    echo "<hr>";
    extract($aulas);
    echo "ID: $idAula <br>";
    echo "Nome do curso: $nomeAula <br>";
    echo "Descrição: $descricao <br>";
    echo "Descrição: $idCurso <br>";

    // Check if the current class has been watched
    if (in_array($idAula, $this->data['aulasAssistidas'])) {
        echo "<input type='checkbox' class='checkbox-visualizada' data-id-aula='$idAula' checked> Visualizada";
    } else {
        echo "<input type='checkbox' class='checkbox-visualizada' data-id-aula='$idAula'> Visualizada";
    }

    echo "<a href='" . URL . "view-aula/index/$idAula'> Visualizar </a><br>";
}
?>
