<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AduanTanggapan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aduan-tanggapan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_aduan')->textInput() ?>

    <?= $form->field($model, 'tanggapan')->dropDownList([ 1 => '1', 2 => '2', 3 => '3', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'tanggal')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
