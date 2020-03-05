<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AduanMasyarakat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aduan-masyarakat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_aduan')->textInput() ?>

    <?= $form->field($model, 'id_masyarakat')->textInput() ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tanggal')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
