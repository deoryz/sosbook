<?php
$this->breadcrumbs=array(
	'Blog',
);

$this->menu=array(
	array('label'=>'Add Blog', 'icon'=>'th-list','url'=>array('create')),
);
?>

<h1>Blog</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'promotion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'enableSorting'=>false,
	'columns'=>array(
		array(
            'name'=>'title',
        ),    
	// array(
//           'name'=>'writer',
//       ),    
		array(
			'name'=>'date_input',
			'filter'=>false,
		),
		array(
			'name'=>'date_update',
			'filter'=>false,
		),
		array(
			'name'=>'insert_by',
		),
		array(
			'name'=>'last_update_by',
		),
		array(
			'name'=>'active',
			'filter'=>array(
				'0'=>'Non Active',
				'1'=>'Active',
			),
			'type'=>'raw',
			'value'=>'($data->active == "1") ? "Active" : "Non Active"',
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}'
		),
	),
)); ?>