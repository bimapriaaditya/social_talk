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
                    <?php if ($model->id_masyarakat == Yii::$app->user->identity->id_masyarakat): ?>
                        <?= Html::a('Edit',['aduan-masyarakat/update/', 'id' => $model->id], ['style' => 'font-size: 75%; margin-left: 10px;']); ?>
                        <?= Html::a('Hapus', ['aduan-masyarakat/delete/', 'id' => $model->id], [
                            'style' => 'font-size:75%;',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    <?php endif ?>
                    <span class="text-muted pull-right"><?= $model->create_at ?></span>
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
                    <?php if ($model->id_petugas == Yii::$app->user->identity->id_petugas): ?>
                        <?= Html::a('Edit',['aduan-masyarakat/update/', 'id' => $model->id], ['style' => 'font-size: 75%; margin-left: 10px;']); ?>
                        <?= Html::a('Hapus', ['aduan-masyarakat/delete/', 'id' => $model->id], [
                            'style' => 'font-size:75%;',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    <?php endif ?>
                    <span class="text-muted pull-right">
                        <?= $model->create_at ?>
                    </span>
                </span> <!-- /.username -->
                <?= $model->text ?>
            </div>
        <!-- /.comment-text -->
        </div>
        <!-- /.box-comment -->
    </div>
<?php endif ?>