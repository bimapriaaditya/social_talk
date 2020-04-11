<?php

use app\models\Aduan;
use app\models\Kategori;
use app\models\Kota;
use app\models\Provinsi;
use app\models\User;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AduanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ruang Aduan Publik';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aduan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Buat Aduan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    /*if petugas */
    ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nama',
            'tanggal',
            [
                'attribute' => 'id_kategori',
                'filter' => Kategori::getList(),
                'value' => function($lorem)
                {
                    return $lorem->kategori->nama;
                }
            ],
            [
                'attribute' => 'id_provinsi',
                'filter'=> Provinsi::getList(),
                'value' => function($lorem)
                {
                    return $lorem->provinsi->nama;
                }
            ],
            [
                'attribute' => 'id_kota',
                'filter' => Kota::getList(),
                'value' => function($lorem)
                {
                    return $lorem->kota->nama;
                }
            ],
            //'keterangan_tempat:ntext',
            //'deskripsi:ntext',
            //'img_bukti_1',
            //'img_bukti_2',
            //'img_bukti_3',
            //'sifat',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php
    if (User::isMasyarakat()) {
        echo "Kau Adalah Masyarakat";
    }elseif (User::isPetugas()) {
        echo "Kau Adalah Petugas";
    }else{
        echo "Kau Adalah Admin";
    }
    ?>
        
    <!-- if masyarakat  -->

</div>