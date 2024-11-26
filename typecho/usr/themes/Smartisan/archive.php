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
             <?php $this->archiveTitle([
            'category' => _t('分类 %s 下的文章'),
            'search'   => _t('包含关键字 %s 的文章'),
            'tag'      => _t('标签 %s 下的文章'),
            'author'   => _t('%s 发布的文章')], '', ''); ?>  
            </h1>
            </article>    
    <?php if ($this->have()): ?>
        <?php while ($this->next()): ?>
            <article class="post post-list">
            <p class="post-title">
                <a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
        </p>
                <div class="post-info">
      <time class="post-time">
      <svg class="icon" viewBox="0 0 1024 1024" width="16" height="16">
                <path
                    d="M512 97.52381c228.912762 0 414.47619 185.563429 414.47619 414.47619s-185.563429 414.47619-414.47619 414.47619S97.52381 740.912762 97.52381 512 283.087238 97.52381 512 97.52381z m0 73.142857C323.486476 170.666667 170.666667 323.486476 170.666667 512s152.81981 341.333333 341.333333 341.333333 341.333333-152.81981 341.333333-341.333333S700.513524 170.666667 512 170.666667z m36.571429 89.697523v229.86362h160.865523v73.142857H512a36.571429 36.571429 0 0 1-36.571429-36.571429V260.388571h73.142858z">
                </path>
            </svg> <?php $this->date(); ?>
      </time>
      <svg class="icon" viewBox="0 0 1024 1024" width="16" height="16">
                <path
                    d="M408.551619 97.52381a73.142857 73.142857 0 0 1 51.736381 21.430857L539.306667 197.973333A73.142857 73.142857 0 0 0 591.067429 219.428571H804.571429a73.142857 73.142857 0 0 1 73.142857 73.142858v560.761904a73.142857 73.142857 0 0 1-73.142857 73.142857H219.428571a73.142857 73.142857 0 0 1-73.142857-73.142857V170.666667a73.142857 73.142857 0 0 1 73.142857-73.142857h189.123048z m0 73.142857H219.428571v682.666666h585.142858V292.571429h-213.504a146.285714 146.285714 0 0 1-98.499048-38.13181L487.619048 249.734095 408.551619 170.666667zM365.714286 633.904762v73.142857h-73.142857v-73.142857h73.142857z m365.714285 0v73.142857H414.47619v-73.142857h316.952381z m-365.714285-195.047619v73.142857h-73.142857v-73.142857h73.142857z m365.714285 0v73.142857H414.47619v-73.142857h316.952381z">
                </path>
            </svg> <?php $this->category(','); ?>
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 24 24" fill="currentColor" width="16" height="16">
            <path d="M7.78428 14L8.2047 10H4V8H8.41491L8.94043 3H10.9514L10.4259 8H14.4149L14.9404 3H16.9514L16.4259 8H20V10H16.2157L15.7953 14H20V16H15.5851L15.0596 21H13.0486L13.5741 16H9.58509L9.05957 21H7.04855L7.57407 16H4V14H7.78428ZM9.7953 14H13.7843L14.2047 10H10.2157L9.7953 14Z"></path>
        </svg> <?php _e(' '); ?><?php $this->tags(', ', true, 'none'); ?></a>  
    </div>
    <div class="post-content" itemprop="articleBody">
    <?php
        // 判断是否存在自定义字段summary并输出，否则输出自动生成的摘要
        if($this->fields->summary){
        echo $this->fields->summary;
         } else {
        $this->excerpt(180);
        }?>
    </div>
    </article>
    <?php endwhile; ?>
    <?php else: ?>
        <article class="post">
            <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
        </article>
    <?php endif; ?>
    <?php $this->need('pagination.php'); ?>
</div><!-- end #main -->
</div></div> </div> 
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
