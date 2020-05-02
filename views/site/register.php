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
	    $form = ActiveForm::begin(); ?>

    	<div class="row">
    		<div class="col col-md-4">
    			<h3> Data Diri </h3>
    			<hr>
    			<?= $form->field($model, 'nama', $fieldOptions1)->textInput(['placeholder' => 'Input Nama Lengkap']) ?>

		    	<?= $form->field($model, 'nik', $fieldOptions2)->textInput(['placeholder' => 'Input Nomor Induk Keluarga'])?>

		    	<?= $form->field($model, 'no_telepon', $fieldOptions3)->textInput(['placeholder' => 'Input No.Telepon'])?>

		    	<?= $form->field($model, 'tanggal_lahir', $fieldOptions4)->widget(DatePicker::classname(),
					['name' => 'anniversary',
					'value' => '',
				    'readonly' => true,
				    'pluginOptions' => [
				        'autoclose'=>true,
				        'format' => 'yyyy-m-dd'
				    ]
				]) ?>

		    	<?= $form->field($model, 'usia', $fieldOptions5)->textInput(['type' => 'number'], ['placeholder' => 'Input Usia']) ?>
                
    		</div>
    		<div class="col col-md-4">
    			<h3> Alamat </h3>
    			<hr>
    			<?= $form->field($model, 'id_provinsi', $fieldOptions7)
                    ->textInput(['placeholder' => 'Input Asal Provinsi'])
                    ->label('Asal Provinsi'); ?>

		    	<?= $form->field($model, 'id_kota', $fieldOptions8)
                    ->textInput(['placeholder' => 'Input Asal Kota'])
                    ->label('Asal Kota'); ?>

		    	<?= $form->field($model, 'alamat', $fieldOptions9)
                    ->textarea(['placeholder' => 'Input Alamat Tinggal', 'rows' => 5]); ?>
    		</div>
    		<div class="col col-md-4">
    			<h3>Buat Akun</h3>
    			<hr>
    			<?= $form->field($model, 'email', $fieldOptions10)->input('email',['placeholder' => $model->getAttributeLabel('Email')]); ?>

		    	<?= $form->field($model, 'password', $fieldOptions11)->textInput(['placeholder' => 'Masukan Password']); ?>

		    	<?= $form->field($model, 'role')->hiddenInput(['value' => '1'])->label(false); ?>

                
    		</div>
    	</div>
        <div class="form-group">   
            <?= Html::submitButton('save', ['class' => 'btn btn-primary btn-block']); ?>
        </div>

	    <?php ActiveForm::end(); ?>
	    <div>&nbsp;</div>
	    <?= Html::a('<i>I already have a membership</i>',['/site/login'])?>
  	</div>
</div>