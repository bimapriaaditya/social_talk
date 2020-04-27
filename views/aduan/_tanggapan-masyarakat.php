<?php 
use app\models\Aduan;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;

?>
<?php if ($model->id_masyarakat !== null): ?>
    <div class="box-footer box-comments">
        <div class="box-comment">
        <!-- User image -->
            <?= Html::img('@MasyarakatImgUrl/'.$model->masyarakat->img,['class'=>'img-circle img-sm']);?>
            <div class="comment-text">
                <span class="username">
                    <?= Html::a($model->masyarakat->nama, ['masyarakat/view', 'id' => $model->id_masyarakat]); ?>
                    <a href="" style="font-size: 75%; margin-left: 10px;">Edit</a>
                    <a href="" style="font-size: 75%;">Hapus</a>
                    <span class="text-muted pull-right">8:03 PM Today</span>
                </span> <!-- /.username -->
                <?= $model->text ?>
            </div>
        <!-- /.comment-text -->
        </div>
        <!-- /.box-comment -->
    </div>
<?php else: ?>
    <div class="box-footer box-comments">
        <div class="box-comment">
        <!-- User image -->            
            <?= Html::img('@PetugasImgUrl/'.$model->petugas->img,['class'=>'img-circle img-sm']);?>
            <div class="comment-text">
                <span class="username">
                    <?= Html::a($model->petugas->nama, ['petugas/view', 'id' => $model->id_petugas]); ?>
                    <a href="" style="font-size: 75%; margin-left: 10px;">Edit</a>
                    <a href="" style="font-size: 75%;">Hapus</a>
                    <span class="text-muted pull-right">8:03 PM Today</span>
                </span> <!-- /.username -->
                <?= $model->text ?>
            </div>
        <!-- /.comment-text -->
        </div>
        <!-- /.box-comment -->
    </div>
<?php endif ?>