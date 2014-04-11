<?php
$this->breadcrumbs=array(
	'Sosbooks',
);

$this->menu=array(
	array('label'=>'Add Sosbook', 'icon'=>'th-list','url'=>array('create')),
);
?>

<h1>Sosbooks</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'blog-form',
	'action'=>array('create'),
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'method'=>'get',
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
<?php echo $form->textField($model,'url',array('class'=>'span5', 'placeholder'=>'Masukkan URL di sini, untuk input baru')) ?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
	'buttonType'=>'submit',
	'type'=>'primary',
	'label'=>$model->isNewRecord ? 'Grab' : 'Save',
)); ?>
<?php $this->endWidget(); ?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'sosbook-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id',
		// 'slug',
		'category_id',
		'title',
		'content',
		'date_input',
		/*
		'date_update',
		'insert_by',
		'last_update_by',
		'meta_title',
		'meta_desc',
		'meta_key',
		'image',
		'active',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}'
		),
	),
)); ?>
