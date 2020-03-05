<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AduanMasyarakat */

$this->title = 'Update Aduan Masyarakat: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Aduan Masyarakats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aduan-masyarakat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
