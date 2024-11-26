<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<html>
<head>
<?php $this->need('head.php'); ?>
</head>
<body>
  <div class="main">
    <div class="main-content">
    <?php $this->need('header.php'); ?>
      <div class="content container clearfix">
        <div class="panel post-container">
          <h4 class="panel-title">文章内容</h4>
          <article class="post post-detail">
            <h1 class="post-title">
            <?php $this->title() ?>
            </h1>
            <div class="post-info">
              <time class="post-time">
                发表于: <?php $this->date(); ?> · 分类 : <?php $this->category(','); ?> · 
              </time> 
              <a itemprop="keywords" class="post-tag">
                <?php _e('标签: '); ?><?php $this->tags(', ', true, 'none'); ?></a> 
            </div><br>
            <?php $firstImage = show_first_image($this->content); ?>
           <?php if($firstImage): ?>
            <div class="post-feature-image" style="background-image: url('<?php echo $firstImage; ?>')">
            </div>
          <?php endif; ?>  
            <div class="post-content">
            <?php $this->content(); ?>
            </div>
          </article>
        <div class="pagination-container">
           <p class="prev-btn"><?php $this->thePrev('上一篇: %s', '没有了'); ?> </p>
           <p class="next-btn"><?php $this->theNext('下一篇: %s', '没有了'); ?> </p>
        </div>
        <?php $this->need('comments.php'); ?>
        </div>      
        <?php $this->need('sidebar.php'); ?>
      </div>
      <?php $this->need('footer.php'); ?>
    </div>
  </div>
</body>
</html>