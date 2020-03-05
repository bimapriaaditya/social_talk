<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AduanPetugas */

$this->title = 'Create Aduan Petugas';
$this->params['breadcrumbs'][] = ['label' => 'Aduan Petugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aduan-petugas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
