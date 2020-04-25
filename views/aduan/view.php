<?php

use app\models\Aduan;
use app\models\AduanMasyarakat;
use app\models\AduanPetugas;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Aduan */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Aduan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="aduan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if ($model->id_masyarakat == Yii::$app->user->identity->id_masyarakat || User::isPetugas()): ?>
        <p>
            <?php if ($model->id_masyarakat == Yii::$app->user->identity->id_masyarakat) {
                echo Html::a('<b> Perbarui </b> <i class="glyphicon glyphicon-edit"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
            } ?>
            <?= Html::a('<b> Hapus </b><i class="glyphicon glyphicon-trash"></i>', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php endif ?>

    <div class="box box-danger">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-sm-8">
                    <h3 class="box-title"> <?= $this->title = $model->nama; ?> </h3>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-2" style="text-align: right;">
                    <?php if (User::isPetugas()): ?>
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
                    <?php endif ?>
                </div>
            </div>
        </div>
        <div class="box-body">
            <p style="text-align: right;color:red;">
                <?php  
                echo 'Dibuat Oleh : '. Html::a($model->masyarakat->nama, ['masyarakat/view', 'id' => $model->id_masyarakat]);
                ?>
            </p>
            <p style="text-align: right;">
                <i class="glyphicon glyphicon-calendar"></i> <?= $model->tanggal ?>
            </p>
            <p style="text-align: right;">
                <?php 
                    if ($model->sifat == 1) {
                        echo "<i class='fa fa-globe' style='color:green; font-size:18px; '> Public</i>";
                    }else{
                        echo "<i class='fa fa-lock' style='color:red; font-size:18px; '> Private</i>";
                    }
                ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'label' => 'Kategori',
                        'value' => $model->kategori->nama
                    ],
                    [
                        'label' => 'Provinsi',
                        'value' => $model->provinsi->nama
                    ],
                    [
                        'label' => 'Kota',
                        'value' => $model->kota->nama
                    ],
                    'keterangan_tempat:ntext',
                    [
                        'label' => 'Sifat',
                        'value' => (($model->sifat == 1)? "Public" : "Private")
                    ],
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
                            <?= Html::img('@Bukti1ImgUrl/'.$model->img_bukti_1,['width' => '100%', 'height' => '100%']) ?>
                        </div>
                        <div class="col-sm-4">
                            <?= Html::img('@Bukti2ImgUrl/'.$model->img_bukti_2,['width' => '100%', 'height' => '100%']) ?>
                        </div>
                        <div class="col-sm-4">
                            <?= Html::img('@Bukti3ImgUrl/'.$model->img_bukti_3,['width' => '100%', 'height' => '100%']) ?>
                        </div>
                    </div>
                    <div class="box-footer">
                        <p>
                            <div class="row">
                                <div class="col-sm-4">
                                    <?php if ($model->img_bukti_1 == true): ?>
                                        <a href="<?= Yii::getAlias('@Bukti1ImgUrl') . '/' . $model->img_bukti_1 ?>" class="btn btn-primary btn-block"> Lihat Data <span class="fa fa-eye"></span> </a>
                                    <?php endif ?>
                                </div>
                                <div class="col-sm-4">
                                    <?php if ($model->img_bukti_2 == true): ?>
                                        <a href="<?= Yii::getAlias('@Bukti2ImgUrl') . '/' . $model->img_bukti_2 ?>" class="btn btn-primary btn-block"> Lihat Data <span class="fa fa-eye"></span> </a>
                                    <?php endif ?>
                                </div>
                                <div class="col-sm-4">
                                    <?php if ($model->img_bukti_3 == true): ?>
                                        <a href="<?= Yii::getAlias('@Bukti3ImgUrl') . '/' . $model->img_bukti_3 ?>" class="btn btn-primary btn-block"> Lihat Data <span class="fa fa-eye"></span> </a>
                                    <?php endif ?>
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
    <?php if ($model->sifat == 2): ?>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">KOLOM TANGGAPAN PETUGAS</h3>
                    </div>
                    <div class="box-body">
                        <?php
                        $dataProvider = new ActiveDataProvider([
                            'query' => AduanPetugas::find()
                                ->andWhere(['id_aduan' => $model->id])
                                ->orderBy(['tanggal' => SORT_DESC])
                        ]);
                        echo ListView::widget([
                            'dataProvider' => $dataProvider,
                            'itemView' => '_tanggapan-petugas',
                        ]);?>
                    </div>
                    <div class="box-footer">
                        <?php if (User::isPetugas() || $model->id_masyarakat = Yii::$app->user->identity->id_masyarakat): ?>
                            <label>Beri Tanggapan :</label>
                            <?php 
                            $lorem = new AduanPetugas();

                            $form = ActiveForm::begin([
                                'action' => ['/aduan-petugas/create']
                            ]);
                            ?>
                            <?= $form->field($lorem, 'id')
                                ->hiddenInput()
                                ->label(false) ?>

                            <?= $form->field($lorem, 'id_aduan')
                                ->hiddenInput(['value' => $model->id])
                                ->label(false) ?>

                            <?= $form->field($lorem, 'id_petugas')
                                ->hiddenInput(['value' => Yii::$app->user->identity->id_petugas])
                                ->label(false) ?>

                            <?= $form->field($lorem, 'id_masyarakat')
                                ->hiddenInput(['value' => Yii::$app->user->identity->id_masyarakat])
                                ->label(false) ?>

                            <?= $form->field($lorem, 'text')
                                ->textarea(['rows' => 6])
                                ->label(false) ?>

                            <?= $form->field($lorem, 'tanggal')
                                ->hiddenInput(['value' => date('Ymd')])
                                ->label(false) ?>

                            <div class="form-group">
                                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                            </div>
                            <?php ActiveForm::end(); ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    <?php endif ?>
    <?php if ($model->sifat == 1): ?>
        <div class="row">
            <!-- Comment Masyarakat -->
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">KOLOM TANGGAPAN MASYARAKAT</h3>
                    </div>
                    <div class="box-body">
                        <?php
                        $dataProvider2 = new ActiveDataProvider([
                            'query' => AduanMasyarakat::find()
                                ->andWhere(['id_aduan' => $model->id])
                                ->orderBy(['tanggal' => SORT_DESC])
                        ]);

                        echo ListView::widget([
                            'dataProvider' => $dataProvider2,
                            'itemView' => '_tanggapan-masyarakat',
                        ]);?>
                    </div>
                    <div class="box-footer">
                        <label>Beri Tanggapan :</label>
                        <?php 
                        $lorem = new AduanMasyarakat();

                        $form = ActiveForm::begin([
                            'action' => ['/aduan-masyarakat/create']
                        ]);?>

                        <?= $form->field($lorem, 'id')
                            ->hiddenInput()
                            ->label(false) ?>

                        <?= $form->field($lorem, 'id_aduan')
                            ->hiddenInput(['value' => $model->id])
                            ->label(false) ?>

                        <?= $form->field($lorem, 'id_masyarakat')
                            ->hiddenInput(['value' => Yii::$app->user->identity->id_masyarakat])
                            ->label(false) ?>

                        <?= $form->field($lorem, 'id_petugas')
                            ->hiddenInput(['value' => Yii::$app->user->identity->id_petugas])
                            ->label(false) ?>

                        <?= $form->field($lorem, 'text')
                            ->textarea(['rows' => 6])
                            ->label(false) ?>

                        <?= $form->field($lorem, 'tanggal')
                            ->hiddenInput(['value' => date('Ymd')])
                            ->label(false) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-block']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
            <!-- Comment Petugas dan Pelapor -->
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">KOLOM TANGGAPAN PETUGAS</h3>
                    </div>
                    <div class="box-body">
                        <?php
                        $dataProvider = new ActiveDataProvider([
                            'query' => AduanPetugas::find()
                                ->andWhere(['id_aduan' => $model->id])
                                ->orderBy(['tanggal' => SORT_DESC])
                        ]);
                        echo ListView::widget([
                            'dataProvider' => $dataProvider,
                            'itemView' => '_tanggapan-petugas',
                        ]);?>
                    </div>
                    <div class="box-footer">
                        <?php if (User::isPetugas() || $model->id_masyarakat == Yii::$app->user->identity->id_masyarakat): ?>
                            <label>Beri Tanggapan :</label>
                            <?php 
                            $lorem = new AduanPetugas();

                            $form = ActiveForm::begin([
                                'action' => ['/aduan-petugas/create']
                            ]);?>

                            <?= $form->field($lorem, 'id')
                                ->hiddenInput()
                                ->label(false) ?>

                            <?= $form->field($lorem, 'id_aduan')
                                ->hiddenInput(['value' => $model->id])
                                ->label(false) ?>

                            <?= $form->field($lorem, 'id_petugas')
                                ->hiddenInput(['value' => Yii::$app->user->identity->id_petugas])
                                ->label(false) ?>

                            <?= $form->field($lorem, 'id_masyarakat')
                                ->hiddenInput(['value' => Yii::$app->user->identity->id_masyarakat])
                                ->label(false) ?>

                            <?= $form->field($lorem, 'text')
                                ->textarea(['rows' => 6])
                                ->label(false) ?>

                            <?= $form->field($lorem, 'tanggal')
                                ->hiddenInput(['value' => date('Ymd')])
                                ->label(false) ?>

                            <div class="form-group">
                                <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-block']) ?>
                            </div>
                            <?php ActiveForm::end(); ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
</div>