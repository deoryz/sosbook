<?php
$this->breadcrumbs=array(
	'Groups'=>array('index'),
	'Add',
);

$this->menu=array(
	array('label'=>'List Group', 'icon'=>'th-list','url'=>array('index')),
);
?>

<h1>Add Group</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>