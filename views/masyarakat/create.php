<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Masyarakat */

$this->title = 'Create Masyarakat';
$this->params['breadcrumbs'][] = ['label' => 'Masyarakats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masyarakat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
