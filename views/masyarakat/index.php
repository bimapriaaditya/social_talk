<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MasyarakatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Masyarakat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masyarakat-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Masyarakat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nama',
            'nik',
            'id_kota',
            'no_telepon',
            //'id_provinsi',
            //'alamat:ntext',
            //'tanggal_lahir',
            //'usia',
            //'img',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
