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
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default collapsed-box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Aduan Ku</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <?php 
                    foreach(Aduan::find()->andWhere(['id_user' => Yii::$app->user->identity->id])->all() as $AduanKu):?>
                        <div class="col-md-4">
                            <div class="box box-secondary">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?= $AduanKu->nama ?></h3>
                                </div>
                                <div class="box-body">
                                    <p style="color: red; text-align: right;">
                                        Dibuat Oleh : <?= Html::a($AduanKu->id_user,['/user/view', 'id' => $AduanKu->id_user]); ?>
                                    </p>
                                    <p style="text-align: right;">
                                        <i class="glyphicon glyphicon-calendar"></i> <?= $AduanKu->tanggal ?>
                                    </p>
                                    <p style="text-align: right;">
                                        <i class="glyphicon glyphicon-map-marker"><?= $AduanKu->id_provinsi ?></i>
                                    </p>
                                    <p>
                                        <?= substr($AduanKu->deskripsi, 0, 255) . '...'; ?>
                                    </p>
                                </div>
                                <div class="box-footer">
                                    <div class="col-sm-12">
                                        <?= Html::a('Lebih <i class="glyphicon glyphicon-eye-open"></i>',['view', 'id' => $AduanKu->id], ['class' => 'btn btn-primary']) ?>
                                        <?= Html::a('Perbaiki <i class="glyphicon glyphicon-edit"></i>',['update', 'id' => $AduanKu->id], ['class' => 'btn btn-success']) ?>
                                        <?= Html::a('Hapus <i class="glyphicon glyphicon-trash"></i>', ['delete', 'id' => $AduanKu->id], [
                                            'class' => 'btn btn-danger',
                                            'data' => [
                                                'confirm' => 'Are you sure you want to delete this item?',
                                                'method' => 'post',
                                            ],
                                        ]) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>

    <!-- if masyarakat  -->

</div>

<!-- <?= GridView::widget([
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
]); ?> -->