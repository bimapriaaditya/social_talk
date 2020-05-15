<?php

use app\models\Aduan;
use app\models\User;
use app\models\Kategori;
use yii\helpers\Html;
use yii\widgets\DetailView;
use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\SeriesDataHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Petugas */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Petugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<div class="petugas-view">

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

                        <?= Html::img('@PetugasImgUrl/' . $model->img, ['class' => 'profile-user-img img-responsive img-circle', 'style' => 'width:50%; height:100px;']); ?>
                        <h3 class="profile-username text-center"><?= $model->nama ?></h3>

                        <p class="text-muted text-center">Bagian <?= $model->bagian->nama ?></p>

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
                        <?= Html::a('Edit Profile',['/petugas/update/', 'id' => $model->id],['class' => 'btn btn-success btn-block']); ?>
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

                        <strong><i class="fa fa-calendar margin-r-5"></i> Tanggal Lahir</strong>

                        <p>
                            <?= $model->tanggal_lahir ?>
                        </p>

                        <hr>

                        <strong><i class="fa fa-phone margin-r-5"></i> No. Telepon</strong>

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
                        <li><a href="#tanggapanKu" data-toggle="tab">Tanggapan</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="profile">
                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    'nama',
                                    [
                                        'label' => 'Bagian',
                                        'value' => $model->bagian->nama
                                    ],
                                    'no_telepon',
                                    [
                                        'label' => 'Provinsi',
                                        'value' => $model->provinsi->nama
                                    ],
                                    [
                                        'label' => 'Kota',
                                        'value' => $model->kota->nama
                                    ],
                                    'alamat',
                                    'tanggal_lahir',
                                    'usia',
                                ],
                            ]) ?>
                        </div>
                        <div class="tab-pane" id="tanggapanKu">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                    </div>
                </div>
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Diagram Rekapitulasi </h3>
                    </div>
                    <div class="box-body">
                        <?php 
                        $jan = array((int) Aduan::find()->andWhere(['bulan' => '1'])->count());

                        $feb = array((int) Aduan::find()->andWhere(['bulan' => '2'])->count());

                        $mar = array((int) Aduan::find()->andWhere(['bulan' => '3'])->count()); 

                        $apr = array((int) Aduan::find()->andWhere(['bulan' => '4'])->count()); 

                        $mei = array((int) Aduan::find()->andWhere(['bulan' => '5'])->count()); 
                        
                        $jun = array((int) Aduan::find()->andWhere(['bulan' => '6'])->count()); 
                        
                        $jul = array((int) Aduan::find()->andWhere(['bulan' => '7'])->count()); 
                        
                        $ags = array((int) Aduan::find()->andWhere(['bulan' => '8'])->count());
                        
                        $sep = array((int) Aduan::find()->andWhere(['bulan' => '9'])->count()); 
                        
                        $okt = array((int) Aduan::find()->andWhere(['bulan' => '10'])->count()); 
                        
                        $nov = array((int) Aduan::find()->andWhere(['bulan' => '11'])->count()); 
                        
                        $des = array((int) Aduan::find()->andWhere(['bulan' => '12'])->count());
                        echo Highcharts::widget([
                           'options' => [
                                'title' => ['text' => 'Aduan 2020'],
                                'xAxis' => [
                                    'categories' => [
                                        'Januari', 
                                        'Februari', 
                                        'Maret', 
                                        'April', 
                                        'Mei', 
                                        'Juni',
                                        'Juli', 
                                        'Agustus', 
                                        'September', 
                                        'Oktober',
                                        'November', 
                                        'Desember'
                                    ]
                                ],
                              'yAxis' => [
                                    'title' => ['text' => 'Data Tercapai']
                              ],
                              'series' => [
                                    ['name' => 'Total Aduan Nasional', 'data' => [
                                        $jan, $feb, $mar, $apr, $mei, $jun, $jul, $ags, $sep, $okt, $nov, $des]
                                    ],
                                    ['name' => 'Total Aduan Provinsi', 'data' => [
                                        1, 2, 5, 4, 2, 4, 12, 8, 9, 5]
                                    ]
                                ]
                            ]
                        ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title with-border">
                    Diagram Rekapitulasi
                </h3>
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <?= Highcharts::widget([
                           'options' => [
                                'plotOptions' => [
                                    'pie' => [
                                        'cursor' => 'pointer',
                                    ],
                                ],
                                'title' => ['text' => 'Kategori Aduan Nasional'],
                                'series' => [
                                    [
                                        'type' => 'pie',
                                        'name' => 'Total Aduan',
                                        'data' => Kategori::getListChart()
                                    ]   
                                ]
                            ]
                        ]);
                    ?>

                </div>
                <div class="col-md-6">
                    <?= Highcharts::widget([
                           'options' => [
                                'title' => ['text' => 'Kategori Aduan Provinsi'],
                                'series' => [
                                    [
                                        'type' => 'pie',
                                        'name' => 'Total Aduan', 
                                        'data' => Kategori::getListProvChart()
                                    ],   
                                ]
                            ]
                        ]);
                    ?>
                </div>
            </div>
        </div>
    </section>
</div>