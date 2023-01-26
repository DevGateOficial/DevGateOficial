<?php

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

foreach ($this->data['listAtividades'] as $atividades){
    echo "<hr>";
    extract($atividades);

    echo "ID: $idAtividade <br>";
    echo "Nome da atividade: $nomeAtividade <br>";
    echo "Descrição: $descricao <br>";
    echo "Url: $url <br>";
    echo "Id da aula: $idAula <br>";

    echo "<a href='" . URL . "view-atividade/index/$idAtividade'> Visualizar </a><br>";

}


?>


