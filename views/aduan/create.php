<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Aduan */

$this->title = 'Create Aduan';
$this->params['breadcrumbs'][] = ['label' => 'Aduans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aduan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
