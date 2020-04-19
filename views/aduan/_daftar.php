<?php 
use app\models\Aduan;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ListView;

?>

<div class="box box-widget" style="border-radius: 20px;">
  <div class="box-header with-border">
    <div class="user-block">
       <?php 
       echo Html::img('@MasyarakatImgUrl/' . $model->masyarakat->img, ['class' => 'img-circle']); ?>
      <span class="username">
          <?= Html::a($model->nama, ['aduan/view', 'id' => $model->id]); ?>
      </span>
      <span class="username">
          <?= Html::a('By : '.$model->masyarakat->nama,['masyarakat/view', 'id' => $model->id_masyarakat],['style' => 'font-size:75%;']); ?>
      </span>
      <span class="description">Dibuat <?= $model->tanggal ?></span>
    </div>
    <!-- /.user-block -->
    <div class="box-tools">
      <?= Html::a('<i class="fa fa-share"></i>', ['aduan/view', 'id' => $model->id]); ?>
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
    <!-- /.box-tools -->
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <!-- post text -->
    <p>
        <?= $model->provinsi->nama . '  ' . '-' . '  ' . $model->kota->nama ?>
    </p>
    <p>
        <?= $model->deskripsi ?>
    </p>

    <!-- Attachment -->
    <div class="attachment-block clearfix">
      <?= Html::img('@Bukti1ImgUrl/'.$model->img_bukti_1,['width' => '100px', 'height' => '100px']) ?>
      <span style="padding-left: 10px;"></span>

      <?= Html::img('@Bukti2ImgUrl/'.$model->img_bukti_2,['width' => '100px', 'height' => '100px']) ?>
      
      <span style="padding-left: 10px;"></span>
      <?= Html::img('@Bukti3ImgUrl/'.$model->img_bukti_3,['width' => '100px', 'height' => '100px']) ?>
      <!-- /.attachment-pushed -->
    </div>
    <!-- /.attachment-block -->
    <span class="pull-right text-muted">45 likes - 2 comments</span>
  </div>
</div>