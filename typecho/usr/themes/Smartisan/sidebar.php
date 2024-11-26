<?php if (!defined('__TYPECHO_ROOT_DIR__'))  exit; ?>
<div class="sidebar">
  <div class="panel slidebar-module">
    <h4 class="panel-title">博主信息</h4>
    <div class="blogger-panel">
      <img class="avatar" src="<?php $this->options->avatarUrl() ?>" alt="">
      <h5 class="author"><?php $this->author(); ?></h5>
      <p class="description"><?php $this->options->profile() ?></p>
    </div>
  </div>
  <?php if($this->options->addad): ?> 
  <div class="panel slidebar-module">
    <h4 class="panel-title">广告推荐</h4>
    <ul class="recommend-list">
    <?php $this->options->addad() ?>  
    </ul>
  </div>
  <?php endif; ?>
  
  <div class="panel slidebar-module offical-SNS">
    <h4 class="panel-title">社交账号</h4>
    <ul class="offical-SNS-list">
    <?php if($this->options->qq): ?>
      <li
        style="background: url('<?php $this->options->themeUrl('/assets/media/images/qq.png'); ?>') no-repeat 20px center;background-size: 28px 28px;-webkit-background-size: 28px 28px;">
        <a id="sns_qq" href="<?php $this->options->qq() ?>" target="_blank">QQ</a>
      </li>
      <?php endif; ?>
      <?php if($this->options->wechat): ?>
      <li
        style="background: url('<?php $this->options->themeUrl('/assets/media/images/wechat.png'); ?>') no-repeat 20px center;background-size: 28px 28px;-webkit-background-size: 28px 28px;">
        <a id="sns_wechat" href="<?php $this->options->wechat() ?>" target="_blank">微信</a>
      </li>
      <?php endif; ?>
      <?php if($this->options->github): ?>
      <li
        style="background: url('<?php $this->options->themeUrl('/assets/media/images/github.png'); ?>') no-repeat 20px center;background-size: 28px 28px;-webkit-background-size: 28px 28px;">
        <a href="<?php $this->options->github() ?>" target="_blank">GitHub</a>
      </li>
      <?php endif; ?>
      <?php if($this->options->csdn): ?>
      <li
        style="background: url('<?php $this->options->themeUrl('/assets/media/images/csdn.png'); ?>') no-repeat 20px center;background-size: 28px 28px;-webkit-background-size: 28px 28px;">
        <a href="<?php $this->options->csdn() ?>" target="_blank">CSDN</a>
      </li>
      <?php endif; ?>
      <?php if($this->options->juejin): ?>
      <li
        style="background: url('<?php $this->options->themeUrl('/assets/media/images/juejin.png'); ?>') no-repeat 20px center;background-size: 28px 28px;-webkit-background-size: 28px 28px;">
        <a href="<?php $this->options->juejin() ?>" target="_blank">掘金</a>
      </li>
      <?php endif; ?>
      <?php if($this->options->sifou): ?>
      <li
        style="background: url('<?php $this->options->themeUrl('/assets/media/images/segmentfault.png'); ?>') no-repeat 20px center;background-size: 28px 28px;-webkit-background-size: 28px 28px;">
        <a href="<?php $this->options->sifou() ?>" target="_blank">思否</a>
      </li>
      <?php endif; ?>
      <?php if($this->options->weibo): ?>
      <li
        style="background: url('<?php $this->options->themeUrl('/assets/media/images/weibo.png'); ?>') no-repeat 20px center;background-size: 28px 28px;-webkit-background-size: 28px 28px;">
        <a href="<?php $this->options->weibo() ?>" target="_blank">微博</a>
      </li>
      <?php endif; ?>
      <?php if($this->options->toutiao): ?>
      <li
        style="background: url('<?php $this->options->themeUrl('/assets/media/images/toutiao.png'); ?>') no-repeat 20px center;background-size: 28px 28px;-webkit-background-size: 28px 28px;">
        <a href="<?php $this->options->toutiao() ?>" target="_blank">今日头条</a>
      </li>
      <?php endif; ?>
      <?php if($this->options->zhihu): ?>
      <li
        style="background: url('<?php $this->options->themeUrl('/assets/media/images/zhihu.png'); ?>') no-repeat 20px center;background-size: 28px 28px;-webkit-background-size: 28px 28px;">
        <a href="<?php $this->options->zhihu() ?>" target="_blank">知乎</a>
      </li>
      <?php endif; ?>
      <?php if($this->options->jianshu): ?>
      <li
        style="background: url('<?php $this->options->themeUrl('/assets/media/images/jianshu.png'); ?>') no-repeat 20px center;background-size: 28px 28px;-webkit-background-size: 28px 28px;">
        <a href="<?php $this->options->jianshu() ?>" target="_blank">简书</a>
      </li>
      <?php endif; ?>
      <?php if($this->options->douban): ?>
      <li
        style="background: url('<?php $this->options->themeUrl('/assets/media/images/douban.png'); ?>') no-repeat 20px center;background-size: 28px 28px;-webkit-background-size: 28px 28px;">
        <a href="<?php $this->options->douban() ?>" target="_blank">豆瓣</a>
      </li>
      <?php endif; ?>
      <?php if($this->options->bilibili): ?>
      <li
        style="background: url('<?php $this->options->themeUrl('/assets/media/images/bilibili.png'); ?>') no-repeat 20px center;background-size: 28px 28px;-webkit-background-size: 28px 28px;">
        <a href="<?php $this->options->bilibili() ?>" target="_blank">B站</a>
      </li>
      <?php endif; ?>
      <?php if($this->options->facebook): ?>
      <li
        style="background: url('<?php $this->options->themeUrl('/assets/media/images/facebook.png'); ?>') no-repeat 20px center;background-size: 28px 28px;-webkit-background-size: 28px 28px;">
        <a href="<?php $this->options->facebook() ?>" target="_blank">Facebook</a>
      </li>
      <?php endif; ?>
      <?php if($this->options->twitter): ?>
      <li
        style="background: url('<?php $this->options->themeUrl('/assets/media/images/twitter.png'); ?>') no-repeat 20px center;background-size: 28px 28px;-webkit-background-size: 28px 28px;">
        <a href="<?php $this->options->twitter() ?>" target="_blank">Twitter</a>
      </li>
      <?php endif; ?>
    </ul>
  </div>
  <div id="pop_dialog" class="pop-dialog">
    <div class="dialog-mask"></div>
    <div class="dialog-box">
      <div class="dialog-title">
        <h4 class="title"></h4>
        <a id="btn_close" class="dialog-close"></a>
      </div>
      <div class="dialog-content">
        <img src="#" alt="">
      </div>
    </div>
  </div>
  <script src="<?php $this->options->themeUrl('/assets/media/scripts/sidebar.js'); ?>"></script>  
</div>