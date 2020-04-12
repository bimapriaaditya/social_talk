<?php

use app\models\Aduan;
use app\models\Masyarakat;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Masyarakat */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Masyarakat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="masyarakat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-body box-profile">

                        <?= Html::img('@MasyarakatImgUrl/' . $model->img, ['class' => 'profile-user-img img-responsive img-circle', 'style' => 'width:50%; height:100px;']); ?>
                        <h3 class="profile-username text-center"><?= $model->nama ?></h3>

                        <p class="text-muted text-center">NIK. <?= $model->nik ?></p>

                        <p class="text-muted text-center"><?= $model->usia . ' Tahun' ?></p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Total Aduan</b> <a class="pull-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Total Aduan Diterima</b> <a class="pull-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Total Aduan Ditolak</b> <a class="pull-right">13,287</a>
                            </li>
                        </ul>
                        <?= Html::a('Buat Aduan',['/aduan/create/'],['class' => 'btn btn-primary btn-block']); ?>
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Me</h3>
                    </div>
                    <div class="box-body">
                        <strong><i class="fa fa-map-pin margin-r-5"></i> Alamat</strong>

                        <p class="text-muted">
                            <?= $model->alamat ?>
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Lokasi</strong>

                        <p class="text-muted"><?= $model->kota->nama . ',' . $model->provinsi->nama ?></p>

                        <hr>

                        <strong><i class="fa fa-calendar-times-o margin-r-5"></i> Tanggal Lahir</strong>

                        <p>
                            <?= $model->tanggal_lahir ?>
                        </p>

                        <hr>

                        <strong><i class="fa fa-phone-square margin-r-5"></i> No. Telepon</strong>

                        <p>
                            <?= $model->no_telepon ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#profile" data-toggle="tab">Informasi Profile</a></li>
                        <li><a href="#aduanku" data-toggle="tab">Aduan Ku</a></li>
                    </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="profile">
                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'nama',
                                [
                                    'label' => 'Nomor Induk Keluarga (NIK)',
                                    'value' => $model->nik
                                ],
                                [
                                    'label' => 'No. Telepon',
                                    'value' => $model->no_telepon
                                ],
                                [
                                    'label' => 'Provinsi',
                                    'value' => $model->id_provinsi
                                ],
                                [
                                    'label' => 'Kota',
                                    'value' => $model->id_kota
                                ],
                                'alamat:ntext',
                                'tanggal_lahir',
                                [
                                    'label' => 'Usia',
                                    'value' => $model->usia . ' Tahun'
                                ],
                            ],
                        ]) ?>
                    </div>
                    <div class="tab-pane" id="aduanku">
                        <?php
                        foreach(Aduan::find()->andWhere(['id_user' => $model->id_user])->all() as $AduanKu):?>
                            <div class="post">
                                <div class="user-block">
                                    <h3>
                                        <?= $AduanKu->nama ?>
                                    </h3>
                                    <span class="description">Diunggah  - <?= $AduanKu->tanggal ?></span>
                                </div>
                                <p>
                                    <?= substr($AduanKu->deskripsi, 0, 255) . '...'; ?>
                                </p>
                                <div class="col-sm-4">
                                    <?= Html::a('Lebih <i class="glyphicon glyphicon-eye-open"></i>',['aduan/view', 'id' => $AduanKu->id], ['class' => 'btn btn-primary btn-block']) ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= Html::a('Perbaiki <i class="glyphicon glyphicon-edit"></i>',['aduan/update', 'id' => $AduanKu->id], ['class' => 'btn btn-success btn-block']) ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= Html::a('Hapus <i class="glyphicon glyphicon-trash"></i>', ['aduan/delete', 'id' => $AduanKu->id], [
                                            'class' => 'btn btn-danger btn-block',
                                            'data' => [
                                                'confirm' => 'Are you sure you want to delete this item?',
                                                'method' => 'post',
                                            ],
                                        ]) ?>
                                </div>
                                <div>&nbsp;</div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>