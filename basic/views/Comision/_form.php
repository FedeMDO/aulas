<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Materia;
use app\models\Instituto;
use app\models\Carrera;
use app\models\User;
use app\models\Users;
use yii\bootstrap\Alert;
use dominus77\sweetalert2;

/* @var $this yii\web\View */
/* @var $model app\models\Comision */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Crear comision';

if (Yii::$app->session->hasFlash(\dominus77\sweetalert2\Alert::TYPE_SUCCESS)) :
    \dominus77\sweetalert2\Alert::widget(['useSessionFlash' => true]);
endif;
?>

<div class="comision-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NUMERO', ['labelOptions' => ['style' => 'color:white; padding-top:10px;']])->textInput(['maxlength' => true]) ?>

    <?php if (User::isUserAdmin(Yii::$app->user->identity->id)) {
        $institutos = Instituto::find()->asArray()->all();
    } else {
        $query = Users::findOne(Yii::$app->user->identity->id)->instituto;
        $institutos = array($query);
    }
    $resultIns = ArrayHelper::map($institutos, 'ID', 'NOMBRE');
    ?>

    <?php echo $form->field($instituto, 'ID', ['labelOptions' => ['style' => 'color:white']])->dropDownList(
        $resultIns,
        [
            'prompt' => 'Seleccione instituto...',
            'onchange' => '
				$.post( "' . Yii::$app->urlManager->createUrl('comision/listcarrera?id=') . '"+$(this).val(), function( data ) {
                  if (data){
                    $( "select#carrera-id" ).html( data );
                    $( "select#carrera-id" ).prop("selectedIndex", 0).change();
                  }
				});
			'
        ]
    )->label('Instituto'); ?>

    <?php $carreras = Carrera::find()->asArray()->all();
    $resultCarr = ArrayHelper::map($carreras, 'ID', 'NOMBRE'); ?>

    <?php echo $form->field($carrera, 'ID', ['labelOptions' => ['style' => 'color:white']])->dropDownList(
        $resultCarr,
        [
            'prompt' => 'Seleccione Carrera...',
            'onchange' => '
				$.post( "' . Yii::$app->urlManager->createUrl('comision/listmateria?id=') . '"+$(this).val(), function( data ) {
				  $( "select#comision-id_materia" ).html( data );
				});
			'
        ]
    )->label('Carrera'); ?>

    <?php $materias = Materia::find()->asArray()->all();
    $resultMat = ArrayHelper::map($materias, 'ID', 'NOMBRE');
    $resultCod = ArrayHelper::map($materias, 'ID', 'COD_MATERIA'); ?>

    <?php echo $form->field($model, 'ID_MATERIA', ['labelOptions' => ['style' => 'color:white']])->dropDownList(
        $resultMat,
        ['prompt' => 'Seleccione Materia...']
    )->label('Materia'); ?>

    <div class="form-group">
        <?= Html::submitButton('Crear', ['class' => 'btn btn-success btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
