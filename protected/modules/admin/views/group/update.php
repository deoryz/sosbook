<?php
$this->breadcrumbs=array(
	'Groups'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->menu=array(
	array('label'=>'List Group', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Group', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Group', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<h1>Edit Group <?php echo $model->group; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>