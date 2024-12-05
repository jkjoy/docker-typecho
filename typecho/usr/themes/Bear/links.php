<?php 
/**
 * 友情链接
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<main>
<h1 style="margin-bottom:0"><?php $this->title() ?></h1>
<ul>
<?php Links_Plugin::output('<li> <a href="{url}" target="_blank"><strong>{name}</strong></a> · {title} </li>');?>
</ul>        
</main>
<?php $this->need('footer.php'); ?>