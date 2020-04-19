<?php 

use yii\helpers\Html;


?>

<div class="post">
    <div class="user-block">
        <h3>
            <?= $model->nama ?>
        </h3>
        <span class="description">Diunggah  - <?= $model->tanggal ?></span>
    </div>
    <p>
        <?= substr($model->deskripsi, 0, 255) . '...'; ?>
    </p>
    <div class="col-sm-4">
        <?= Html::a('Lebih <i class="glyphicon glyphicon-eye-open"></i>',['aduan/view', 'id' => $model->id], ['class' => 'btn btn-primary btn-block']) ?>
    </div>
    <div class="col-sm-4">
        <?= Html::a('Perbaiki <i class="glyphicon glyphicon-edit"></i>',['aduan/update', 'id' => $model->id], ['class' => 'btn btn-success btn-block']) ?>
    </div>
    <div class="col-sm-4">
        <?= Html::a('Hapus <i class="glyphicon glyphicon-trash"></i>', ['aduan/delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-block',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div>&nbsp;</div>
</div>