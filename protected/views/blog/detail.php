<?php 
$this->breadcrumbs=array(
    'Blog'=>array('blog/index'),
    date('Y', strtotime($data->date_input)).' '.Yii::app()->locale->getMonthName(date('n', strtotime($data->date_input)))=>array('blog/index', 'year'=>date('Y', strtotime($data->date_input)), 'month'=>date('n', strtotime($data->date_input))),
    $data->title,
);
if ($data->image != '') {
    $this->metaImage = '';
}
$this->pageTitle = $data->title . ' | '. $this->pageTitle
?>
    <div class="row-fluid">
        <div class="span12">
            <h1><?php echo $data->title ?></h1>
            <h3>
            <a align="left" href="http://www.copyscape.com/duplicate-content/"><img src="http://banners.copyscape.com/images/cs-wh-3d-88x31.gif" alt="Protected by Copyscape Duplicate Content Tool" title="Protected by Copyscape Plagiarism Checker - Do not copy content from this page." width="88" height="31" border="0"/></a>
            <div  style="line-height: 20px;" class="fb-like" data-href="" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>

            <a href="https://twitter.com/share" class="twitter-share-button" data-via="twitterapi" data-lang="en">Tweet</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

            <!-- Place this tag where you want the +1 button to render. -->
            <div class="g-plusone" data-size="medium"></div>

            <!-- Place this tag after the last +1 button tag. -->
            <script type="text/javascript">
              (function() {
                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                po.src = 'https://apis.google.com/js/platform.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
              })();
            </script>            
            <!-- Place this tag where you want the share button to render. -->
            <div class="g-plus" data-action="share" data-annotation="bubble"></div>

            <!-- Place this tag after the last share tag. -->
            <script type="text/javascript">
              (function() {
                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                po.src = 'https://apis.google.com/js/platform.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
              })();
            </script>


            </h3>
            <p><?php echo date('d F Y H:i:s', strtotime($data->date_input)) ?> by <?php echo $data->writer_name ?></p>
            <?php echo $data->content ?>
            <h3>Komentar Anda</h3>
            <div class="fb-comments" data-href="" data-numposts="5" data-colorscheme="light"></div>
            <style type="text/css">
            .fb-comments, .fb-comments iframe[style], .fb-comments > span {width: 100% !important;}

            </style>
        </div>
    </div>