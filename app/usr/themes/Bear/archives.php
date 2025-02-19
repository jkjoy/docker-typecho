<?php 
/**
 * 文章归档
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<main>
<h1 style="margin-bottom:0"><?php $this->title() ?></h1>
<?php
        $stat = Typecho_Widget::widget('Widget_Stat');
        Typecho_Widget::widget('Widget_Contents_Post_Recent', 'pageSize=' . $stat->publishedPostsNum)->to($archives);
        $year = 0; $mon = 0;
        $output = '<ul class="blog-posts">'; // Start archives container      
        while ($archives->next()) {
            $year_tmp = date('Y', $archives->created);
            $mon_tmp = date('m', $archives->created);         
            // 输出文章项
            $output .= '<li><span>';
            $output .= '<i><time datetime="' . date('m月d日', $archives->created) .'">'. date('Y-m-d', $archives->created) .'</time></i>';
            $output .= '</span>';
            $output .= '<a href="' . $archives->permalink . '">'  . $archives->title . '</a></li>';
        }
        $output .= '</ul>'; // End archives container
        echo $output;
    ?>
        <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0')->to($tags); ?>
                        <?php if($tags->have()): ?>
                            <div class="tags">
                                <?php while ($tags->next()): ?>
                                        <a href="<?php $tags->permalink(); ?>" rel="tag" title="<?php $tags->count(); ?> 篇文章">#<?php $tags->name(); ?> </a>
                                <?php endwhile; ?>
                            </div>
                        <?php else: ?>
                        <?php endif; ?>
</main>
<?php $this->need('footer.php'); ?>
 