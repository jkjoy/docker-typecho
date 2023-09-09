<!--风格四首页文章输出-->
<div class="joe_index__title">
            <ul class="joe_index__title-title">
              <li class="item" data-type="created">最新文章</li>
              <li class="item" data-type="views">热门文章</li>
              <li class="item" data-type="commentsNum">评论最多</li>
              <li class="item" data-type="agree">点赞最多</li>
              <li class="line"></li>
            </ul>
            <!--通知-->
            <?php
            $index_notice_text = $this->options->AIndex_Notice;
            $index_notice = null;
            if ($index_notice_text) {
              $index_notice_arr = explode("||", $index_notice_text);
              if (count($index_notice_arr) === 2) $index_notice = array("text" => trim($index_notice_arr[0]), "url" => trim($index_notice_arr[1]));
            }
            ?>
            <?php if ($index_notice) : ?>
              <div class="joe_index__title-notice">
                <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="20" height="20">
                  <path d="M656.261 347.208a188.652 188.652 0 1 0 0 324.05v-324.05z" fill="#F4CA1C" />
                  <path d="M668.35 118.881a73.35 73.35 0 0 0-71.169-4.06l-310.01 148.68a4.608 4.608 0 0 1-2.013.46h-155.11a73.728 73.728 0 0 0-73.728 73.636v349.64a73.728 73.728 0 0 0 73.728 73.636h156.554a4.68 4.68 0 0 1 1.94.43l309.592 143.196a73.702 73.702 0 0 0 104.668-66.82V181.206a73.216 73.216 0 0 0-34.453-62.326zM125.403 687.237v-349.64a4.608 4.608 0 0 1 4.608-4.608h122.035v358.882H130.048a4.608 4.608 0 0 1-4.644-4.634zm508.319 150.441a4.608 4.608 0 0 1-6.564 4.193L321.132 700.32V323.773l305.97-146.723a4.608 4.608 0 0 1 6.62 4.157v656.471zM938.26 478.72H788.01a34.509 34.509 0 1 0 0 69.018H938.26a34.509 34.509 0 1 0 0-69.018zM810.01 360.96a34.447 34.447 0 0 0 24.417-10.102l106.245-106.122a34.524 34.524 0 0 0-48.84-48.809L785.587 302.08a34.509 34.509 0 0 0 24.423 58.88zm24.417 314.609a34.524 34.524 0 1 0-48.84 48.814L891.832 830.52a34.524 34.524 0 0 0 48.84-48.809z" fill="#595BB3" />
                </svg>
                <a href="<?php echo $index_notice['url'] ?>" target="_blank" rel="noopener noreferrer nofollow"><?php echo $index_notice['text'] ?></a>
              </div>
            <?php endif; ?>
          </div>
          <div class="joe_index__list" data-wow="<?php $this->options->AList_Animate() ?>">
              <script src="<?php _getAssets('assets/js/Four-Index.js'); ?>"></script>
            <ul class="Four_list"></ul>
            
            <ul class="joe_list__loading">
              <li class="item">
                <div class="thumbnail"></div>
                <div class="information">
                  <div class="title"></div>
                  <div class="abstract">
                    <p></p>
                    <p></p>
                  </div>
                </div>
              </li>
              <li class="item">
                <div class="thumbnail"></div>
                <div class="information">
                  <div class="title"></div>
                  <div class="abstract">
                    <p></p>
                    <p></p>
                  </div>
                </div>
              </li>
            </ul>
          </div>