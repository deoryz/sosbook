    <div class="slider-bootstrap"><!-- start slider -->
    	<div class="slider-wrapper theme-default">
            <div id="slider-nivo" class="nivoSlider">
                <img src="<?php echo Yii::app()->baseUrl;?>/images/fcs/cara-belanja-aman.jpg" data-thumb="<?php echo Yii::app()->baseUrl;?>/asset/hebo/img/slider/flickr/s10.jpg" alt="" title="" />
                <img src="<?php echo Yii::app()->baseUrl;?>/images/fcs/cara-membuat-toko-online.jpg" data-thumb="<?php echo Yii::app()->baseUrl;?>/asset/hebo/img/slider/flickr/s11.jpg" alt="" title="" />
            </div>
        </div>

    </div> <!-- /slider -->
    
    
    <div class="shout-box">
        <div class="shout-text">
          <h1><?php echo $this->setting['title'] ?></h1>
          <p><?php echo nl2br($this->setting['description']) ?></p>
        </div>
    </div>
    	<div class="row-fluid">
            <ul class="thumbnails center">
              <li class="span3">
                <div class="thumbnail">
                <h3>Cara belanja aman?</h3>
                  
                  	<div class="round_background r-grey-light">
                		<img src="<?php echo Yii::app()->baseUrl;?>/asset/hebo/img/icons/smashing/30px-01.png" alt="" class="">
                     </div>
                  
                  <p>Tips-tips bagaimana aman berbelanja online, sehingga anda<br> tidak perlu khawatir tertipu oleh penjual 
                    <a href="<?php echo CHtml::normalizeUrl(array('blog/index', 'tag'=>'cara-belanja-aman')); ?>">Read More...</a></p>
                </div>
              </li>
              <li class="span3">
                <div class="thumbnail">
                	 <h3>Cara buat toko online?</h3>
                     
                     <div class="round_background r-yellow">
                		<img src="<?php echo Yii::app()->baseUrl;?>/asset/hebo/img/icons/smashing/30px-41.png" alt="" class="">
                     </div>
                 
                  <p>Tips-tips membuat toko online yang profesional sehingga anda <br> mendapatkan kepercayaan pembeli 
                    <a href="#">Read More...</a> </p>
                </div>
              </li>
              <li class="span3">
                <div class="thumbnail">
                	<h3>Mendapat kepercayaan?</h3>
                  	<div class="round_background r-grey-light">
                		<img src="<?php echo Yii::app()->baseUrl;?>/asset/hebo/img/icons/smashing/30px-37.png" alt="" class="">
                     </div>
                  <p>Trik untuk mendapatkan kepercayaan dari pembeli<br> karena kepercayaan pembeli adalah asset utama 
                    <a href="<?php echo CHtml::normalizeUrl(array('blog/index', 'tag'=>'mendapat-kepercayaan')); ?>">Read More...</a></p>
                </div>
              </li>
              <li class="span3">
                <div class="thumbnail">
                  <h3>Cara Membangun Bisnis?</h3>
                  <div class="round_background r-yellow">
                		<img src="<?php echo Yii::app()->baseUrl;?>/asset/hebo/img/icons/smashing/30px-17.png" alt="" class="">
                     </div>
                  <p>Tips-trik dan ide-ide bisnis yang akan menginspirasi anda sehingga anda dapat sukses dengan kami 
                    <a href="<?php echo CHtml::normalizeUrl(array('blog/index', 'tag'=>'membangun-bisnis-online')); ?>">Read More...</a></p>
                </div>
              </li>

            </ul>
        </div>
        
       
    <?php /*
      <h3 class="header">Artikel Terbaru
        <span class="header-line"></span> 
      </h3>
	  <div class="row-fluid">
      	<div class="span4">
          
          <ul class="list-icon">
            <li><a href="#">Cara Membuat Toko Online</a></li>
            <li><a href="#">Cara belanja online aman</a></li>
            <li><a href="#">Cara mendapat kepercayaan</a></li>
            <li><a href="#">Cara Membangun Bisnis online</a></li>
            <li><a href="#">Cara memperoleh pengunjung blog</a></li>
            <li><a href="#">Cara optimasi website/blog</a></li>
            <li><a href="#">Lihat yang lain ....</a></li>
            
          </ul>
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
      */ ?>
          
		</div><!--/row-fluid-->
        
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/asset/hebo/js/nivo-slider/jquery.nivo.slider.pack.js"></script>
    
     <script type="text/javascript">
    $(function() {
        $('#slider-nivo').nivoSlider({
			effect: 'boxRandom',
			manualAdvance:false,
			controlNav: false
			});
    });
    </script> <!--<script type="text/javascript">
    $(document).ready(function() {
        $('#slider-nivo2').nivoSlider();
    });
    </script>-->