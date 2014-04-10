<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
)); ?>
<h2><?php echo 'Welcome to '.CHtml::encode(Yii::app()->name) ?></h2>

<?php $this->endWidget(); ?>
<div class="row">
	<div class="span12">
		<h3 style="margin: 0;">Page</h3>
		<ul class="thumbnails">
			<?php if (Common::checkAccess('admin.sosbook.index')): ?>
			<li class="span2">
				<a href="<?php echo CHtml::normalizeUrl(array('/admin/sosbook/index')) ?>" class="thumbnail">
					<div class="thumbnail">
						<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/icon/cutie_icon_set_preview_08.jpg" alt="">
						<p class="text-tengah less">Sosial bookmark</p>
					</div>
				</a>
			</li>
			<?php endif ?>
			<?php if (Common::checkAccess('admin.slide.index')): ?>
			<li class="span2">
				<a href="<?php echo CHtml::normalizeUrl(array('/admin/slide/index')) ?>" class="thumbnail">
					<div class="thumbnail">
						<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/icon/icon-slidekits-xl.png" alt="">
						<p class="text-tengah less">Slide</p>
					</div>
				</a>
			</li>
			<?php endif ?>
			<?php if (Common::checkAccess('admin.setting.index')): ?>
			<li class="span2">
				<a href="<?php echo CHtml::normalizeUrl(array('/admin/setting/index')) ?>" class="thumbnail">
					<div class="thumbnail">
						<img src="<?php echo Yii::app()->baseUrl ?>/asset/images/icon/cutie_icon_set_preview_19.jpg" alt="">
						<p class="text-tengah less">Setting Umum</p>
					</div>
				</a>
			</li>
			<?php endif ?>
		</ul>

	</div>

</div>