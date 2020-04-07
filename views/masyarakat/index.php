<?php


use app\models\Kota;
use yii\grid\GridView;
use yii\helpers\Html;

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
            [
                'attribute' => 'id_kota',
                'filter' => Kota::getList(),
                'value' => function($lorem)
                {
                    return $lorem->kota->nama;
                }
            ],
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
