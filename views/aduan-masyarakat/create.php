<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AduanMasyarakat */

$this->title = 'Create Aduan Masyarakat';
$this->params['breadcrumbs'][] = ['label' => 'Aduan Masyarakats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aduan-masyarakat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
