<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AduanTanggapan */

$this->title = 'Create Aduan Tanggapan';
$this->params['breadcrumbs'][] = ['label' => 'Aduan Tanggapans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aduan-tanggapan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
