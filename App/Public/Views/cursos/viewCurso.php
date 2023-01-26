<?php
$aulas = $this->data['listAulas'];

if (isset($this->data['aulasAssistidas']))
  $aulas_assistidas = $this->data['aulasAssistidas'];

$numeroAula = 1;
?>

<main class="main-view-aula">
  <section class="content">
    <!-- MUDA SO O CONTEUDO Q TA DENTRO DO VIDEO-WRAP e o css -->
    <div class="video-wrap">
      <!-- variavel php -> src -->


      <!-- clica na aula -> funcao js que instancia o viewAula e o getAtividades da aula clicada -->

      <div class="text-content">
        <h3 class="titulo-aula">Titulo da aula</h3>
        <p class="desc-aula">
          Descricao da aula
        </p>

        <!-- Container que receberá as DIVS de todas as atividades referentes à aula -->
        <!-- Essas DIVS são adicionadas ao container pelo JS -->
        <div class="atividades-container"></div>

      </div>
    </div>
  </section>

  <section class="class-list">
    <section class="video-playlist">
      <h3 class="title">Titulo curso</h3>
      <?php
      if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
      ?>
      <div class="videos">
        <!-- Deve rodar um loop externo de todas as aulas do curso -->
        <!-- ao entrar na aula, roda outro loop de todas as atividades dessa aula -->
        <!-- diferenciar as aulas da atividade - identação? -->

        <!-- aula  -->
        <!-- loop com todas as aulas do curso -->
        <!-- mostrar nome da aula e a checkbox -->
        <!-- deve pegar as informações da aula para mostrar no VIEW -->

        <!-- atividade -->
        <!-- loop com todas as atividades da aula pai -->
        <!-- mostrar nome da atividade e a checkbox -->
        <!-- quando a aula for acessada, deve mudar o SRC do video do IFRAME -->

        <?php foreach ($aulas as $aula) : ?>

          <div class="video  active" id="aula-side" data-id="<?= $aula['idAula'] ?>">
            <h3 class="title"> <?= $aula['nomeAula'] ?></h3>

            <?php if (in_array($aula['idAula'], $aulas_assistidas)) { ?>

              <input class="checked custom-checkbox" type="checkbox" id="custom-checkbox" data-id="<?= $aula['idAula'] ?>" checked>
              <label for="custom-checkbox" onclick="checkAula(<?= $aula['idAula'] ?>)"></label>

            <?php } else { ?>

              <input class="checked custom-checkbox" type="checkbox" id="custom-checkbox" data-id="<?= $aula['idAula'] ?>">
              <label for="custom-checkbox" onclick="checkAula(<?= $aula['idAula'] ?>)"></label>

            <?php } ?>

          </div>

        <?php endforeach; ?>
      </div>

      <div id="modal" class="modal" height="300px">
        <div class="modal-content ">
          <div class="modal-body">

            <span class="close-button">&times;</span>

            <div class="modal-txt">
              <!-- deve receber os dados da atividade -->
              <!-- nomeAtividade -->
              <!-- descricao -->
              <!-- url - podendo ser video ou arquivo -->
              <div id="pdf-viewer"></div>

            </div>
          </div>
        </div>
      </div>


    </section>
</main>