
<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

?>

<header>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

</header>

<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar" class="active">
        <!-- header -->
        <!--<div class="sidebar-header">
        </div> -->
        <ul class="list-unstyled components">
            <li><a href="../aula/buscador">Filtrar aulas <span class="glyphicon glyphicon-search"></span></a></li>
            <li><a href="../materia/buscador">Filtrar materias <span class="glyphicon glyphicon-search"></span></a></li>
            <?php if (app\models\User::isUserAdmin(Yii::$app->user->identity->id)) : ?>
            <li><a href="../sede/create">Crear sede <span class="glyphicon glyphicon-plus"></span></a></li>
            <li><a href="../comision/create">Crear comision <span class="glyphicon glyphicon-plus"></span></a></li>
            <li><a href="../materia/create" >Crear materias <span class="glyphicon glyphicon-plus"></span></a></li>
            <?php endif ?>
        </ul>
    </nav>
    <!--termina sidebar-->
    <div id="content">
        <!-- boton de sidebar-->
        <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-primary"><i class="glyphicon glyphicon-align-justify"></i><span> Menu</span></button>
        </div>
        <!-- Contenido de la pagina -->
        <h2 class=titulo>Sedes Disponibles</h2>
        <?php foreach ($sede as $sede) : ?>
            <div id="columna" class="col-sm-12 col-md-4 active"> <!-- grid -->
              <div class="box"> 
                <div class="imgBox">
                  <img src="../image/sede_<?= Html::encode("{$sede->ID}") ?>.png">
                </div>
              <div class="details">
                <div class="content">
                  <div class="thumbnail sede">
                    <div class="caption">
                      <h4><?= Html::encode("{$sede->NOMBRE} ") ?> </h4>
                      <p><?= Html::encode("{$sede->CALLEYNUM}") ?> -<?= Html::encode(" {$sede->LOCALIDAD} ") ?></p>
                      <p></p>
                      <a href="../edificio/edifilter?id=<?= Html::encode("{$sede->ID}") ?>" class="btn btn-info" role="button">Entrar</a>
                      <?php if (app\models\User::isUserAdmin(Yii::$app->user->identity->id)) : ?>
                        <a href="../sede/update?id=<?= Html::encode("{$sede->ID}") ?>"  class="btn btn-primary" role="button">Modificar</a>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
    </div>
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