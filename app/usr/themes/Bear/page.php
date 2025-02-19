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
</i>
</p>
<?php $this->content(); ?>
<?php $this->options->addcomment() ?>
</main>
<?php $this->need('footer.php'); ?>
