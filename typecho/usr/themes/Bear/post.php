<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<main>
<h1>
<?php $this->title() ?>
</h1>
<p>
<i>
<time datetime="<?php $this->date('c'); ?>">
<?php $this->date('Y-m-d H:m'); ?>
</time>
 · </i><?php $this->category(' · '); ?>
<?php $this->options->addpost() ?>
</p>
<?php $this->content(); ?>
<div style="text-align:center;color: #ccc;font-size:14px;">
------ THE END ------
</div>
<p class="tags">
<?php if ($this->tags): ?>
<?php foreach ($this->tags as $tag): ?>
<a href="<?php echo $tag['permalink']; ?>">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="14" height="14" fill="rgba(87,107,79,1)"><path d="M7.78428 14L8.2047 10H4V8H8.41491L8.94043 3H10.9514L10.4259 8H14.4149L14.9404 3H16.9514L16.4259 8H20V10H16.2157L15.7953 14H20V16H15.5851L15.0596 21H13.0486L13.5741 16H9.58509L9.05957 21H7.04855L7.57407 16H4V14H7.78428ZM9.7953 14H13.7843L14.2047 10H10.2157L9.7953 14Z"></path></svg>
<?php echo $tag['name']; ?></a>
<?php endforeach; ?>
<?php else: ?>
<?php endif; ?>
</p>
<?php $this->options->addcomment() ?>
 </main>
<?php $this->need('footer.php'); ?>