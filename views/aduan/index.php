<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AduanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aduans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aduan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Aduan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_user',
            'nama',
            'tanggal',
            'id_kategori',
            //'id_provinsi',
            //'id_kota',
            //'keterangan_tempat:ntext',
            //'deskripsi:ntext',
            //'img_bukti_1',
            //'img_bukti_2',
            //'img_bukti_3',
            //'sifat',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
