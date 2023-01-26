<?php

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

echo "<h2> Detalhes da atividade " . $this->data['viewAtividade'][0]['nomeAtividade'] .  " </h2> ";

if(!empty($this->data['viewAtividade'])){

    echo "<a href='" . URLADM . "delete-atividade/index/" . $this->data['viewAtividade'][0]['idAtividade'] . "'> Deletar </a><br><br>";
}

echo "<hr>";

if (!empty($this->data['viewAtividade'])) {
    extract($this->data['viewAtividade'][0]);

    echo "ID: $idAtividade <br>";
    echo "Nome da aula: $nomeAtividade <br>";
    echo "Descrição: $descricao <br>";
    echo "Atividade: $url <br>";
    echo "iD do curso: $idAula <br> <br>";
}

if ($tipoAtividade == 'videoAula') {

?>
    <iframe width="560" height="315" src="<?= $url ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-white;
    encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<?php
}