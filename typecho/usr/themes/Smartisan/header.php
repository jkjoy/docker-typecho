<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="site-header">
  <div class="container header-container">
  <a class="title-container" href="<?php $this->options->siteUrl(); ?>">
    <?php if ($this->options->logoUrl): ?>
      <img class="avatar" src="<?php $this->options->logoUrl(); ?>" alt="<?php $this->options->title(); ?>">
    <?php else: ?>
      <h1 class="site-title"><?php $this->options->title(); ?></h1>
    <?php endif; ?>
  </a>
  <button class="menu-toggle" aria-label="Toggle menu">
    <svg viewBox="0 0 24 24">
      <path fill="currentColor" d="M3 6h18v2H3V6zm0 5h18v2H3v-2zm0 5h18v2H3v-2z"/>
    </svg>
  </button>
    <div class="menu-container">
        <?php if ($this->is('index')): ?> 
            <?php endif; ?>
            <a href="<?php $this->options->siteUrl(); ?> " class="menu">
            <?php _e('首页'); ?>
        </a>
          <?php \Widget\Contents\Page\Rows::alloc()->to($pages); ?>
                    <?php while ($pages->next()): ?>
                       <?php if ($this->is('page', $pages->slug)): ?> 
                        <?php endif; ?>
                        <a href="<?php $pages->permalink(); ?>" class="menu" title="<?php $pages->title(); ?>"> 
                            <?php $pages->title(); ?>
                        </a>  
       <?php endwhile; ?>        
    </div>
    </div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
      const menuToggle = document.querySelector('.menu-toggle');
      const menuContainer = document.querySelector('.menu-container');

      // 默认隐藏菜单
      if (window.innerWidth <= 800) {
        menuContainer.style.display = 'none';
      }

      menuToggle.addEventListener('click', function() {
        menuContainer.classList.toggle('show');
        if (menuContainer.classList.contains('show')) {
          menuContainer.style.display = 'flex';
        } else {
          menuContainer.style.display = 'none';
        }
      });

      // 监听窗口大小变化
      window.addEventListener('resize', function() {
        if (window.innerWidth > 800) {
          menuContainer.style.display = 'flex';
          menuContainer.classList.remove('show');
        } else if (!menuContainer.classList.contains('show')) {
          menuContainer.style.display = 'none';
        }
      });
    });
  </script>
</div>