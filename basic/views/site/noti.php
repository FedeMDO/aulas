
<?php
use app\models\Notificacion;
use dominus77\sweetalert2;
use yii\bootstrap\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Users;
use app\controllers\SiteController;

$this->title = 'Notificaciones';

?>

<header>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <style>
        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }
            #sidebar.active {
                margin-left: 0;
            }
            #sidebarCollapse span {
                display: none;
            }
        }
    </style>
</header>

<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <!-- header -->
        <!--<div class="sidebar-header">
        </div> -->
        <ul class="list-unstyled components">
          <li><a href="#"onclick="openCity(event, 'Recibido')" id="defaultOpen"><i class="glyphicon glyphicon-inbox"></i>  Recibidas</a></li>
          <li><a href="#"onclick="openCity(event, 'Enviado')"><i class="glyphicon glyphicon-envelope"></i>  Enviadas</a></li>
          <li><a href="#"onclick="openCity(event, 'Enviar notificacion')"><i class="glyphicon glyphicon-plus"></i> Nueva notificacion</a></li>
        </ul>
        <!-- Parte de abajo de sidenav -->
        <ul class="list-unstyled CTAs">
        </ul>
    </nav>
    <!--termina sidebar-->
    <div id="content">
        <!-- boton de sidebar-->
        <button type="button" id="sidebarCollapse" class="btn btn-primary"><i class="glyphicon glyphicon-align-justify"></i><span></span></button>
        <!-- Contenido de la pagina -->
        <?php if (Yii::$app->session->hasFlash(\dominus77\sweetalert2\Alert::TYPE_SUCCESS)) :\dominus77\sweetalert2\Alert::widget(['useSessionFlash' => true]);endif; ?>
        <div id="Recibido" class="tabcontent media border p-3 enviado">
            <?php $entro = false; ?>
            <?php foreach ($notificacion as $n) :
                if ($n->uSERRECEPTOR->id == Yii::$app->user->identity->id) : ?>
					<?php $entro = true; ?>
                    <?php $usuario1 = Users::findOne($n->uSEREMISOR->id); ?>
                    <?php if ($usuario1->profile_picture ==""):?>
                        <img src="../image/admin_icon.png" class="admin" style="width:60px; margin-left:10px; margin-bottom:10px;";>
                    <?php else: ?>
					    <img src="<?= $usuario1->profile_picture ?>" class="admin" style="width:60px; margin-left:10px; margin-bottom:10px;";>
                    <?php endif ?>
					<div class="media-body">
					    <h4><?= Html::encode("{$n->uSEREMISOR->username} ") ?> <small><i>Fecha: <?= Html::encode("{$n->FECHA} ") ?></i></small></h4>
					    <p><?= SiteController::encrypt_decrypt('decrypt', $n->NOTIFICACION) ?></p>
					</div>
				<?php endif; ?>
            <?php endforeach; ?>
                <?php if ($entro == false) : ?>
                    <div class="alert alert-danger">
                        <p>No tienes mensajes recibidos.</p>
                    </div>
                    <?php endif; ?>
        </div>

        <div id="Enviado" class="tabcontent media border p-3 enviado">
            <?php $entro = false; ?>
            <?php foreach ($notificacion as $n) :
                if ($n->uSEREMISOR->id == Yii::$app->user->identity->id) : ?>
				    <?php $entro = true; ?>
                    <?php if (Yii::$app->user->identity->profile_picture ==""):?>
                        <img src="../image/admin_icon.png" class="admin" style="width:60px; margin-left:10px; margin-bottom:10px;";>
                    <?php else: ?>
					    <img src= "<?= Yii::$app->user->identity->profile_picture ?>" class="admin" style="width:60px; margin-left:10px; margin-bottom:10px;";>
                    <?php endif ?>
					<div class="media-body">
					    <h4>Para: <?= Html::encode("{$n->uSERRECEPTOR->username} ") ?>
					    <small><i>Fecha: <?= Html::encode("{$n->FECHA} ") ?></i></small>
					    <small><?= Html::a('borrar', Url::to(['site/noti']), ['data' => ['confirm' => 'Estas seguro?', 'method' => 'post', 'params' => ['Notificacion' => 'borrar', 'id' => $n->ID]]]) ?></small></h4>
					    <p><?= SiteController::encrypt_decrypt('decrypt', $n->NOTIFICACION) ?></p>
					</div>
				<?php endif; ?>
            <?php endforeach; ?>
            <?php if ($entro == false) : ?>
                <div class="alert alert-danger">
                    <p>No tienes mensajes enviados.</p>
                </div>
            <?php endif; ?>
        </div>
    <div id="Enviar notificacion" class="tabcontent mensaje">
        <div class="notificacion-create">
            <?= $this->render('_form', [
                'model' => $model,
                'usuarios' => $usuarios
                ]) ?>
        </div>
    </div>
</div> <!-- final del wraper-->

<!-- script para sidebar -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
    function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
</html>