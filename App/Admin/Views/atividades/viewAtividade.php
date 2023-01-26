<h1> View Atividade </h1>

<?php
extract($this->data['viewAtividade'][0]);
// $file = URLSRC . 'assets/data/atividades/' . $idAtividade . '/' . $url;
$link_pdf = URL_atividade . $idAtividade . '/' . $url;
?>

<a href="<?= URLADM ?>view-aula/index/<?= $idAula ?>">Voltar</a>
<?php if ($tipoAtividade == 'videoAula') { ?>

    <blockquote class="embedly-card">
        <h4>
            <a href="<?= $url; ?>"></a>
        </h4>
    </blockquote>
    <script async src="//cdn.embedly.com/widgets/platform.js" charset="UTF-8"></script>

<?php } else { ?>

    <embed src="<?= $link_pdf ?>" type="application/pdf" frameBorder="0" scrolling="auto" height="80%" width="80%"></embed>

<?php } ?>