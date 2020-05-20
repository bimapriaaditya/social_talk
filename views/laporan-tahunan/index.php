<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LaporanTahunanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Tahunan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporan-tahunan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php 

    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'type',
        'tahun',
        'status',
        'januari',
        'februari',
        'maret',
        'april',
        'mei',
        'juni',
        'juli',
        'agustus',
        'september',
        'oktober',
        'november',
        'desember',
        'total',
        ['class' => 'yii\grid\ActionColumn'],
    ];

    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'filename'=>'Data Statistik Laporan Tahunan'
    ]);
    ?>

    <h4>Preview Data !!!</h4>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type',
            'tahun',
            'status',
            //'januari',
            //'februari',
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
