<?php 
/**
 * 文章归档
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
<?php
$stat = Typecho_Widget::widget('Widget_Stat');
Typecho_Widget::widget('Widget_Contents_Post_Recent', 'pageSize=' . $stat->publishedPostsNum)->to($archives);
$year = 0;
$output = '<div class="panel archives-container">'; // Start archives container
while ($archives->next()) {
    $year_tmp = date('Y', $archives->created);
    // 检查是否需要新的年份标题
    if ($year != $year_tmp) {
        if ($year > 0) {
            $output .= '</div>'; // 关闭前一年的div
        }
        $year = $year_tmp;
        $output .= '<div class="year-group">'; // 开始新的年份div
        $output .= '<h2 class="panel-title">' . $year . '年</h2>';
    }
    $output .= '<article class="post">';
    $output .= '<a href="' . $archives->permalink . '">';
    $output .= '<h2 class="post-title">' . $archives->title . '</h2>';
    $output .= '</a>';
    $output .= '<small>' . date('m月d日', $archives->created) . '</small>';
    $output .= '</article>';
}
$output .= '</div>'; // 关闭最后一年的div
$output .= '</div>'; // End archives container
echo $output;
?>
  </div> 
      <?php $this->need('footer.php'); ?>
    </div>
  </div>
</body>
</html>