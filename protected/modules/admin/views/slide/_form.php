<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'slide-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php 
	// foreach ($modelDesc as $key => $value): 
	// 	echo $form->errorSummary($value); 
	// endforeach
	?>
	<?php if(Yii::app()->user->hasFlash('success')): ?>
	
	    <?php $this->widget('bootstrap.widgets.TbAlert', array(
	        'alerts'=>array('success'),
	    )); ?>
	
	<?php endif; ?>
	<?php	$tabs = array();
	// foreach ($modelDesc as $key => $value) {
	// 	$lang = Language::model()->getName($key);
	// 	$tabs[] = array('label'=>$lang->name, 'content'=>
	//         // $form->textFieldRow($value,'['.$lang->code.']desc',array('class'=>'span5','maxlength'=>100))
	//         $form->textAreaRow($value,'['.$lang->code.']desc',array('class'=>'span5', 'rows'=>'5'))
	//         , 'active'=>($key=='id')?TRUE:false,
	//     );
	// 	// $this->widget('application.extensions.extckeditor.ExtCKEditor', array(
	// 	// 	'model'=>$value,
	// 	// 	'attribute'=>'['.$lang->code.']content', // model atribute
	// 	// 	'editorTemplate'=>'full', // Toolbar settings (full, basic, advanced)
	// 	// 	'return'=>TRUE, // Toolbar settings (full, basic, advanced)
	// 	// 	//'contentCSS'=>Yii::app()->baseUrl.'/asset/images/de_font2.css'
	// 	// ));
	// }
	?>
	<?php 
	// $this->widget('bootstrap.widgets.TbTabs', array(
	//     'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
	//     'placement'=>'above', // 'above', 'right', 'below' or 'left'
	//     'tabs'=>$tabs,
	// )); 
	?>

	<?php echo $form->fileFieldRow($model,'image',array(
	'hint'=>'<b>Note:</b> Ukuran gambar adalah 1280 x 830px. Gambar yang lebih besar akan ter-crop otomatis')); ?>
	<?php if ($model->scenario == 'update'): ?>
	<div class="control-group">
		<label class="control-label">&nbsp;</label>
		<div class="controls">
		<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(300,300, '/images/slide/'.$model->image , array('method' => 'resize', 'quality' => '90')) ?>"/>
		</div>
	</div>
	<?php endif; ?>

	<?php // echo $form->textFieldRow($model,'url',array('class'=>'span5','maxlength'=>225)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Add' : 'Save',
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			// 'buttonType'=>'submit',
			// 'type'=>'info',
			'url'=>CHtml::normalizeUrl(array('index')),
			'label'=>'Batal',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
