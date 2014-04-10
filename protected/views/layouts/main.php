<!-- Require the header -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php
      Yii::app()->clientScript->registerCoreScript('jquery');
    ?>
    
    <!-- the styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/asset/hebo/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/asset/hebo/css/bootstrap-responsive.min.css">
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Pontano+Sans'>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/asset/hebo/js/nivo-slider/themes/default/default.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/asset/hebo/js/nivo-slider/nivo-slider.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/asset/hebo/js/lightbox/css/lightbox.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/asset/hebo/css/template.css">   
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl;?>/asset/hebo/css/style1.css" />
    <link rel="alternate stylesheet" type="text/css" media="screen" title="style2" href="<?php echo Yii::app()->baseUrl;?>/asset/hebo/css/style2.css" />
    <link rel="alternate stylesheet" type="text/css" media="screen" title="style3" href="<?php echo Yii::app()->baseUrl;?>/asset/hebo/css/style3.css" />
    <link rel="alternate stylesheet" type="text/css" media="screen" title="style4" href="<?php echo Yii::app()->baseUrl;?>/asset/hebo/css/style4.css" />
    <link rel="alternate stylesheet" type="text/css" media="screen" title="style5" href="<?php echo Yii::app()->baseUrl;?>/asset/hebo/css/style5.css" />
    <link rel="alternate stylesheet" type="text/css" media="screen" title="style6" href="<?php echo Yii::app()->baseUrl;?>/asset/hebo/css/style6.css" />
    
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/asset/hebo/js/swfobject/swfobject.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/asset/hebo/js/lightbox/js/lightbox.js"></script>
    <?php /*
    <!-- style switcher -->
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/asset/hebo/js/styleswitcher.js"></script>
    */ ?>
    

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    

    <!-- The fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl;?>/asset/images/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo Yii::app()->baseUrl;?>/asset/hebo/img/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo Yii::app()->baseUrl;?>/asset/hebo/img/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo Yii::app()->baseUrl;?>/asset/hebo/img/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo Yii::app()->baseUrl;?>/asset/hebo/img/ico/apple-touch-icon-57-precomposed.png">

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta content="<?php echo CHtml::encode($this->metaDesc); ?>" Name="description"/>
    <meta content="<?php echo CHtml::encode($this->metaKey); ?>" name='keywords'/>
    <meta content='1 days' name='revisit-after'/>
    <meta content='Global' name='Distribution'/>
    <meta content='General' name='Rating'/>
    <meta content="<?php echo Yii::app()->name ?>" name='author'/>

    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo CHtml::encode($this->pageTitle); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php echo Yii::app()->request->hostInfo . Yii::app()->request->baseUrl . '/' . Yii::app()->request->pathInfo ?>" />
    <?php if ($this->metaImage != ''): ?>
    <meta property="og:image" content="<?php echo ($this->metaImage); ?>" />
    <?php endif ?>
    <meta property="og:description" content="<?php echo CHtml::encode($this->metaDesc); ?>" />
  
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-49504752-1', 'findtoko.com');
      ga('send', 'pageview');

    </script>

    <meta property="fb:app_id" content="519924948074048" />
  </head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/all.js#xfbml=1&appId=519924948074048";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<section id="header">
<!-- Include the header bar -->
    <div class="container">
    <div class="row-fluid">

      <div class="span4">
            <a href="<?php echo CHtml::normalizeUrl(array('/home/index')); ?>" class="logo">
                <img src="<?php echo Yii::app()->baseUrl ?>/asset/images/logo-findtoko.png" alt="">
            </a>
      </div><!--/.span6 -->
      
      <div class="span8">
        <div class="social-icons pull-right clearfix">
            
            <div class="header-text" style="float: right;">Donasi Ke BCA 3250703391</div>
            <div class="clear"></div>
            <div style="float: right;">
                <div  style="line-height: 20px;" class="fb-like" data-href="http://findtoko.com/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>

                <a href="https://twitter.com/share" data-url="http://findtoko.com/" class="twitter-share-button" data-via="twitterapi" data-lang="en">Tweet</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

                <!-- Place this tag where you want the +1 button to render. -->
                <div class="g-plusone" data-href="http://findtoko.com/" data-size="medium"></div>

                <!-- Place this tag after the last +1 button tag. -->
                <script type="text/javascript">
                  (function() {
                    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                    po.src = 'https://apis.google.com/js/platform.js';
                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                  })();
                </script>            
                <!-- Place this tag where you want the share button to render. -->
                <div class="g-plus" data-href="http://findtoko.com/" data-action="share" data-annotation="bubble"></div>

                <!-- Place this tag after the last share tag. -->
                <script type="text/javascript">
                  (function() {
                    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                    po.src = 'https://apis.google.com/js/platform.js';
                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                  })();
                </script>
            </div>
            <div class="clear"></div>

        </div><!--/.social-icons -->
       
      </div><!--/.span6 -->
    </div><!--/.row-fluid header -->
    </div>
<!-- /.container -->  
</section><!-- /#header -->

<!-- Require the navigation -->

<section id="navigation-main">  
<div class="navbar">
    <div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
  
          <div class="nav-collapse">
            <?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
                    'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>
                    
                    array(
                        array('label'=>'Home', 'url'=>array('/home/index'),'linkOptions'=>array("data-description"=>"Our home page"),),
                        array('label'=>'Blog', 'url'=>array('/blog/index'),'linkOptions'=>array("data-description"=>"Blog kami"),),
                        array('label'=>'Tetang Kami', 'url'=>array('/about/index'),'linkOptions'=>array("data-description"=>"Sedikit penjelasan siapa kami"),),
                        array('label'=>'Kontak Kami', 'url'=>array('/contact/index'),'linkOptions'=>array("data-description"=>"Hubungi kami jika ada yang bisa kami bantu"),),
                    ),
                    
                    /*
                    
                    array(
                        array('label'=>'Home <span class="caret"></span>', 'url'=>array('/site/index'),'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>"our home page"), 
                        'items'=>array(
                            array('label'=>'Home 1 - Nivoslider', 'url'=>array('/site/index')),
                            array('label'=>'Home 2 - Bootstrap carousal', 'url'=>array('/site/page', 'view'=>'home2')),
                            array('label'=>'Home 3 - Piecemaker2', 'url'=>array('/site/page', 'view'=>'home3')),
                            array('label'=>'Home 4 - Static image', 'url'=>array('/site/page', 'view'=>'home4')),
                            array('label'=>'Home 5 - Video header', 'url'=>array('/site/page', 'view'=>'home5')),
                            array('label'=>'Home 6 - Without slider', 'url'=>array('/site/page', 'view'=>'home6')),
                        )),
                        array('label'=>'Styles <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>"6 styles"), 
                        'items'=>array(
                            array('label'=>'<span class="style" style="background-color:#0088CC;"></span> Style 1', 'url'=>"javascript:chooseStyle('none', 60)"),
                            array('label'=>'<span class="style" style="background-color:#e42e5d;"></span> Style 2', 'url'=>"javascript:chooseStyle('style2', 60)"),
                            array('label'=>'<span class="style" style="background-color:#c80681;"></span> Style 3', 'url'=>"javascript:chooseStyle('style3', 60)"),
                            array('label'=>'<span class="style" style="background-color:#51a351;"></span> Style 4', 'url'=>"javascript:chooseStyle('style4', 60)"),
                            array('label'=>'<span class="style" style="background-color:#b88006;"></span> Style 5', 'url'=>"javascript:chooseStyle('style5', 60)"),
                            array('label'=>'<span class="style" style="background-color:#f9630f;"></span> Style 6', 'url'=>"javascript:chooseStyle('style6', 60)"),
                        )),
                        
                        array('label'=>'Features <span class="caret"></span>', 'url'=>array('/site/page', 'view'=>'columns'),'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>"cool features"), 
                        'items'=>array(
                            array('label'=>'Columns', 'url'=>array('/site/page', 'view'=>'columns')),
                            array('label'=>'Pricing tables', 'url'=>array('/site/page', 'view'=>'pricing-tables')),
                            array('label'=>'UI Elements', 'url'=>array('/site/page', 'view'=>'elements')),
                        )),

                        array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about'),'linkOptions'=>array("data-description"=>"what we are about"),),
                       
                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest,'linkOptions'=>array("data-description"=>"member area")),
                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest,'linkOptions'=>array("data-description"=>"member area")),
                    ), */
                )); ?>
        </div>
    </div>
    </div>
</div>
</section><!-- /#navigation-main -->

<!-- Include content pages -->
<?php echo $content; ?>

<!-- Require the footer -->
<section id="bottom" class="">
    <div class="container bottom"> 
        <div class="row-fluid ">
            <div class="span3">
                <h5>Tentang Kami</h5>
                <p>Kami adalah seseorang yang ingin membagikan sesuatu yang bermanfaat bagi pengunjung website ini, sehingga kami bisa mendapatkan</p>
                
                <p>Kami tidak di bayar untuk menuliskan semua artikel di sini, tapi kami sangat menikmatinya bila website ini sangat bermanfaat bagi anda</p>
                
            </div><!-- /span3-->
            
            <div class="span3">
                <h5>Artikel terbaru</h5>
                <ul class="list-blog-roll">
                <?php $newBlog = Blog::model()->getAllData(6, false, $this->languageID); ?>
                <?php foreach ($newBlog as $key => $value): ?>
                    <li>
                      <a href="<?php echo $this->createUrl('blog/detail', array('year'=>date('Y', strtotime($value->date_input)), 'month'=>date('n', strtotime($value->date_input)), 'slug'=>$value->slug)); ?>" title="<?php echo $value->title ?>">
                        <?php echo $value->title ?>
                      </a>
                    </li>
                <?php endforeach ?>
                    <li>
                        <a href="<?php echo CHtml::normalizeUrl(array('blog/index')); ?>" title="Example blog article">Lihat yang lain ....</a> 
                    </li>
                </ul>
                
            </div><!-- /span3-->
            
            <div class="span3">
                <h5>Follow us</h5>
                <ul>
                    <li><a href="#">Facebook Group</a></li>
                    <li><a href="#">Facebook Fans Page</a></li>
                    <li><a href="#">Twitter</a></li>
                
                </ul>
            </div><!-- /span3-->
            
            <div class="span3">
                <h5>Donasi</h5>
                <p>
                    Bila website ini sangat bermanfaat bagi anda, anda dapat memberikan donasi melalui rekening di bawah ini <br>
                    BCA: <br> 3250703391 <br> a/n Deory Pandu Putra Wahyu
                </p>
            </div><!-- /span3-->
        </div><!-- /row-fluid -->
        </div><!-- /container-->
</section><!-- /bottom-->

<footer>
    <div class="footer">
        <div class="container">
            Copyright &copy; <?php echo date("Y") ?>. Developed by <a href="http://waroeng.web.id" target="_blank">waroeng.web.id</a>
        </div>
    </div>
</footer>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="<?php echo Yii::app()->baseUrl;?>/asset/hebo/js/bootstrap-transition.js"></script>
    <script src="<?php echo Yii::app()->baseUrl;?>/asset/hebo/js/bootstrap-alert.js"></script>
    <script src="<?php echo Yii::app()->baseUrl;?>/asset/hebo/js/bootstrap-modal.js"></script>
    <script src="<?php echo Yii::app()->baseUrl;?>/asset/hebo/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo Yii::app()->baseUrl;?>/asset/hebo/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo Yii::app()->baseUrl;?>/asset/hebo/js/bootstrap-tab.js"></script>
    <script src="<?php echo Yii::app()->baseUrl;?>/asset/hebo/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo Yii::app()->baseUrl;?>/asset/hebo/js/bootstrap-popover.js"></script>
    <script src="<?php echo Yii::app()->baseUrl;?>/asset/hebo/js/bootstrap-button.js"></script>
    <script src="<?php echo Yii::app()->baseUrl;?>/asset/hebo/js/bootstrap-collapse.js"></script>
    <script src="<?php echo Yii::app()->baseUrl;?>/asset/hebo/js/bootstrap-carousel.js"></script>
    <script src="<?php echo Yii::app()->baseUrl;?>/asset/hebo/js/bootstrap-typeahead.js"></script>   
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>


  </body>
</html>
