<?php

use app\models\Aduan;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;

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
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default collapsed-box box-solid">
                <div class="box-header with-border" data-widget="collapse">
                    <h3 class="box-title">Aduan Ku</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <?php 
                    foreach(Aduan::find()->andWhere(['id_masyarakat' => Yii::$app->user->identity->id_masyarakat])->all() as $AduanKu):?>
                        <div class="col-md-4">
                            <div class="box box-secondary">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?= $AduanKu->nama ?></h3>
                                </div>
                                <div class="box-body" style="height: 250px">
                                    <p style="color: red; text-align: right;">
                                        Dibuat Oleh : <?= Html::a($AduanKu->masyarakat->nama,['/masyarakat/view', 'id' => $AduanKu->id_masyarakat]); ?>
                                    </p>
                                    <p style="text-align: right;">
                                        <i class="glyphicon glyphicon-calendar"></i> <?= $AduanKu->tanggal ?>
                                    </p>
                                    <p style="text-align: right;">
                                        <i class="glyphicon glyphicon-map-marker"><?= $AduanKu->provinsi->nama ?></i>
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
    <div class="row">
        <div class="col col-md-1"></div>
        <div class="col col-md-10">

        	 <?php Pjax::begin(); ?>

        	    <?= ListView::widget([
				    'dataProvider' => $dataProvider,
				    'itemView' => '_daftar',
				]); ?>

			 <?php Pjax::end(); ?>

        </div>
        <div class="col col-md-1"></div>
    </div>
</div>