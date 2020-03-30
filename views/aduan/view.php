<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Aduan;
use app\models\AduanMasyarakat;
use app\models\AduanPetugas;

/* @var $this yii\web\View */
/* @var $model app\models\Aduan */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Aduan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="aduan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('<b> Perbarui </b> <i class="glyphicon glyphicon-edit"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<b> Hapus </b><i class="glyphicon glyphicon-trash"></i>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="box box-danger">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-sm-8">
                    <h3 class="box-title"> <?= $this->title = $model->nama; ?> </h3>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-2" style="text-align: right;">
                    <div class="btn-group">
                        <button type="button" class="btn btn-warning">Action</button>
                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#" style="color: blue;">DITERIMA</a></li>
                            <li><a href="#" style="color: orange;">DIPROSES</a></li>
                            <li><a href="#" style="color: red;">DITUTUP</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-body">
            <p style="text-align: right;color:red;">
                Dibuat Oleh : <?= Html::a($model->id_user, ['masyarakat/view', 'id' => $model->id]) ?>
            </p>
            <p style="text-align: right;">
                <i class="glyphicon glyphicon-calendar"></i> <?= $model->tanggal ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'attribute' => 'id_kategori',
                        'value' => $model->kategori->nama
                    ],
                    [
                        'attribute' => 'id_provinsi',
                        'value' => $model->provinsi->nama
                    ],
                    [
                        'attribute' => 'id_kota',
                        'value' => $model->kota->nama
                    ],
                    'keterangan_tempat:ntext',
                    'sifat',
                ],
            ]) ?>

            <h2>Aduan :</h2>
            
            <?php 
            foreach(Aduan::find()->andWhere(['id' => $model->id])->all() as $Aduan):?>
                <p><?= $Aduan->deskripsi ?></p>
            <?php endforeach ?>
            <div class="col-md-12">
                <div class="box box-warning box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Bukti Aduan</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-sm-4">
                            <?= Html::img('@Bukti1ImgUrl/'.$model->img_bukti_1,['width' => '250px', 'height' => '250px']) ?>
                        </div>
                        <div class="col-sm-4">
                            <?= Html::img('@Bukti2ImgUrl/'.$model->img_bukti_2,['width' => '250px', 'height' => '250px']) ?>
                        </div>
                        <div class="col-sm-4">
                            <?= Html::img('@Bukti3ImgUrl/'.$model->img_bukti_3,['width' => '250px', 'height' => '250px']) ?>
                        </div>
                    </div>
                    <div class="box-footer">
                        <p>
                            <div class="row">
                                <div class="col-sm-4">
                                    <a href="<?= Yii::getAlias('@Bukti1ImgUrl') . '/' . $model->img_bukti_1 ?>" class="btn btn-primary btn-block"> Lihat Data <span class="fa fa-eye"></span> </a>
                                </div>
                                <div class="col-sm-4">
                                    <a href="<?= Yii::getAlias('@Bukti2ImgUrl') . '/' . $model->img_bukti_2 ?>" class="btn btn-primary btn-block"> Lihat Data <span class="fa fa-eye"></span> </a>
                                </div>
                                <div class="col-sm-4">
                                    <a href="<?= Yii::getAlias('@Bukti3ImgUrl') . '/' . $model->img_bukti_3 ?>" class="btn btn-primary btn-block"> Lihat Data <span class="fa fa-eye"></span> </a>
                                </div>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="row">
                <!-- Like -->
                <div class="col-md-4">
                    <button type="button" class="btn btn-default btn-block">
                        <span class="badge bg-green">333</span>
                        <i class="glyphicon glyphicon-thumbs-up"></i>
                    </button>
                </div>
                <!-- Dislike -->
                <div class="col-md-4">
                    <button type="button" class="btn btn-default btn-block">
                        <span class="badge bg-red">666</span>
                        <i class="glyphicon glyphicon-thumbs-down"></i>
                    </button>
                </div>
                <!-- Comment -->
                <div class="col-md-4">
                    <button type="button" class="btn btn-block">
                        <span class="badge bg-purple">999</span>
                        <i class="glyphicon glyphicon-comment"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Comment Masyarakat -->
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">KOLOM TANGGAPAN MASYARAKAT</h3>
                </div>
                <div class="box-body">
                    <!-- <?php 
                    $no = 1;
                    foreach(AduanMasyarakat::find()->andWhere(['id_aduan' => $model->id])->all() as $AduanMasyarakat):?>
                    <?php endforeach ?> -->
                    <div class="box-footer box-comments">
                        <div class="box-comment">
                        <!-- User image -->
                            <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">

                            <div class="comment-text">
                                <span class="username">
                                    Maria Gonzales
                                    <a href="">Edit</a>
                                    <a href="">Hapus</a>
                                    <span class="text-muted pull-right">8:03 PM Today</span>
                                </span> <!-- /.username -->
                                It is a long established fact that a reader will be distracted
                                by the readable content of a page when looking at its layout.
                            </div>
                        <!-- /.comment-text -->
                        </div>
                        <!-- /.box-comment -->
                        <div class="box-comment">
                        <!-- User image -->
                            <img class="img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="User Image">
                            <div class="comment-text">
                                <span class="username">
                                    Luna Stark
                                    <span class="text-muted pull-right">8:03 PM Today</span>
                                </span><!-- /.username -->
                                It is a long established fact that a reader will be distracted
                                by the readable content of a page when looking at its layout.
                            </div>
                        <!-- /.comment-text -->
                        </div>
                    </div>
                </div>
                <div class="box-footer"></div>
            </div>
        </div>
        <!-- Comment Petugas dan Pelapor -->
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">KOLOM TANGGAPAN PETUGAS</h3>
                </div>
                <div class="box-body">
                    <!-- <?php 
                    $no = 1;
                    foreach(AduanPetugas::find()->andWhere(['id_aduan' => $model->id])->all() as $AduanPetugas):?>
                    <?php endforeach ?> -->
                    <div class="box-footer box-comments">
                        <div class="box-comment">
                        <!-- User image -->
                            <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">

                            <div class="comment-text">
                                <span class="username">
                                    Maria Gonzales
                                    <a href="">Edit</a>
                                    <a href="">Hapus</a>
                                    <span class="text-muted pull-right">8:03 PM Today</span>
                                </span> <!-- /.username -->
                                It is a long established fact that a reader will be distracted
                                by the readable content of a page when looking at its layout.
                            </div>
                        <!-- /.comment-text -->
                        </div>
                        <!-- /.box-comment -->
                        <div class="box-comment">
                        <!-- User image -->
                            <img class="img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="User Image">
                            <div class="comment-text">
                                <span class="username">
                                    Luna Stark
                                    <span class="text-muted pull-right">8:03 PM Today</span>
                                </span><!-- /.username -->
                                It is a long established fact that a reader will be distracted
                                by the readable content of a page when looking at its layout.
                            </div>
                        <!-- /.comment-text -->
                        </div>
                    </div>
                    <div class="box-footer"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Form Tanggapan Masyarakat -->
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Form Tanggapan Masyarakat</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>Beri Tanggapan :</label>
                        <textarea class="form-control" rows="6" placeholder="Tambahkan Tanggapan..."></textarea>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="" class="btn btn-success btn-block">Kirim <i class="fa fa-send"></i></a>
                </div>
            </div>
        </div>
        <!-- Form tanggapan Petugas -->
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Form Tanggapan Petugas</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>Beri Tanggapan :</label>
                        <textarea class="form-control" rows="6" placeholder="Tambahkan Tanggapan..."></textarea>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="" class="btn btn-success btn-block">Kirim <i class="fa fa-send"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>