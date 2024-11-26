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
          <article class="post post-detail">
            <h1 class="post-title">
            <?php $this->title() ?>
            </h1>
            <div class="post-content">
            <?php $this->content(); ?>
            </div>
          </article>
        <?php $this->need('comments.php'); ?>
        </div>      
        <?php $this->need('sidebar.php'); ?>
      </div>
      <?php $this->need('footer.php'); ?>
    </div>
  </div>
</body>
</html>
