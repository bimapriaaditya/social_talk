<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LaporanTahunanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Tahunans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporan-tahunan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Laporan Tahunan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type',
            'tahun',
            'januari',
            'februari',
            //'maret',
            //'april',
            //'mei',
            //'juni',
            //'juli',
            //'agustus',
            //'september',
            //'oktober',
            //'november',
            //'desember',
            //'total',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
