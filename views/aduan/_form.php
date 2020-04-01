<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Kategori;
use app\models\Kota;
use app\models\Provinsi;

/* @var $this yii\web\View */
/* @var $model app\models\Aduan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aduan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal')->textInput() ?>

    <?= $form->field($model, 'id_kategori')->dropDownList(Kategori::getList(), ['prompt' => '--- Kategori Aduan ---']); ?>

    <?= $form->field($model, 'id_provinsi')->dropDownList(Provinsi::getList(), ['prompt' => '--- Provinsi ---']); ?>

    <?= $form->field($model, 'id_kota')->dropDownList(Kota::getList(), ['prompt' => '--- Kota ---']); ?>

    <?= $form->field($model, 'keterangan_tempat')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img_bukti_1')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img_bukti_2')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img_bukti_3')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sifat')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
