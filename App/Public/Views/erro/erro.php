<?php
// Redirecionar ou para o processamento quando o usuário não acessa o arquivo index.php
if (!defined('D3V3G4T3')) {
  //header("Location: /");
  die("Erro: Página não encontrada!");
}

?>
<div class="container">
  <!-- Todo conteudo que for criar coloca dentro da dessa div criar-curso, o grid vai deixar arrumado automaticamente -->
  <div class="erro-wrap">
    <img src="<?= URLSRC ?>\assets\img\site-imgs\error-img.png" alt="" />
    <p>Clique na mensagem para copiar</p>
    <p id="text-to-copy" class="error-msn">
      <?= $this->data ?>
    </p>
    <div class="btns-wrap">
      <a href="<?= URL ?>home/">
        <p>Home</p>
      </a>
      <a href="<?= URL ?>logout/">
        <p>logout</p>
      </a>
    </div>
  </div>
</div>