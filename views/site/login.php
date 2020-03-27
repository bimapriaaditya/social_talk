<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Sign In';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box">
    <div class="login-logo">
        <a href="#">Social<b>Talk</b></a>
        <hr>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body" style="border-radius: 10%;">
        <p class="login-box-msg">Sign in to start your session</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>
        <label>Email :</label>
        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->input('email',['placeholder' => $model->getAttributeLabel('Email')]) ?>
        <label>Password :</label>
        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        
        <div>&nbsp;</div>
        <div class="social-auth-links text-center">
            <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
        </div>
        <!-- /.social-auth-links -->

        <?= Html::a('<i>Register a new membership</i>',['/site/register'])?>

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
<?php ActiveForm::end(); ?>