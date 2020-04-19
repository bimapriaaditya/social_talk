<?php

use app\models\Aduan;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AduanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ruang Aduan Publik';
?>
<div class="container">
    <div class="aduan-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Buat Aduan', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>
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
</div>