<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/asset/backend/css/style.css" />

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>
<?php $this->widget('bootstrap.widgets.TbNavbar',array(
	'collapse'=>true,
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>//MenuBackend::model()->createMenu(0,0),
            array(
                array('label'=>'Page', 'items'=>array(
                    array('label'=>'Home', 'url'=>array('/admin/setting/home'), 'visible'=>Common::checkAccess('admin.setting.home')),
                    array('label'=>'About', 'url'=>array('/admin/setting/about'), 'visible'=>Common::checkAccess('admin.setting.about')),
                    array('label'=>'Service', 'url'=>array('/admin/service/index'), 'visible'=>Common::checkAccess('admin.service.index')),
                    array('label'=>'Artikel', 'url'=>array('/admin/artikel/index'), 'visible'=>Common::checkAccess('admin.artikel.index')),
                    array('label'=>'Promotion', 'url'=>array('/admin/promotion/index'), 'visible'=>Common::checkAccess('admin.promotion.index')),
                    array('label'=>'Contact', 'url'=>array('/admin/setting/contact'), 'visible'=>Common::checkAccess('admin.setting.contact')),
                    array('label'=>'Our Location', 'url'=>array('/admin/setting/location'), 'visible'=>Common::checkAccess('admin.setting.location')),
                )),
            	array('label'=>'Setting', 'items'=>array(
                    array('label'=>'Setting Umum', 'url'=>array('/admin/setting/index'), 'active'=>($this->id=='admin/setting') ? TRUE : FALSE, 'visible'=>Common::checkAccess('admin.setting.index')),
                    array('label'=>'Slide', 'url'=>array('/admin/slide/index'), 'active'=>($this->id=='admin/slide') ? TRUE : FALSE, 'visible'=>Common::checkAccess('admin.slide.index')),
            		array('label'=>'Language', 'url'=>array('/admin/language/index'), 'active'=>($this->id=='admin/language') ? TRUE : FALSE, 'visible'=>Common::checkAccess('admin.language.index')),
            	)),
            ),
            
        ),
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>//MenuBackend::model()->createMenu(0,1),
            array(
        		array('label'=>'Change Password', 'url'=>array('/admin/user/edit')),
            	array('label'=>'Users', 'items'=>array(
            		array('label'=>'Users', 'url'=>array('/admin/user/index'), 'active'=>($this->id=='admin/user') ? TRUE : FALSE, 'visible'=>Common::checkAccess('admin.user.index')),
            		array('label'=>'Group', 'url'=>array('/admin/group/index'), 'active'=>($this->id=='admin/group') ? TRUE : FALSE, 'visible'=>Common::checkAccess('admin.group.index')),
            	)),
        		array('label'=>'Log Activity', 'url'=>array('/admin/setting/log'), 'active'=>($this->id=='admin/setting') ? TRUE : FALSE, 'visible'=>Common::checkAccess('admin.setting.log')),
            	array('label'=>'Root', 'items'=>array(
                    array('label'=>'Menu Akses', 'url'=>array('/admin/menuAkses/index'), 'active'=>($this->id=='admin/menuAkses') ? TRUE : FALSE, 'visible'=>Common::checkAccess('admin.menuAkses.index')),
            	)),
        		array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/admin/home/logout'), 'active'=>($this->id=='admin/home') ? TRUE : FALSE, 'visible'=>true),
            ),
        ),
    ),
    'brandUrl'=>Chtml::normalizeUrl(array('/admin/site/index')),
));

?>
<div style="height: 55px;"></div>
<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'homeLink'=>CHtml::link('Home',array('/admin/site/index')),
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by <?php echo Yii::app()->name ?>.<br/>
		All Rights Reserved.<br/>
		Developed By <a target="_blank" href="http://waroeng.web.id">Waroeng Web ID</a>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
