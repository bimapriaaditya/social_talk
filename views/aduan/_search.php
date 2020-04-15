<?php

use app\models\Kategori;
use app\models\Kota;
use app\models\Provinsi;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AduanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aduan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'id_kategori')->dropDownList(Kategori::getList(), ['prompt' => '--- Filter Kategori ---']) ?>

            <?= $form->field($model, 'id_provinsi')->dropDownList(Provinsi::getList(), ['prompt' => '--- Filter Provinsi ---']) ?>

            <?= $form->field($model, 'id_kota')->dropDownList(Kota::getList(), ['prompt' => '--- Filter Kota ---']) ?>   
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'tanggal')->widget(DatePicker::classname(),[
                'readonly' => true,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-m-dd'
                ]
            ]) ?>

            <?= $form->field($model, 'sifat')->dropDownList([ '' => '--- Filter Sifat ---' ,1 => 'Public (UMUM)', 2 => 'Private (PRIBADI)']) ?>
        </div>
    </div>

    <?php // $form->field($model, 'id') ?>

    <?php // $form->field($model, 'nama') ?>

    <?php // echo $form->field($model, 'keterangan_tempat') ?>

    <?php // echo $form->field($model, 'deskripsi') ?>

    <?php // echo $form->field($model, 'img_bukti_1') ?>

    <?php // echo $form->field($model, 'img_bukti_2') ?>

    <?php // echo $form->field($model, 'img_bukti_3') ?>

    <div class="form-group" style="text-align: right;">
        <?= Html::submitButton(' Search', ['class' => 'btn btn-primary fa fa-search']) ?>
        <?= Html::resetButton(' Reset', ['class' => 'btn btn-danger fa fa-refresh']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
