<?php
$this->breadcrumbs=array(
	'Sosbooks'=>array('index'),
	// $model->title=>array('view','id'=>$model->id),
	'Edit',
);

$this->menu=array(
	array('label'=>'List Sosbook', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Sosbook', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Sosbook', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<h1>Edit Sosbook <?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>