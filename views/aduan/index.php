<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Aduan;

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
            'id_kategori',
            'id_provinsi',
            'id_kota',
            //'keterangan_tempat:ntext',
            //'deskripsi:ntext',
            //'img_bukti_1',
            //'img_bukti_2',
            //'img_bukti_3',
            //'sifat',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
        
    <!-- if masyarakat  -->

</div>