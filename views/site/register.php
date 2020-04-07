<?php 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\User;

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];

?>

<div class="register-box">
  <div class="register-logo">
    <b>Social-</b>REGISTER
  </div>

	<div class="register-box-body" style="border-radius: 10%;">
	    <p class="login-box-msg">Register a new membership</p>

	    <?php $model = new User(); 
	    $form = ActiveForm::begin(); ?>

	    <div class="form-group has-feedback">
	    	<?= $form->field($model, 'email', $fieldOptions1)->textInput(['placeholder' => 'Email']) ?>
		</div>

	    <div class="form-group has-feedback">
	        <?= $form->field($model, 'password', $fieldOptions2)->textInput(['placeholder' => 'Password']) ?>
	   	</div>

	    <div>&nbsp;</div>
	    <div class="social-auth-links text-center">
	    	<button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
	    </div>
	    <?= Html::a('<i>I already have a membership</i>',['/site/login'])?>
  	</div>
</div>