<?php
/**
 * 归档模板
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="span8">    
 <h2><?php $this->title() ?></h2>
By <a target="_blank" href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a> - <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished">
        <?php $this->date('Y-m-d'); ?>
      </time>
<hr/>
<div class = "postlist">
<h4>经过<?php getBuildTime(); ?>的不懈努力，我一共写了：<?php $stat = Typecho_Widget::widget('Widget_Stat') ;echo "$stat->PublishedPostsNum"; ?>篇文章。</h4>
	<ul>
<?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
	</ul>
</div>
<hr/>
<?php $this->need('comments.php'); ?>
<?php $this->need('footer.php'); ?>