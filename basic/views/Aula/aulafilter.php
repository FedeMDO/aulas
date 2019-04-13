
<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\data\Pagination;
use yii\widgets\LinkPager;

$this->title = 'Aulas';


?>

<header>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

</header>

<style>

thead{
    background-color: #2980b9;
    border:0px;
}
th{
    border:0px;
    color:white;
}

tr:nth-child(even) {background-color: #f2f2f2;}

.table-responsive{
    margin-top:20px;
}


</style>


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
            <?php if (app\models\User::isUserAdmin(Yii::$app->user->identity->id)) : ?>
                <li><a href="../aula/create">Crear aula <span class="glyphicon glyphicon-plus"></span></a></li>
            <?php endif; ?>
        </ul>
        <!-- Parte de abajo de sidenav -->
        <ul class="list-unstyled CTAs">
            <li><a href="<?= Yii::$app->request->referrer ?>" class="download">Volver a atras</a></li>
            <li><a href="../sede/vistav" class="download">Volver a sedes</a></li>
            </ul>
    </nav>
    <!--termina sidebar-->
    

    <div id="content">
        <!-- Contenido de la pagina -->
        <?php if (count($aula) != 0) { ?> <!--si hay aulas-->
            <div class="col-md-offset-1 col-md-10"> <!--grid -->
            <!-- boton de sidebar-->
            <button type="button" id="sidebarCollapse" class="btn btn-primary"><i class="glyphicon glyphicon-align-justify"></i><span> Menu</span></button>
                <h2 class=titulo style="text-align:center;">Aulas disponibles en <?= Html::encode("{$aula[0]->eDIFICIO->NOMBRE}") ?></h2>
                <div class="caja aulafilter" style="background-color:white"> <!--panel-->
                    <!--tabla-->
                    <div class="box-body">
                        <div class="table-responsive">          
                            <table class="table" style="margin-bottom:0px">
                                <thead>
                                    <tr>
                                        <th>AGENDA</th>
                                        <th>NOMBRE</th>
                                        <th>PISO</th>
                                        <th>CAPACIDAD</th>
                                        <th>RECURSOS</th>
                                        <th>OBSERVACION</th>
                                        
                                        <!-- si es admin puede editar-->
                                        <?php if (app\models\User::isUserAdmin(Yii::$app->user->identity->id)) : ?> 
                                        <th>EDITAR</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody> <!-- contenido de la tablas -->
                                    <?php foreach ($aula as $aula) : ?> <!--recorro las aulas-->
                                    <tr>
                                    
                                        <td><a href="/evento/index?id=<?= Html::encode("{$aula->ID}") ?>" type="button" class="btn btn-primary" >VER</button></td>
                                        <td><?= Html::encode("{$aula->NOMBRE} ") ?></td>
                                        <td><?= Html::encode("{$aula->PISO} ") ?></td>
                                        <td><?= Html::encode("{$aula->CAPACIDAD} ") ?></td>
                                        <td><a href="../aula/recursos?id=<?= Html::encode("{$aula->ID}") ?>" style="color:black" ><?php $n = 0;
                                                foreach ($aula->rECURSOs as $recurso) {
                                                    $n = $n + 1;
                                                if (count($aula->rECURSOs) == $n) {
                                                    echo $recurso->NOMBRE;
                                                     
                                                } else {
                                                    echo $recurso->NOMBRE . " - ";
                                                }
                                            }?>
                                            </a>
                                            <?php if(count($aula->rECURSOs) == 0):?>
                                            <p>No hay recursos:<a href="/recurso/asignar" style="text-decoration:underline">Asignar Recurso</button></p></td>
                                            <?php endif ?>
                                            
                                            
                                        </td>
                                        <td>
                                            <?php if ($aula->OBS != null) : ?> 
                                                <?php echo $aula->OBS ?><a href="../aula/observa?id=<?= Html::encode("{$aula->ID}") ?>" class="glyphicon glyphicon-pencil" style="margin-left:4px"></a>
                                                <?php else : ?>
                                                    <p>No hay observacion. <a href="../aula/observa?id=<?= Html::encode("{$aula->ID}") ?>" class="glyphicon glyphicon-pencil"></a></p>
                                             <?php endif; ?>
                                        </td>     
                                            <?php if (app\models\User::isUserAdmin(Yii::$app->user->identity->id)) : ?>
                                        <td>
                                            <a href="../aula/update?id=<?= Html::encode("{$aula->ID}") ?>"  class="btn btn-warning" role="button">Modificar</a></p></td>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                            </table>
                        </div> <!-- cierre de table responsive -->
                    </div> <!-- cierre de box body -->
                </div> <!-- cierre de loginc -->
                <?= LinkPager::widget(['pagination' => $pagination,]) ?>
            </div> <!-- cierre de grid -->
        <?php } else { ?> <!-- si no tiene aulas -->
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">ATENCION!</h4>
                <p class="text-center">NO HAY AULAS CREADAS EN ESTE EDIFICIO</p>
                <hr>
                <div class="text-center"></div>
            </div>
            <?php } ?>
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