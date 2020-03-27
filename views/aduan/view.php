<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Aduan;

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
                    'id_kategori',
                    'id_provinsi',
                    'id_kota',
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
                        <i class="glyphicon glyphicon-comment"> 333</i>
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
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
                <div class="box-footer"></div>
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
                        <textarea class="form-control" rows="6" placeholder="Tambahkan Kata..."></textarea>
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
                        <textarea class="form-control" rows="6" placeholder="Tambahkan Kata..."></textarea>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="" class="btn btn-success btn-block">Kirim <i class="fa fa-send"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>