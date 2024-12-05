<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="zh">
<head>
<meta charset="<?php $this->options->charset(); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5">
<title><?php $this->archiveTitle([
            'category' => _t('分类 %s 下的文章'),
            'search'   => _t('包含关键字 %s 的文章'),
            'tag'      => _t('标签 %s 下的文章'),
            'author'   => _t('%s 发布的文章')
        ], '', ' - '); ?><?php $this->options->title(); ?></title>
<link rel="canonical" href="<?php $this->options->siteUrl(); ?>">
<meta name="title" content="<?php $this->options->title(); ?>">
<meta name="description" content="<?php $this->options->description() ?>.">
<link rel="alternate" type="application/atom+xml" href="<?php $this->options->siteUrl(); ?>feed/">
<link rel="shortcut icon" type="image/svg+xml" href="<?php $this->options->logoUrl() ?>">
<?php if ($this->options->diycss): ?>
    <style type="text/css">
        <?php echo $this->options->diycss; ?>
    </style>
<?php else: ?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">
<?php endif; ?>
    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>
<body class="home">
<header>
<a class="title" href="/">
<h1>
<?php $this->options->title() ?>
</h1>
</a>
<nav>
    <p>                    
        <a<?php if ($this->is('index')): ?>  <?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
        <?php \Widget\Contents\Page\Rows::alloc()->to($pages); ?>
        <?php while ($pages->next()): ?>
        <a<?php if ($this->is('page', $pages->slug)): ?> <?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
        <?php endwhile; ?>
    </p>
</nav>
</header>