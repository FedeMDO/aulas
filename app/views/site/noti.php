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

        .boxMensaje {
            max-width: 500px;
        }

        .calendario {
            background-color: white;
            padding: 10px;
            margin-top: 20px;
            width: fit-content;
            border-radius: 5px;
        }

        /* Thick red border */
        hr.new4 {
            border: 1px solid black;
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
            <li><a href="#" onclick="openCity(event, 'Recibido')" id="defaultOpen"><i class="glyphicon glyphicon-inbox"></i> Recibidas</a></li>
            <li><a href="#" onclick="openCity(event, 'Enviado')" id="enviadas"><i class="glyphicon glyphicon-envelope"></i> Enviadas</a></li>
            <li><a href="#" onclick="openCity(event, 'Enviar notificacion')" id="enviar"><i class="glyphicon glyphicon-plus"></i> Nueva notificacion</a></li>
        </ul>
        <!-- Parte de abajo de sidenav -->
        <ul class="list-unstyled CTAs">
        </ul>
    </nav>
    <!--termina sidebar-->
    <div id="content">
        <!-- Contenido de la pagina -->
        <?php if (Yii::$app->session->hasFlash(\dominus77\sweetalert2\Alert::TYPE_SUCCESS)) : \dominus77\sweetalert2\Alert::widget(['useSessionFlash' => true]);
        endif; ?>
        <div id="Recibido" class="tabcontent media border p-3 enviado">
            <?php $entro = false; ?>
            <?php foreach ($notificacion as $n) :
                if ($n->uSERRECEPTOR->id == Yii::$app->user->identity->id) :
                    if ($n->BORRA_R == 0) : ?>
                        <?php $entro = true; ?>
                        <?php $usuario1 = Users::findOne($n->uSEREMISOR->id); ?>
                        <div class="calendario">
                            <div class="boxMensaje">
                                <?php if ($usuario1->profile_picture == "") : ?>
                                    <img src="../image/admin_icon.png" class="admin" style=" height:60px; width:60px; margin-left:10px; margin-bottom:10px;" ;>
                                <?php else : ?>
                                    <img src="<?= $usuario1->profile_picture ?>" class="admin" style=" height:60px; width:60px; margin-left:10px; margin-bottom:10px;" ;>
                                <?php endif ?>
                                <div class="media-body">
                                    <h4><span style="color:black"><?= Html::encode("{$n->uSEREMISOR->username} ") ?></span><small><i>Fecha: <?= Html::encode("{$n->FECHA} ") ?></i></small>
                                        <small> <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', Url::to(['site/noti']),  ['data' => ['confirm' => 'Estas seguro?', 'method' => 'post', 'params' => ['Notificacion' => 'borrarR', 'id' => $n->ID]]]) ?></small>
                                        <a href="#" onclick='responder(<?= Html::encode("{$n->uSEREMISOR->id}") ?>)' title="Responder" class="glyphicon glyphicon-share-alt" style="margin-left:5px"></a>
                                    </h4>
                                    <hr class="new4" style="width: 75%">
                                    <p><?= SiteController::encrypt_decrypt('decrypt', $n->NOTIFICACION) ?></p>
                                    <?php $n->visto = "true" ?>
                                    <?php $n->save(); ?>
                                </div>
                            </div>
                        </div>

                    <?php endif; ?>
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
                if ($n->uSEREMISOR->id == Yii::$app->user->identity->id) :
                    if ($n->BORRA_E == 0) : ?>
                        <?php $entro = true; ?>
                        <div class="calendario">
                            <div class="boxMensaje">
                                <?php if (Yii::$app->user->identity->profile_picture == "") : ?>
                                    <img src="../image/admin_icon.png" class="admin" style="height:60px; width:60px; margin-left:10px; margin-bottom:10px;" ;>
                                <?php else : ?>
                                    <img src="<?= Yii::$app->user->identity->profile_picture ?>" class="admin" style="height:60px; width:60px; margin-left:10px; margin-bottom:10px;" ;>
                                <?php endif ?>
                                <div class="media-body">
                                    <h4><span style="color:black"> Para <strong><?= Html::encode("{$n->uSERRECEPTOR->username} ") ?></strong></span>
                                        <small><i>Fecha: <?= Html::encode("{$n->FECHA} ") ?></i></small>
                                        <small> <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', Url::to(['site/noti']),  ['data' => ['confirm' => 'Estas seguro?', 'method' => 'post', 'params' => ['Notificacion' => 'borrarE', 'id' => $n->ID]]]) ?></small></h4>
                                    <hr class="new4" style="width: 75%">
                                    <p><?= SiteController::encrypt_decrypt('decrypt', $n->NOTIFICACION) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
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
        $(document).ready(function() {
            var url = $(location).attr('href');
            if (url.includes('#enviadas')) {
                $("#enviadas").click();
            }
            if (url.includes('#enviar')) {
                $('#enviar').click();
            } else {
                $("#defaultOpen").click();
            }

            $('#sidebarCollapse').on('click', function() {
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

        function responder(id) {
            $("#notificacion-id_user_receptor").val(id);
            $("#notificacion-id_user_receptor").change();
            $("#enviar").click();
        }
    </script>