<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LaporanTahunan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laporan-tahunan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->dropDownList([ 'blue' => 'Blue', 'black' => 'Black', 'green' => 'Green', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'tahun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'januari')->textInput() ?>

    <?= $form->field($model, 'februari')->textInput() ?>

    <?= $form->field($model, 'maret')->textInput() ?>

    <?= $form->field($model, 'april')->textInput() ?>

    <?= $form->field($model, 'mei')->textInput() ?>

    <?= $form->field($model, 'juni')->textInput() ?>

    <?= $form->field($model, 'juli')->textInput() ?>

    <?= $form->field($model, 'agustus')->textInput() ?>

    <?= $form->field($model, 'september')->textInput() ?>

    <?= $form->field($model, 'oktober')->textInput() ?>

    <?= $form->field($model, 'november')->textInput() ?>

    <?= $form->field($model, 'desember')->textInput() ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
