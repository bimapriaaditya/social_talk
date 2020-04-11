<?php 
use app\models\Masyarakat;
use app\models\User;
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback', 'style' => 'text-align:left;'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback', 'style' => 'text-align:left;'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-console form-control-feedback'></span>"
];

$fieldOptions3 = [
    'options' => ['class' => 'form-group has-feedback', 'style' => 'text-align:left;'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-phone-alt form-control-feedback'></span>"
];

$fieldOptions4 = [
    'options' => ['class' => 'form-group has-feedback', 'style' => 'text-align:left;'],
];

$fieldOptions5 = [
    'options' => ['class' => 'form-group has-feedback', 'style' => 'text-align:left;'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];

$fieldOptions6 = [
    'options' => ['class' => 'form-group has-feedback', 'style' => 'text-align:left;'],
];

$fieldOptions7 = [
    'options' => ['class' => 'form-group has-feedback', 'style' => 'text-align:left;'],
    'inputTemplate' => "{input}<span class='fa fa-map form-control-feedback'></span>"
];

$fieldOptions8 = [
    'options' => ['class' => 'form-group has-feedback', 'style' => 'text-align:left;'],
    'inputTemplate' => "{input}<span class='fa fa-map-signs form-control-feedback'></span>"
];

$fieldOptions9 = [
    'options' => ['class' => 'form-group has-feedback', 'style' => 'text-align:left;'],
    'inputTemplate' => "{input}<span class='fa fa-map-pin form-control-feedback'></span>"
];

$fieldOptions10 = [
    'options' => ['class' => 'form-group has-feedback', 'style' => 'text-align:left;'],
    'inputTemplate' => "{input}<span class='fa fa-envelope form-control-feedback'></span>"
];

$fieldOptions11 = [
    'options' => ['class' => 'form-group has-feedback', 'style' => 'text-align:left;'],
    'inputTemplate' => "{input}<span class='fa fa-lock form-control-feedback'></span>"
];

$fieldOptions12 = [
    'options' => ['class' => 'form-group has-feedback', 'style' => 'text-align:left;'],
    'inputTemplate' => "{input}<span class='fa fa-tasks form-control-feedback'></span>"
];

?>

<div class="register-box" style="text-align: center; width: 80%">
  <div class="register-logo">
    <b>Social-</b>REGISTER
  </div>

	<div class="register-box-body">
	    <p class="login-box-msg">Register a new membership</p>

	    <?php 
	    $Masyarakat = new Masyarakat();
	    $User = new User();
	    $form = ActiveForm::begin(); ?>


    	<div class="row">
    		<div class="col col-md-4">
    			<h3> Data Diri </h3>
    			<hr>
    			<?= $form->field($Masyarakat, 'nama', $fieldOptions1)->textInput(['placeholder' => 'Input Nama Lengkap']) ?>

			    	<?= $form->field($Masyarakat, 'nik', $fieldOptions2)->textInput(['placeholder' => 'Input Nomor Induk Keluarga'])?>

			    	<?= $form->field($Masyarakat, 'no_telepon', $fieldOptions3)->textInput(['placeholder' => 'Input No.Telepon'])?>

			    	<?= $form->field($Masyarakat, 'tanggal_lahir', $fieldOptions4)->widget(DatePicker::classname(),
						['name' => 'anniversary',
						'value' => '',
					    'readonly' => true,
					    'pluginOptions' => [
					        'autoclose'=>true,
					        'format' => 'yyyy-m-dd'
					    ]
					]) ?>

			    	<?= $form->field($Masyarakat, 'usia', $fieldOptions5)->textInput(['type' => 'number'], ['placeholder' => 'Input Usia']) ?>

			    	<?= $form->field($Masyarakat, 'img', $fieldOptions6)->fileInput() ?>

    		</div>
    		<div class="col col-md-4">
    			<h3> Alamat </h3>
    			<hr>
    			<?= $form->field($Masyarakat, 'id_provinsi', $fieldOptions7)->textInput(['placeholder' => 'Input Asal Provinsi']); ?>

		    	<?= $form->field($Masyarakat, 'id_kota', $fieldOptions8)->textInput(['placeholder' => 'Input Asal Kota']); ?>

		    	<?= $form->field($Masyarakat, 'alamat', $fieldOptions9)->textarea(['placeholder' => 'Input Alamat Tinggal', 'rows' => 5]); ?>
    		</div>
    		<div class="col col-md-4">
    			<h3>Buat Akun</h3>
    			<hr>
    			<?= $form->field($User, 'email', $fieldOptions10)->input('email',['placeholder' => $User->getAttributeLabel('Email')]); ?>

		    	<?= $form->field($User, 'password', $fieldOptions11)->textInput(['placeholder' => 'Masukan Password']); ?>

		    	<?= $form->field($User, 'role', $fieldOptions12)->textInput(['value' => '1', 'readonly' => true]); ?>
    		</div>
    	</div>
    	<div class="row">
    		<div class="col col-md-2"></div>
    		<div class="col col-md-8">
    			<?= Html::submitButton('save', ['class' => 'btn btn-primary btn-block btn-flat']); ?>
    		</div>
    		<div class="col col-md-2"></div>
    	</div>

	    <?php ActiveForm::end(); ?>
	    <div>&nbsp;</div>
	    <?= Html::a('<i>I already have a membership</i>',['/site/login'])?>
  	</div>
</div>