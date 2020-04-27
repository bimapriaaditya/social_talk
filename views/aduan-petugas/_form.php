<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AduanPetugas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aduan-petugas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_aduan')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'id_petugas')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'id_masyarakat')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'create_at')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
