<?php 
use yii\helpers\Html;
use app\models\Aduan;
use app\models\Kategori;
use app\models\LaporanTahunan;
use app\models\LaporanTahunanSearch;
use app\models\User;
use miloschuman\highcharts\Highcharts;
use kartik\export\ExportMenu;
?>
<div class="aduan-rekap">
	<div class="callout callout-info">
		<h4> 📊 Rekapitulasi Data Aduan 📰</h4>
		<p>Rekap data aduan sesuai judul yang tertera</p>
	</div>

	<div class="box box-primary">
		<div class="box-header with-border">
			<h4 class="box-title"> Data Tahunan </h4>
            <?php if (User::isAdmin()): ?>
                <?= Html::a('Set Data', ['aduan/rekapitulasi'] ,['class' => 'btn btn-danger']); ?>
            <?php endif ?>
		</div>
		<div class="box-body">
            <?= Highcharts::widget([
               'options' => [
                    'title' => ['text' => 'Statistik Laporan Aduan'],
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
                    //Blue => Now
                        [
                            'name' => 'Total Aduan 2020', 
                            'data' => LaporanTahunan::getBlueChart()
                        ],
                    //Black => Comparison 1
                        [
                            'name' => 'Total Aduan 2019', 
                            'data' => LaporanTahunan::getBlackChart()
                        ],
                    //Green => Comparison 2
                        [
                            'name' => 'Total Aduan 2018', 
                            'data' => LaporanTahunan::getGreenChart()
                        ],
                    ]
                ]
            ]);?>
            <div class="col-sm-4">
                <div class="description-block border-right">
                    <span class="description-percentage text-blue">Blue Data</span>
                    <h5 class="description-header">
                        <?php echo LaporanTahunan::getTotalBlue() ?>
                    </h5>
                    <span class="description-text">ADUAN TAHUN <?php echo date('Y'); ?></span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="description-block border-right">
                    <span class="description-percentage text-blck">Black Data</span>
                    <h5 class="description-header">
                        <?php echo LaporanTahunan::getTotalBlack()?>
                    </h5>
                    <span class="description-text">ADUAN TAHUN <?php echo date("Y",strtotime("-1 year")); ?></span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="description-block border-right">
                    <span class="description-percentage text-green">Green Data</span>
                    <h5 class="description-header">$35,210.43</h5>
                    <span class="description-text">ADUAN TAHUN KEMARIN</span>
                </div>
            </div>
		</div>
		<div class="box-footer">
            <div class="row">
    			<div class="col-sm-4">
    				<?= Html::a('Unduh Data', ['aduan/rekapitulasi'] ,['class' => 'btn btn-info btn-block']); ?>
    			</div>
    			<div class="col-sm-4">
    				<?= Html::a('Unduh Data', ['aduan/rekapitulasi'] ,['class' => 'btn bg-navy btn-block']); ?>
    			</div>
    			<div class="col-sm-4">
    				<?= Html::a('Unduh Data', ['aduan/rekapitulasi'] ,['class' => 'btn btn-success btn-block']); ?>
    			</div>
            </div>
            <div>&nbsp;</div>
            <div class="row">
                <div class="col-md-3"></div>
                <?php 
                $gridColumns = [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'type',
                    'tahun',
                    'status',
                    'januari',
                    'februari',
                    'maret',
                    'april',
                    'mei',
                    'juni',
                    'juli',
                    'agustus',
                    'september',
                    'oktober',
                    'november',
                    'desember',
                    'total',
                    ['class' => 'yii\grid\ActionColumn'],
                ];
                ?>
                <div class="col-md-6">
                    <div class="btn btn-block" style="
                    background-color: #dd4b39; 
                    border-color: #d73925;
                    ">
                        <?php
                        $searchModel = new LaporanTahunanSearch();
                        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                        echo ExportMenu::widget([
                            'dataProvider' => $dataProvider,
                            'columns' => $gridColumns,
                            'filename' => 'Data Statistik Laporan Tahunan',
                        ]); ?>
                    </div>
                </div>

                <div class="col-md-3"></div>
            </div>
		</div>
	</div>
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title"> Kategori Aduan </h3>
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
                        'title' => ['text' => 'Statistik Kategori Aduan Nasional'],
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
                        'title' => ['text' => 'Statistik Kategori Aduan Provinsi'],
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
		<div class="box-footer">
			<div class="col-md-6">
				<?= Html::a('Unduh Data Statistik Nasional',['aduan/rekapitulasi'],['class'=>'btn btn-primary btn-block']); ?>
			</div>
			<div class="col-md-6">
				<?= Html::a('Unduh Data Lokal Provinsi',['aduan/rekapitulasi'],['class'=>'btn btn-info btn-block']); ?>
			</div>
		</div>
	</div>
	<div class="box box-success">
		<div class="box-header">
			<h3 class="box-title">
				Data Status Aduan
			</h3>
		</div>
		<div class="box-body">
			<div class="col-md-10">
				<?= Highcharts::widget([
	               'options' => [
	               		'chart' => [
	               			'type' => 'column'
	               		],
	                    'title' => ['text' => 'Statistik Status Progres Aduan'],
	                    'xAxis' => [
	                        'categories' => [
	                            'Total Aduan'
	                        ],
	                        'crosshair' => true
	                    ],
	                 	'yAxis' => [
	                        'title' => ['text' => 'Data Tercapai']
	                  	],
	                  	'tooltip' => [
				        	'shared' => true,
				    	],
	                  	'series' => [
	                        [
	                            'name' => 'Terkirim', 
	                            'data' => [Aduan::getTerkirimCount()]
	                        ],
	                        [
	                            'name' => 'Diproses', 
	                            'data' => [Aduan::getDiprosesCount()]
	                        ],
	                        [

	                            'name' => 'Diterima', 
	                            'data' => [Aduan::getDiterimaCount()]
	                        ],
	                        [
	                            'name' => 'Ditolak', 
	                            'data' => [Aduan::getDitolakCount()]
	                        ]
	                    ]
	                ]
	            ]);?>
	        </div>
	        <div class="col-md-2">
	        	<div class="pad box-pane-right bg-green" style="min-height: 280px">
                    <div class="description-block margin-bottom">
                     	<div class="sparkbar pad" data-color="#fff">
                     		<canvas width="34" height="30" style="display: inline-block; width: 34px; height: 30px; vertical-align: top;">
                     		</canvas>
                     	</div>
                        <h5 class="description-header"><?= Aduan::getTerkirimCount() ?></h5>
                        <span class="description-text">Terkirim</span>
                    </div>
                    <!-- /.description-block -->
                    <div class="description-block margin-bottom">
                        <div class="sparkbar pad" data-color="#fff">
                            <canvas width="34" height="30" style="display: inline-block; width: 34px; height: 30px; vertical-align: top;"></canvas>
                        </div>
                        <h5 class="description-header"><?= Aduan::getDiprosesCount() ?></h5>
                        <span class="description-text">Diproses</span>
                    </div>
                    <!-- /.description-block -->
                    <div class="description-block">
                        <div class="sparkbar pad" data-color="#fff">
                            <canvas width="34" height="30" style="display: inline-block; width: 34px; height: 30px; vertical-align: top;"></canvas>
                        </div>
                        <h5 class="description-header"><?= Aduan::getDiterimaCount() ?></h5>
                        <span class="description-text">Diterima</span>
                    </div>
                    <!-- /.description-block -->
                    <div class="description-block">
                        <div class="sparkbar pad" data-color="#fff">
                            <canvas width="34" height="30" style="display: inline-block; width: 34px; height: 30px; vertical-align: top;"></canvas>
                        </div>
                        <h5 class="description-header"><?= Aduan::getDitolakCount() ?></h5>
                        <span class="description-text">Ditolak</span>
                    </div>
                    <!-- /.description-block -->
                </div>
            </div>
		</div>
	</div>
</div>