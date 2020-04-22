<?php 
use app\models\Aduan;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;

?>

<div class="box-footer box-comments">
    <div class="box-comment">
    <!-- User image -->
        <?= Html::img('@PetugasImgUrl/'.$model->petugas->img,['class'=>'img-circle img-sm']);?>
        <div class="comment-text">
            <span class="username">
                <?= Html::a($model->petugas->nama, ['aduan/view', 'id' => $model->id]); ?>
                <a href="">Edit</a>
                <a href="">Hapus</a>
                <span class="text-muted pull-right">8:03 PM Today</span>
            </span> <!-- /.username -->
            <?= $model->text ?>
        </div>
    <!-- /.comment-text -->
    </div>
    <!-- /.box-comment -->
</div>