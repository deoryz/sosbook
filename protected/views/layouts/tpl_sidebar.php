<div class="">
  <input class="input-block-level" id="appendedInput" placeholder="Search..." type="text">
</div>

<h3>Arsip</h3>

<ul class="nav nav-list">
    <?php $listBlog = Blog::model()->getMenu($this->languageID); ?>
    <?php foreach ($listBlog as $key => $value): ?>
    <?php foreach ($value as $k => $v): ?>
    <li <?php if ($key == $_GET['year'] AND $k == $_GET['month']): ?>class="active"<?php endif ?>>
      <a href="<?php echo CHtml::normalizeUrl(array('blog/index', 'year'=>$key, 'month'=>$k)); ?>"><?php echo Yii::app()->locale->getMonthName($k) ?> <?php echo $key ?></a>
    </li>
    <?php endforeach ?>
    <?php endforeach ?>
</ul>

<h3>Tags</h3>

<div class="tags">
    <?php $tag = Blog::model()->getTagArray(); ?>
    <?php foreach ($tag as $key => $value): ?>
        <a <?php if ($value['slug'] == $_GET['tag']): ?>class="active"<?php endif ?> href="<?php echo CHtml::normalizeUrl(array('blog/index', 'tag'=>$value['slug'])); ?>"><?php echo $value['tag'] ?></a>
    <?php endforeach ?>
    
</div>

<h3>Popular &amp; recent</h3>

<ul class="nav nav-tabs" id="side-bar-tabs">
  <li class="active"><a href="#popular" data-toggle="tab">Popular</a></li>
  <li><a href="#recent" data-toggle="tab">Recent</a></li>
</ul>
<div class="tab-content">
  <div class="tab-pane active" id="popular">
  	<ul class="list-popular-content  clearfix">
        <?php $newBlog = Blog::model()->getAllData(5, false, $this->languageID); ?>
        <?php foreach ($newBlog as $key => $value): ?>
        <li>
        <?php if ($value->image != ''): ?>
        <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(75,75, $value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" width="65" height="65" alt="<?php echo $value->title ?>" class="pull-left" />
        <?php endif ?>
        <h5>
          <a href="<?php echo $this->createUrl('blog/detail', array('year'=>date('Y', strtotime($value->date_input)), 'month'=>date('n', strtotime($value->date_input)), 'slug'=>$value->slug)); ?>" title="<?php echo $value->title ?>">
            <?php echo $value->title ?>
          </a>
        </h5>
        <div><?php echo substr(strip_tags($value->content), 0, 40) ?></div>
        </li>
        <?php endforeach ?>
	</ul>
  </div>
  <div class="tab-pane" id="recent">
  	<ul class="list-recent-content">
        <?php $newBlog = Blog::model()->getAllData(5, false, $this->languageID); ?>
        <?php foreach ($newBlog as $key => $value): ?>
        <li>
        <?php if ($value->image != ''): ?>
        <img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(75,75, $value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>" width="65" height="65" alt="<?php echo $value->title ?>" class="pull-left" />
        <?php endif ?>
        <h5>
          <a href="<?php echo $this->createUrl('blog/detail', array('year'=>date('Y', strtotime($value->date_input)), 'month'=>date('n', strtotime($value->date_input)), 'slug'=>$value->slug)); ?>" title="<?php echo $value->title ?>">
            <?php echo $value->title ?>
          </a>
        </h5>
        <div><?php echo substr(strip_tags($value->content), 0, 40) ?></div>
        </li>
        <?php endforeach ?>
        
	</ul>
  </div>
</div>