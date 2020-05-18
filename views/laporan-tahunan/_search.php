<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LaporanTahunanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laporan-tahunan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'tahun') ?>

    <?= $form->field($model, 'januari') ?>

    <?= $form->field($model, 'februari') ?>

    <?php // echo $form->field($model, 'maret') ?>

    <?php // echo $form->field($model, 'april') ?>

    <?php // echo $form->field($model, 'mei') ?>

    <?php // echo $form->field($model, 'juni') ?>

    <?php // echo $form->field($model, 'juli') ?>

    <?php // echo $form->field($model, 'agustus') ?>

    <?php // echo $form->field($model, 'september') ?>

    <?php // echo $form->field($model, 'oktober') ?>

    <?php // echo $form->field($model, 'november') ?>

    <?php // echo $form->field($model, 'desember') ?>

    <?php // echo $form->field($model, 'total') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
