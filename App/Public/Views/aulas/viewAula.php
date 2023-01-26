<?php

echo "<h2>" . $this->data['viewAula'][0]['nomeAula'] . "</h2> ";

if(!empty($this->data['viewAula'])){
    echo "<a href='" . URL . "list-atividades/index/" . $this->data['viewAula'][0]['idAula'] . "'> Ver atividades </a><br><br>";
}

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

echo "<hr>";

if(!empty($this->data['viewAula'])){
    extract($this->data['viewAula'][0]);

    echo "ID: $idAula <br>";
    echo "Nome da aula: $nomeAula <br>";
    echo "Descrição: $descricao <br>";
    echo "iD do curso: $idCurso <br>";
}
