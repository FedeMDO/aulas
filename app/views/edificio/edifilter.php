<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\data\Pagination;
use yii\widgets\LinkPager;

$this->title = 'Edificios';

?>

<header>
  <!-- jQuery CDN - Slim version (=without AJAX) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>

</header>
<?= \yii\helpers\Url::remember(); ?>
<div class="wrapper">
  <!-- Sidebar  -->
  <nav id="sidebar" class="active">
    <!-- header -->
    <!--<div class="sidebar-header">
        </div> -->
    <ul class="list-unstyled components">
      <li><a href="../aula/buscador">Filtrar aulas <span class="glyphicon glyphicon-search"></span></a></li>
      <li><a href="../materia/buscador">Filtrar materias <span class="glyphicon glyphicon-search"></span></a></li>
      <li><a href="../edificio/scheduler?id_sede=<?= Html::encode("{$idsede}") ?>" class="btn miBoton btn-md btn-vistav"
          role="button">Ver eventos por edificio</a></li>
      <?php if (app\models\User::isUserAdmin(Yii::$app->user->identity->id)) : ?>
      <li><a href="../edificio/create">Crear edificio <span class="glyphicon glyphicon-plus"></span></a></li>
      <li><a href="../edificio/restrischeduler?id_sede=<?= Html::encode("{$idsede}") ?>"
          class="btn miBoton btn-md btn-vistav" role="button">Restricciones edificios</a></li>
      <?php endif; ?>
    </ul>
    <!-- Parte de abajo de sidenav -->
    <ul class="list-unstyled CTAs">
      <li><a href="../sede/vistav" class="download">Volver a sedes</a></li>
    </ul>
  </nav>
  <!--termina sidebar-->


  <div id="content">
    <!-- boton de sidebar-->
    <div class="container-fluid">
      <button type="button" id="sidebarCollapse" class="btn btn-primary"><i
          class="glyphicon glyphicon-align-justify"></i><span> Menu</span></button>
    </div>
    <!-- Contenido de la pagina -->
    <h2 class=titulo><?php if (count($edificio) != 0) {
                    echo ("Edificios Disponibles en la sede ");
                    echo (Html::encode("{$edificio[0]->sEDE->NOMBRE}"));
                  } else {
                  } ?>
    </h2>
    <?php foreach ($edificio as $edificio) : ?>
    <div class="row3">
      <div id="columna" class="col-sm-8 col-md-4 active">
        <div class="box">
          <div class="imgBox">
            <img src="../image/edi_<?= Html::encode("{$edificio->ID}") ?>.png">
            <div class="details">
            <div class="content">
              <div class="thumbnail sede">
                <div class="caption">
                  <h4 style="text-align:center;"><?= Html::encode("{$edificio->NOMBRE} ") ?></h4>
                  <img src="../image/aulaicon.png" alt="  height=" 50" width="50">
                  <?= Html::encode("{$edificio->CANTIDAD_AULAS} ") ?>
                  <p></p>
                  <a href="../aula/aulafilter?id=<?= Html::encode("{$edificio->ID}") ?>" class="btn btn-info"
                    role="button">Entrar</a>
                  <?php if (app\models\User::isUserAdmin(Yii::$app->user->identity->id)) : ?>
                  <a href="../edificio/update?id=<?= Html::encode("{$edificio->ID}") ?>" class="btn btn-primary"
                    role="button">Modificar</a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
          </div>
          <h4 class="titulo"><?= Html::encode("{$edificio->NOMBRE} ") ?></h4>
          <h4 class="titulo">Cantidad Aulas: <?= Html::encode("{$edificio->CANTIDAD_AULAS}")?></h4>
        </div>
      </div>
    </div>
    <?php endforeach; ?>

  </div> <!-- final del contenido-->
</div> <!-- final del wraper-->

<!-- script para sidebar -->
<script type="text/javascript">
  $(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
    });
  });
</script>

</html>