<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'blog-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php if(Yii::app()->user->hasFlash('success')): ?>
	
	    <?php $this->widget('bootstrap.widgets.TbAlert', array(
	        'alerts'=>array('success'),
	    )); ?>
	
	<?php endif; ?>

	<?php Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget'); ?>
	<?php $this->widget('ImperaviRedactorWidget', array(
	    'selector' => '.redactor',
	    'options' => array(
	        // 'imageUpload'=> $this->createUrl('/admin/setting/imageUpload', array('type'=>'image')),
	        // 'clipboardUploadUrl'=> $this->createUrl('/admin/setting/imageUpload', array('type'=>'clip')),
	        'imageUpload'=>$this->createUrl('/admin/setting/imageUpload'),
	        'imageUploadErrorCallback'=>'js:function(obj, json){ alert(json.error); }', // function to show upload error to user

	        'fileUpload'=>$this->createUrl('/admin/setting/fileUpload'),
	        'fileUploadErrorCallback'=>'js:function(obj, json){ alert(json.error); }',
	    ),
	    'plugins' => array(
	        // 'fullscreen' => array(
	        //     'js' => array('fullscreen.js',),
	        // ),
	        'clips' => array(
	            // You can set base path to assets
	            // 'basePath' => 'application.components.imperavi.my_plugin',
	            // or url, basePath will be ignored.
	            // Defaults is url to plugis dir from assets
	            // 'baseUrl' => '/js/my_plugin',
	            // 'css' => array('clips.css',),
	            // 'js' => array('clips.js',),
	            // add depends packages
	            // 'depends' => array('imperavi-redactor',),
	        ),
	    ),
	)); ?>

	<?php //echo $form->textFieldRow($model, 'writer', array('class'=>'span5')); ?>

	<?php echo Common::createFormDatePick('Date Input', 'Date', 'date', $model->date_input) ?>
	
	<?php echo $form->textFieldRow($model,'title',array('class'=>'span5')) ?>

	<?php echo $form->textFieldRow($model,'tag',array('class'=>'span5')) ?>

	<?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
	<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/asset/js/tagit/source/css/jquery.tagit.css'); ?>
	<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/asset/js/tagit/source/css/jquery.ui.css'); ?>
	<?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/asset/js/tagit/source/css/tagit.ui-zendesk.css'); ?>
	<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/asset/js/tagit/source/js/tag-it.min.js'); ?>
	<script type="text/javascript">
		$('#Blog_tag').tagit({
			allowSpaces: true,
			showAutocompleteOnFocus: true,
			autocomplete: {delay: 0, minLength: 0},
			availableTags: [<?php echo Blog::model()->getTag() ?>],
		});
	</script>
	<?php echo $form->textFieldRow($model,'slug',array('class'=>'span5')) ?>

	<p>
	        <?php $get['slug'] = $model->slug; ?>
	        <?php $get['year'] = date("Y", strtotime($model->date_input)); ?>
	        <?php $get['month'] = date("n", strtotime($model->date_input)); ?>
		<a href="<?php echo Yii::app()->request->hostInfo . $this->createUrl('/blog/detail', $get); ?>" target="_blank">
			<?php echo Yii::app()->request->hostInfo . $this->createUrl('/blog/detail', $get); ?>
		</a>
	</p>

	<?php echo $form->textAreaRow($model,'content',array('class'=>'span5 redactor')) ?>

	<?php echo $form->dropDownListRow($model, 'active', array(
		'1'=>'Active',
		'0'=>'Deactive',
	)); ?>

	<?php echo $form->dropDownListRow($model, 'meta_setting', array(
		'0'=>'Deactive',
		'1'=>'Active',
	)); ?>

	<?php echo $form->textFieldRow($model,'meta_title',array('class'=>'span5')) ?>

	<?php echo $form->textAreaRow($model,'meta_desc',array('class'=>'span5')) ?>

	<?php echo $form->textFieldRow($model,'meta_key',array('class'=>'span5')) ?>


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
<script type="text/javascript">
if (typeof RedactorPlugins === 'undefined') var RedactorPlugins = {};

RedactorPlugins.advanced = {
    init: function()
    {
        alert(1);
    }
}
</script>
<script type="text/javascript">
function convertToSlug(Text)
{
    return Text
        .toLowerCase()
        .replace(/[^\w ]+/g,'')
        .replace(/ +/g,'-')
        ;
}
$('#Blog_title').keyup(function() {
	// alert('ok');
	$('#Blog_slug').val(convertToSlug($(this).val()));
})
</script>
