    <?php
$this->breadcrumbs=array(
    'Blog',
);

    ?>
    <?php /*
    <div class="shout-box">
        <div class="shout-text">
            <h2>Findtoko, Cara Membuat Toko Online</h2>
            <p>Tips dan trik bagaimana berbelanja online dengan aman, cara membuat toko online, <br>cara mendapatkan kepercayaan dari customer,
            cara membangun bisnis yang baik
            </p>
        </div>
    </div>
    */ ?>

  	<div class="row-fluid">
        <div class="span12">
            <?php
            $get = $_GET;
            ?>
            <?php foreach ($model as $key => $value): ?>
            <?php unset($get['page']) ?>
            <?php $get['slug'] = $value->slug; ?>
            <?php $get['year'] = date("Y", strtotime($value->date_input)); ?>
            <?php $get['month'] = date("n", strtotime($value->date_input)); ?>
            <h1><a href="<?php echo $this->createUrl('blog/detail', $get); ?>"><?php echo $value->title ?></a></h1>
            <p><?php echo date('d F Y H:i:s', strtotime($value->date_input)) ?> by <a href="#"><?php echo $value->writer_name ?></a></p>
            <?php echo $value->content ?>
            <hr>
            <?php endforeach ?>
            <?php $this->widget('CLinkPager', array(
                'pages' => $pages,
            )) ?>
            <hr>
        </div>
        <?php /*
        <div class="span4">

            <h3 class="header">Arsip
                <span class="header-line"></span> 
            </h3>
            <ul class="list-icon">
                <?php foreach ($listBlog as $key => $value): ?>
                <?php foreach ($value as $k => $v): ?>
                <li <?php if ($key == $_GET['year'] AND $k == $_GET['month']): ?>class="active"<?php endif ?>><a href="<?php echo CHtml::normalizeUrl(array('blog/index', 'year'=>$key, 'month'=>$k)); ?>"><?php echo Yii::app()->locale->getMonthName($k) ?> <?php echo $key ?></a></li>
                <?php endforeach ?>
                <?php endforeach ?>
            </ul>
            <h3 class="header">Tag
                <span class="header-line"></span> 
            </h3>
            <ul class="list-icon">
              <?php foreach ($tag as $key => $value): ?>
                <li <?php if ($value['slug'] == $_GET['tag']): ?>class="active"<?php endif ?>><a href="<?php echo CHtml::normalizeUrl(array('blog/index', 'tag'=>$value['slug'])); ?>"><?php echo $value['tag'] ?></a></li>
              <?php endforeach ?>

            </ul>
            <h3 class="header">Menu
                <span class="header-line"></span> 
            </h3>
            <ul class="list-icon">
                <li><a href="<?php echo CHtml::normalizeUrl(array('home/index')); ?>">Home</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('blog/index')); ?>">Blog</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('about/index')); ?>">Tentang Kami</a></li>
                <li><a href="<?php echo CHtml::normalizeUrl(array('contact/index')); ?>">Kontak Kami</a></li>

            </ul>
            <h3 class="header">Artikel Terbaru
                <span class="header-line"></span> 
            </h3>
              <ul class="list-icon">
                <?php foreach ($newBlog as $key => $value): ?>
                <li><a href="#"><?php echo $value->title ?></a></li>
                <?php endforeach ?>
                <li><a href="<?php echo CHtml::normalizeUrl(array('blog/index')); ?>">Lihat yang lain ....</a></li>
                
              </ul>

        </div>
        */ ?>
    </div>
        
       
         <?php /*
    <h3 class="header">Artikel Terbaru
        <span class="header-line"></span> 
    </h3>
        
      <div class="row-fluid">
        <div class="span4">
          
         </div>
         <div class="span4">
          	<div class="showcase-small">
                <div class="text-icon pull-left">
                <img src="<?php echo Yii::app()->baseUrl;?>/asset/images/user.jpg" alt="user" />
                </div>
                <h4>Anonymous</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          	</div>
            <div class="showcase-small">
                <div class="text-icon pull-left">
                <img src="<?php echo Yii::app()->baseUrl;?>/asset/images/user.jpg" alt="user" />
                </div>
                <h4>Anonymous</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          	</div>
          </div>
          <div class="span4">
          	<div class="showcase-small">
                <div class="text-icon pull-left">
                <img src="<?php echo Yii::app()->baseUrl;?>/asset/images/user.jpg" alt="user" />
                </div>
                <h4>Deory Pandu</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          	</div>
            <div class="showcase-small">
                <div class="text-icon pull-left">
                <img src="<?php echo Yii::app()->baseUrl;?>/asset/images/user.jpg" alt="user" />
                </div>
                <h4>Ibnu</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          	</div>
          </div>
        
      </div>
          */ ?>
      
      <?php /*
      <h3 class="header">Our writer
      	<span class="header-line"></span>  
      </h3>
      <div class="row-fluid center customers">
        <div class="span3 ">
            <img src="<?php echo Yii::app()->baseUrl;?>/asset/hebo/img/customers/themeforest.png" alt="Themeforest" />
        </div>
        <div class="span3">
            <img src="<?php echo Yii::app()->baseUrl;?>/asset/hebo/img/customers/codecanyon.png" alt="Codecanyon" />
        </div>
        <div class="span3">
            <img src="<?php echo Yii::app()->baseUrl;?>/asset/hebo/img/customers/graphicriver.png" alt="Graphicriver" />
        </div>
        <div class="span3">
            <img src="<?php echo Yii::app()->baseUrl;?>/asset/hebo/img/customers/photodune.png" alt="Photodune" />
        </div>
          
        </div><!--/row-fluid-->
      */ ?>
        
