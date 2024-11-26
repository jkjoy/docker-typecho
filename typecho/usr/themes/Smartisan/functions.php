<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function themeConfig($form)
{
    $logoUrl = new \Typecho\Widget\Helper\Form\Element\Text('logoUrl',null,null, _t('站点 LOGO 地址'),_t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO,建议高度75px以内'));
    $form->addInput($logoUrl);
    $avatarUrl = new \Typecho\Widget\Helper\Form\Element\Text('avatarUrl',null,'https://img.imsun.org/avatar.jpg', _t('头像地址'),_t('在这里填入一个图片 URL 地址, 以显示头像'));
    $form->addInput($avatarUrl);
    $profile = new Typecho_Widget_Helper_Form_Element_Textarea('profile', NULL, '这个人很懒,什么也没有写', _t('简介'),_t('显示在侧边栏的个人简介'));
    $form->addInput($profile);
    $alipay = new Typecho_Widget_Helper_Form_Element_Text('alipay', NULL, 'https://blogcdn.loliko.cn/donate/ali.png', _t('支付宝二维码'),_t('显示在页脚'));
    $form->addInput($alipay);
    $wxpay = new Typecho_Widget_Helper_Form_Element_Text('wxpay', NULL, 'https://blogcdn.loliko.cn/donate/wx.png', _t('微信二维码'),_t('显示在页脚'));
    $form->addInput($wxpay);
    $qrcode = new Typecho_Widget_Helper_Form_Element_Text('qrcode', NULL, 'https://blogcdn.loliko.cn/donate/wx.png', _t('微信公众号二维码'),_t('显示在页脚'));
    $form->addInput($qrcode);
    $icpbeian = new Typecho_Widget_Helper_Form_Element_Text('icpbeian', NULL, '', _t('ICP备案号码'),_t('显示在页脚'));
    $form->addInput($icpbeian);
    $addhead = new Typecho_Widget_Helper_Form_Element_Textarea('addhead', NULL, NULL, _t('添加头部内容支持html'),_t('用于添加统计'));
    $form->addInput($addhead);
    $addfoot = new Typecho_Widget_Helper_Form_Element_Textarea('addfoot', NULL, NULL, _t('添加页脚内容支持html'),_t('显示在页脚,用以添加其他代码'));
    $form->addInput($addfoot);
    $addad = new Typecho_Widget_Helper_Form_Element_Textarea('addad', NULL, NULL, _t('添加广告内容支持html'),_t('显示在侧边栏'));
    $form->addInput($addad);
    $twikoo = new Typecho_Widget_Helper_Form_Element_Textarea('twikoo', NULL, NULL, _t('引用第三方评论'));
    $form->addInput($twikoo);
    $cnavatar = new Typecho_Widget_Helper_Form_Element_Text('cnavatar', NULL, 'https://cravatar.cn/avatar/', _t('自定义Gravatar镜像服务器,默认https://cravatar.cn/avatar/'));
    $form->addInput($cnavatar);
    $showlink = new Typecho_Widget_Helper_Form_Element_Radio('showlink',
    array('0'=> _t('否'), '1'=> _t('是')),
    '0', _t('是否首页显示友情链接,需配合links插件使用,如没有启用插件请保持默认'), _t('选择“是”将在首页显示友情链接。'));
    $form->addInput($showlink);
    $qq = new Typecho_Widget_Helper_Form_Element_Text('qq', NULL, '', _t('QQ二维码'),_t('显示在侧边栏'));
    $form->addInput($qq);
    $wechat = new Typecho_Widget_Helper_Form_Element_Text('wechat', NULL, '', _t('微信二维码'),_t('显示在侧边栏'));
    $form->addInput($wechat);
    $github = new Typecho_Widget_Helper_Form_Element_Text('github', NULL, '', _t('Github'),_t('显示在侧边栏'));
    $form->addInput($github);
    $csdn = new Typecho_Widget_Helper_Form_Element_Text('csdn', NULL, '', _t('CSDN'),_t('显示在侧边栏'));
    $form->addInput($csdn);
    $juejin = new Typecho_Widget_Helper_Form_Element_Text('juejin', NULL, '', _t('掘金'),_t('显示在侧边栏'));
    $form->addInput($juejin);
    $sifou = new Typecho_Widget_Helper_Form_Element_Text('sifou', NULL, '', _t('思否'),_t('显示在侧边栏'));
    $form->addInput($sifou);
    $weibo = new Typecho_Widget_Helper_Form_Element_Text('weibo', NULL, '', _t('微博'),_t('显示在侧边栏'));
    $form->addInput($weibo);
    $toutiao = new Typecho_Widget_Helper_Form_Element_Text('toutiao', NULL, '', _t('头条'),_t('显示在侧边栏'));
    $form->addInput($toutiao);
    $zhihu = new Typecho_Widget_Helper_Form_Element_Text('zhihu', NULL, '', _t('知乎'),_t('显示在侧边栏'));
    $form->addInput($zhihu);
    $jianshu = new Typecho_Widget_Helper_Form_Element_Text('jianshu', NULL, '', _t('简书'),_t('显示在侧边栏'));
    $form->addInput($jianshu);
    $douban = new Typecho_Widget_Helper_Form_Element_Text('douban', NULL, '', _t('豆瓣'),_t('显示在侧边栏'));
    $form->addInput($douban);
    $bilibili = new Typecho_Widget_Helper_Form_Element_Text('bilibili', NULL, '', _t('哔哩哔哩'),_t('显示在侧边栏'));
    $form->addInput($bilibili);
    $facebook = new Typecho_Widget_Helper_Form_Element_Text('facebook', NULL, '', _t('Facebook'),_t('显示在侧边栏'));
    $form->addInput($facebook);
    $twitter = new Typecho_Widget_Helper_Form_Element_Text('twitter', NULL, '', _t('Twitter'),_t('显示在侧边栏'));
    $form->addInput($twitter);
}
function show_first_image($content) {
    preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
    // 检查是否找到了图片
    if(isset($matches[1][0])){
        return $matches[1][0];
    }
    return false; // 没有找到图片，返回 false
}
// 获取Typecho的选项
$options = Typecho_Widget::widget('Widget_Options');
// 检查cnavatar是否已设置，如果未设置或为空，则使用默认的Gravatar前缀
$gravatarPrefix = empty($options->cnavatar) ? 'https://cravatar.cn/avatar/' : $options->cnavatar;
// 定义全局常量__TYPECHO_GRAVATAR_PREFIX__，用于存储Gravatar前缀
define('__TYPECHO_GRAVATAR_PREFIX__', $gravatarPrefix);