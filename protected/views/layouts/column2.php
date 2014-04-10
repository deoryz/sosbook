<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<section class="main-body">
  <div class="container">
  <div class="shout-box">
      <div class="shout-text">
          <h2><?php echo $this->setting['title'] ?></h2>
          <p><?php echo nl2br($this->setting['description']) ?></p>
      </div>
  </div>
  <div style="height: 20px;"></div>
  <div class="row-fluid">
	
    <div class="span8">

		<?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'links'=>$this->breadcrumbs,
                'homeLink'=>CHtml::link('Home', array('home/index')),
                'htmlOptions'=>array('class'=>'breadcrumb')
            )); ?><!-- breadcrumbs -->
        <?php endif?>
        
        <!-- Include content pages -->
        <?php echo $content; ?>

	</div><!--/span-->
    
    <div class="span4">
		<?php include_once('tpl_sidebar.php');?>
		
    </div><!--/span-->
  </div><!--/row-->
</div>
</section>


<?php $this->endContent(); ?>