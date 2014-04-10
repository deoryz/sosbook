<?php
$this->pageTitle = 'Kontak Findtoko - '.$this->pageTitle;
$this->breadcrumbs=array(
    'Kontak Findtoko',
);
?>
  	<div class="row-fluid">
        <div class="span12">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'artikel-form',
    'type'=>'horizontal',
    'enableAjaxValidation'=>false,
    'clientOptions'=>array(
        'validateOnSubmit'=>false,
    ),
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
        'class' => 'form-frontend'
    ),
)); ?>
    <h1>Kontak Findtoko</h1>
    <p class="help-block">Fields with <span class="required">*</span> are required.</p>
    <div class="height-10"></div>
    <?php echo $form->errorSummary($model); ?>
    <?php if(Yii::app()->user->hasFlash('success')): ?>
    
        <?php $this->widget('bootstrap.widgets.TbAlert', array(
            'alerts'=>array('success'),
        )); ?>
    
    <?php endif; ?>

    <?php echo $form->textFieldRow($model,'name',array('class'=>'span5')); ?>

    <?php echo $form->textFieldRow($model,'email',array('class'=>'span5')); ?>

    <?php echo $form->textFieldRow($model,'subject',array('class'=>'span5')); ?>

    <?php echo $form->textAreaRow($model,'body',array('class'=>'span5')); ?>
    <div class="control-group ">
        <label for="ContactForm_verifyCode" class="control-label">&nbsp;</label>
        <div class="controls">
            <?php $this->widget('CCaptcha', array(
                'imageOptions'=>array(
                    'style'=>'margin-bottom: 0px; margin-right: 10px;',
                ),
            )); ?>
        </div>
    </div>
    <?php echo $form->textFieldRow($model,'verifyCode',array('class'=>'span5')); ?>

    <div class="control-group ">
        <label for="ContactForm_subject" class="control-label">&nbsp;</label>
        <div class="controls">
            <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',
                // 'type'=>'primary',
                'label'=>Yii::t('main','Send Message'),
            )); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>

        </div>
    </div>
        
       
