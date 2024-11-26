<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="site-footer">
  <div class="container">
    <div class="site-description"> 
        <?php $this->options->description() ?>
    </div>  
    <div class="footer-menu">  
      <ul class="give-areward">
      <?php if ($this->options->wxpay): ?>
        <li>
          <h4 class="footer-title">微信支付二维码</h4>
          <img class="footer-img" src="<?php $this->options->wxpay() ?>" alt="微信支付二维码">
        </li>
        <?php endif; ?>
        <?php if ($this->options->alipay): ?>
        <li>
          <h4 class="footer-title">支付宝支付二维码</h4>
          <img class="footer-img" src="<?php $this->options->alipay() ?>" alt="支付宝支付二维码">
        </li>
        <?php endif; ?>

      </ul>
      <?php if ($this->options->showlink): ?>
     

      <div class="information">
        <h4 class="footer-title">友情链接</h4>
        <ul class="friends">
        <?php
            Links_Plugin::output(' <li class="friend-item"><a class="link-item-inner effect-apollo" href="{url}" target="_blank">      
            <strong>{name}</strong>     
            </a></li> ');
        ?>
        </ul>
      </div> 
      <?php endif; ?>
      <?php if($this->options->qrcode): ?> 
      <div class="media-platform">
       
        <h4 class="footer-title">微信公众号</h4>
        <img class="footer-img" src="<?php $this->options->qrcode() ?>" alt="公众号">
      
     
      </div>   
      <?php endif; ?>
    </div>
    </div>
    <div class="footer-info">
      <ul class="copyright clearfix">
        <li>Powered by <a href="https://Typecho.org">Typecho</a></li>
        <li>Theme by <a href="https://github.com/fullstack-kingj/gridea-theme-smartisan">Smartisan</a></li>
        <li>Designed by <a href="https://imsun.org">Sun</a></li>
      </ul>
      <ul class="icp clearfix">
 
        <li>
          <a data-v-0e38ecc8="" href="http://beian.miit.gov.cn" target="_blank"><?php $this->options->icpbeian() ?></a>
        </li>
    
 
        <li class="public-security">
        <?php $this->options->addfoot() ?>
        </li>
 
      </ul>
    </div>
 
</div>
<script>
  hljs.initHighlightingOnLoad()
</script>
<?php $this->footer(); ?>