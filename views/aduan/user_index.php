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
            <?php 
            foreach (Aduan::find()->orderBy(['id' => SORT_ASC])->all() as $Aduan):?>
                <div class="box box-widget" style="border-radius: 20px;">
                    <div class="box-header with-border">
                      <div class="user-block">
                         <?php 
                         echo Html::img('@MasyarakatImgUrl/' . $Aduan->masyarakat->img, ['class' => 'img-circle']); ?>
                        <span class="username">
                            <?= Html::a($Aduan->masyarakat->nama,['masyarakat/view', 'id' => $Aduan->id_masyarakat]); ?>
                        </span>
                        <span class="username">
                            <?= Html::a($Aduan->nama, ['aduan/view', 'id' => $Aduan->id]); ?>
                        </span>
                        <span class="description">Dibuat <?= $Aduan->tanggal ?></span>
                      </div>
                      <!-- /.user-block -->
                      <div class="box-tools">
                        <?= Html::a('<i class="fa fa-share"></i>', ['aduan/view', 'id' => $Aduan->id]); ?>
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                      <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <!-- post text -->
                      <p>
                          <?= $Aduan->provinsi->nama . '  ' . '-' . '  ' . $Aduan->kota->nama ?>
                      </p>
                      <p>
                          <?= $Aduan->deskripsi ?>
                      </p>

                      <!-- Attachment -->
                      <div class="attachment-block clearfix">
                        <?= Html::img('@Bukti1ImgUrl/'.$Aduan->img_bukti_1,['width' => '100px', 'height' => '100px']) ?>
                        <span style="padding-left: 10px;"></span>

                        <?= Html::img('@Bukti2ImgUrl/'.$Aduan->img_bukti_2,['width' => '100px', 'height' => '100px']) ?>
                        
                        <span style="padding-left: 10px;"></span>
                        <?= Html::img('@Bukti3ImgUrl/'.$Aduan->img_bukti_3,['width' => '100px', 'height' => '100px']) ?>
                        <!-- /.attachment-pushed -->
                      </div>
                      <!-- /.attachment-block -->
                      <span class="pull-right text-muted">45 likes - 2 comments</span>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="col col-md-1"></div>
    </div>
</div>