<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Provinsi;
use app\models\Kota;

/* @var $this yii\web\View */
/* @var $model app\models\Masyarakat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="masyarakat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_telepon')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'id_provinsi')->dropDownList(Provinsi::getList(), ['prompt' => '-- Provinsi ---']); ?>

    <?= $form->field($model, 'id_kota')->dropDownList(Kota::getList(), ['prompt' => '--- Kota ---']) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tanggal_lahir')->textInput() ?>

    <?= $form->field($model, 'usia')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'img')->fileInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
