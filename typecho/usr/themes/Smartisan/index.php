<?php
/**
 * Smartisan  for  Typecho
 *  移植自Gridea主题 Smartisan
 * @package Smartisan  Theme
 * @author Sun
 * @version 1.2
 * @link http://imsun.org
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<!DOCTYPE HTML>
<html>
<head>
<?php $this->need('head.php'); ?>
</head>
  <div class="main">
    <div class="main-content">
    <?php $this->need('header.php'); ?>
    <div class="content container clearfix">
    <?php $this->need('post-list.php'); ?>
    <?php $this->need('sidebar.php'); ?>
    </div>
    <?php $this->need('footer.php'); ?>
  </div>
  </div>
</body>
</html>