<?php

use app\models\Bagian;
use app\models\Kota;
use app\models\Provinsi;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Petugas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="petugas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_bagian')->dropDownList(Bagian::getList(),['prompt' => '--- Bagian Tugas ---']); ?>

    <?= $form->field($model, 'no_telepon')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'id_provinsi')->dropDownList(Provinsi::getList(),['prompt' => '--- Provinsi ---']) ?>

    <?= $form->field($model, 'id_kota')->dropDownList(Kota::getList(),['prompt' => '--- Kota ---']) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir')->widget(DatePicker::classname(),[
        'name' => 'anniversary',
        'readonly' => true,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-m-dd'
        ]
    ]) ?>

    <?= $form->field($model, 'usia')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'img')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
