<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function themeInit($archive)
{
 Helper::options()->commentsAntiSpam = false; 
}
?>
<link rel='stylesheet' href='<?php echo Helper::options()->themeUrl . '/assets/css/option.css'; ?>'>
<?php
function themeConfig($form)
{
    $cnavatar = new Typecho_Widget_Helper_Form_Element_Text('cnavatar', NULL, 'https://cravatar.cn/avatar/', _t('Gravatar镜像'), _t('默认https://cravatar.cn/avatar/,建议保持默认'));
    $form->addInput($cnavatar);
    $icoUrl = new Typecho_Widget_Helper_Form_Element_Text('icoUrl', NULL, NULL, _t('站点 Favicon 地址'));
    $form->addInput($icoUrl);
    $avaUrl = new Typecho_Widget_Helper_Form_Element_Text('avaUrl', NULL, NULL, _t('关于页面地址'), _t('点击侧边栏头像链接的地址'));
    $form->addInput($avaUrl);
    $telegramurl = new Typecho_Widget_Helper_Form_Element_Text('steamurl', NULL, NULL, _t('steam'), _t('会在个人信息显示'));
    $form->addInput($telegramurl);
    $githuburl = new Typecho_Widget_Helper_Form_Element_Text('githuburl', NULL, NULL, _t('github'), _t('会在个人信息显示'));
    $form->addInput($githuburl);
    $twitterurl = new Typecho_Widget_Helper_Form_Element_Text('twitterurl', NULL, NULL, _t('twitter'), _t('会在个人信息显示'));
    $form->addInput($twitterurl);
    $twikoo = new Typecho_Widget_Helper_Form_Element_Textarea('twikoo', NULL, NULL, _t('引用第三方评论'), _t('不填写则不显示'));
    $form->addInput($twikoo);
    $addhead = new Typecho_Widget_Helper_Form_Element_Textarea('addhead', NULL, NULL, _t('自定义CSS'), _t('CSS'));
    $form->addInput($addhead);
    $tongji = new Typecho_Widget_Helper_Form_Element_Textarea('tongji', NULL, NULL, _t('统计代码'), _t('支持HTML'));
    $form->addInput($tongji);
    $showtime = new Typecho_Widget_Helper_Form_Element_Radio('showtime',
    array('0'=> _t('否'), '1'=> _t('是')),
    '0', _t('是否显示页面加载时间'), _t('选择“是”将在页脚显示加载时间。'));
    $form->addInput($showtime);
}
// 获取文章第一张图片
function img_postthumb($cid) {
    $db = Typecho_Db::get();
    $rs = $db->fetchRow($db->select('table.contents.text')
        ->from('table.contents')
        ->where('table.contents.cid=?', $cid)
        ->order('table.contents.cid', Typecho_Db::SORT_ASC)
        ->limit(1));
    // 检查是否获取到结果
    if (!$rs) {
        return "";
    }
    preg_match_all("/https?:\/\/[^\s]*.(png|jpeg|jpg|gif|bmp|webp)/", $rs['text'], $thumbUrl);  //通过正则式获取图片地址
    // 检查是否匹配到图片URL
    if (count($thumbUrl[0]) > 0) {
        return $thumbUrl[0][0];  // 返回第一张图片的URL
    } else {
        return "";  // 没有匹配到图片URL，返回空字符串
    }
}
//获取文章字数
function getWordCount($text) {
    // 移除HTML标签
    $text = strip_tags($text);
    // 移除多余的空格
    $text = trim($text);
    // 计算字数
    $wordCount = mb_strlen($text, 'UTF-8');
    return $wordCount;
}
function getReadingTime($text, $wordsPerMinute = 500) {
    // 移除HTML标签
    $text = strip_tags($text);
    // 移除多余的空格
    $text = trim($text);
    // 计算字数
    $wordCount = mb_strlen($text, 'UTF-8');
    // 计算阅读时间
    $readingTime = ceil($wordCount / $wordsPerMinute);
    return $readingTime;
}
//回复加上@
function getPermalinkFromCoid($coid) {
	$db = Typecho_Db::get();
	$row = $db->fetchRow($db->select('author')->from('table.comments')->where('coid = ? AND status = ?', $coid, 'approved'));
	if (empty($row)) return '';
	return '<a href="#comment-'.$coid.'" style="text-decoration: none;">@'.$row['author'].'</a>';
}
// 获取Typecho的选项
$options = Typecho_Widget::widget('Widget_Options');
// 检查cnavatar是否已设置，如果未设置或为空，则使用默认的Gravatar前缀
$gravatarPrefix = empty($options->cnavatar) ? 'https://cravatar.cn/avatar/' : $options->cnavatar;
// 定义全局常量__TYPECHO_GRAVATAR_PREFIX__，用于存储Gravatar前缀
define('__TYPECHO_GRAVATAR_PREFIX__', $gravatarPrefix);
/**
* 页面加载时间
*/
function timer_start() {
    global $timestart;
    $mtime = explode( ' ', microtime() );
    $timestart = $mtime[1] + $mtime[0];
    return true;
    }
    timer_start();
    function timer_stop( $display = 0, $precision = 3 ) {
    global $timestart, $timeend;
    $mtime = explode( ' ', microtime() );
    $timeend = $mtime[1] + $mtime[0];
    $timetotal = number_format( $timeend - $timestart, $precision );
    $r = $timetotal < 1 ? $timetotal * 1000 . " ms" : $timetotal . " s";
    if ( $display ) {
    echo $r;
    }
    return $r;
    }
 