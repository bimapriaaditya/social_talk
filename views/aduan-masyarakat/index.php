<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AduanMasyarakatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aduan Masyarakats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aduan-masyarakat-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Aduan Masyarakat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_aduan',
            'id_masyarakat',
            'text:ntext',
            'tanggal',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
