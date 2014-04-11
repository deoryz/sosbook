<?php
$this->breadcrumbs=array(
	'Sosbooks'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Sosbook','url'=>array('index')),
	array('label'=>'Add Sosbook','url'=>array('create')),
);
?>

<h1>Manage Sosbooks</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'sosbook-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'slug',
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
		),
	),
)); ?>
