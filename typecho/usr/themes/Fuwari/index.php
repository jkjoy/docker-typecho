<?php
/**
 * 移植自 Astro 平台主题 Fuwari
 *
 * @package Fuwari
 * @author Sun
 * @version 1.0.1
 * @link http://www.imsun.org
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<!DOCTYPE html>
<html class="transition bg-[var(--page-bg)] md:text-[16px] text-[14px]" data-astro-cid-sckkx6r4 style="--configHue:250">
<head>
<?php $this->need('h.php'); ?>
</head>
<body class="transition is-home min-h-screen" data-astro-cid-sckkx6r4 style="--configHue:250">
        <div class="absolute w-full" id=banner-wrapper style=--configHue:250 data-astro-cid-sckkx6r4>
            <div class="overflow-hidden relative h-full object-center object-cover">
                <div class="transition absolute pointer-events-none bg-opacity-50 dark:bg-black/10 inset-0"></div><img
                    alt="Banner image of the blog" class="object-cover h-full w-full" decoding=async height=1369
                    loading=lazy src=<?php $this->options->themeUrl('/assets/img/demo-banner.WD4SMgz__nlqjd.webp'); ?> style=object-position:center width=1920>
            </div>
        </div>
        <div class="relative mx-auto gap-4 grid grid-cols-[17.5rem_auto] grid-rows-[auto_auto_1fr_auto] lg:grid-rows-[auto_1fr_auto] max-w-[var(--page-width)] md:px-4 min-h-screen px-0">
            <?php $this->need('nav.php'); ?>
            <?php $this->need('s.php'); ?>
            <?php $this->need('p.php'); ?>
            <?php $this->need('f.php'); ?>
        </div>
</body>
</html>