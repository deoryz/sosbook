<div class="form-signin">
	<div class="lg-backendssc" align="center">
		<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/logo-findtoko.png" />
	</div>
	<div style="height: 1px;"></div>
	<h3 class="form-signin-heading">Please sign in</h3>
	<?php /** @var BootActiveForm $form */
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	    'id'=>'verticalForm',
	    //'htmlOptions'=>array('class'=>'well'),
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>
	 
	<?php echo $form->textFieldRow($model, 'username', array('class'=>'span3')); ?>
	<?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span3')); ?>
	<?php echo $form->checkboxRow($model, 'rememberMe'); ?>
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Login')); ?>
	 
	<?php $this->endWidget(); ?>
</div>
