<?php 
/**
 * 标签
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<html>
<head>
<?php $this->need('head.php'); ?>
</head>
<body>
  <div class="main">
    <div class="main-content">
    <?php $this->need('header.php'); ?>

      <div class="content container clearfix">
        <div class="panel tags-container">
          <h4 class="panel-title">标签列表</h4>
          <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0')->to($tags); ?>
                        <?php if($tags->have()): ?>
          
            <ul class="tag-list">
            <?php while ($tags->next()): ?>
            <li>
              <a href="<?php $tags->permalink(); ?>">
                <div class="tag" href="<?php $this->options->sidebarLinkOpen(); ?>"><?php $tags->name(); ?></div>
                <span class="count"><?php $tags->count(); ?></span>
              </a>
            </li>
            <?php endwhile; ?>
          </ul>
          <?php else: ?>
                            <p class="text-center pb-2"><?php _e('没有任何标签'); ?></p>
          <?php endif; ?>
        </div>
      </div>

      <?php $this->need('footer.php'); ?>
    </div>
  </div>
</body>
</html>