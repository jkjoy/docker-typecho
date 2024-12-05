<?php
/**
 * BearBlog theme for Typecho
 *
 * @package Bear Theme
 * @author Sun
 * @version 1.0.1
 * @link http://imsun.org
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<main>
<h1 id="hi-i-m-herman-martinus"> </h1>
<h3 id="i-m-a-maker-of-things-rider-of-bikes-and-hiker-of-mountains"> </h3>
<p><?php $this->options->aboutme() ?> </p>
<h1 id="my-most-popular-posts">文章列表</h1>
<ul>
<?php while($this->next()): ?>
    <li><a href="<?php $this->permalink() ?> ">
    <?php $this->sticky();$this->title() ?></a> </li>
<?php endwhile; ?>
</ul>
</main>
<?php $this->need('footer.php'); ?>