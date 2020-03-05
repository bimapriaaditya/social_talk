<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AduanTanggapan */

$this->title = 'Update Aduan Tanggapan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Aduan Tanggapans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aduan-tanggapan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
