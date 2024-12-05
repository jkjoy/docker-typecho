<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    $logoUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'logoUrl',
        null,
        null,
        _t('站点 favicon 地址'),
        _t('在这里填入一个图片 URL 地址')
    );
    $form->addInput($logoUrl);
    $diycss = new \Typecho\Widget\Helper\Form\Element\Textarea(
        'diycss',
        null,
        null,
        _t('自定义CSS'),
        _t('在这里填写CSS样式')
    );
    $form->addInput($diycss);
    $aboutme = new \Typecho\Widget\Helper\Form\Element\Textarea(
        'aboutme',
        null,
        null,
        _t('首页文章列表之上,可以填写自我介绍等'),
        _t('支持HTML')
    );
    $form->addInput($aboutme);
    $addfoot = new \Typecho\Widget\Helper\Form\Element\Textarea(
        'addfoot',
        null,
        null,
        _t('页脚代码,可填写备案,统计等信息'),
        _t('支持HTML')
    );
    $form->addInput($addfoot);
    $addcomment = new \Typecho\Widget\Helper\Form\Element\Textarea(
        'addcomment',
        null,
        null,
        _t('评论系统,如Twikoo Artalk Gitalk 等'),
        _t('支持HTML')
    );
    $form->addInput($addcomment);
    $addpost = new \Typecho\Widget\Helper\Form\Element\Textarea(
        'addpost',
        null,
        null,
        _t('标题下方自定义内容,可用于第三方评论系统的 拓展'),
        _t('支持HTML')
    );
    $form->addInput($addpost);
    }

