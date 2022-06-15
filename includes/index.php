<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('includes/header.php');
?>
<!--标题-->
<div class="flex justify-between justify-items-center">
    <!--最新文章-->
    <div id="new-posts">
        <div class="dark:text-white text-2xl">
           {{ postsZh }}
        </div>
        <div class="dark:text-[#999999] text-lg font-light">
        {{ postsEn }}
        </div>

    </div>
  
    <!--分页-->
    <div>
        <div class="dark:text-[#999999] text-lg font-light text-right">
            分页
        </div>
        <div class="dark:text-white text-lg text-right">
            <?php $this->pageLink('<span class="iconify-inline inline" data-icon="ic:baseline-double-arrow" data-width="22" data-flip="horizontal"></span>'); ?>
            <?php if ($this->_currentPage > 1) echo $this->_currentPage;
            else echo 1; ?> / <?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?>
            <?php $this->pageLink('<span class="iconify-inline inline" data-icon="ic:baseline-double-arrow" data-width="22"></span>', 'next'); ?>
        </div>
    </div>

</div>

<!--end 标题-->

<!--输出最新文章-->
<div class="grid gap-2 mt-5 2xl:grid-cols-5 xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 grid-cols-1">
    <?php while ($this->next()) : ?>
        <div class="bg-[#141414] rounded-md <?php if (($this->fields->banner) !== '') : ?>bg-center bg-no-repeat bg-contain bg-cover <?php endif; ?>" <?php if (($this->fields->banner) !== '') : ?>style="background-image: url(<?php echo $this->fields->banner; ?>);<?php endif; ?>">
            <article itemscope itemtype="http://schema.org/BlogPosting" class="bg-[#141414] p-5 bg-opacity-75 h-full flex flex-col justify-between ">
            
                <a itemprop="url" href="<?php $this->permalink() ?>">
                    <div class="text-lg dark:text-white pb-5 truncate"><?php $this->title() ?></div>
                </a>

                <div class="dark:text-[#999999] text-sm">

                    <p class="truncate"><?php echo $this->fields->excerpt; ?></p>
                    <div class="flex justify-between justify-items-center mt-3">
                        <div>
                            <?php $this->category(','); ?>
                        </div>
                        <div>
                            <?php $this->commentsNum('<span class="iconify inline mb-0.5 mr-0.5" data-icon="uim:comment-alt"></span>0', '<span class="iconify inline mb-0.5 mr-0.5" data-icon="uim:comment-alt-message"></span>1', '<span class="iconify inline mb-0.5 mr-0.5" data-icon="uim:comment-alt-dots"></span>%d'); ?>
                            <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><span class="iconify inline mb-0.5 mr-0.5" data-icon="uim:clock-three"></span><?php $this->date(); ?></time>
                        </div>

                    </div>
                </div>

        </div>


    <?php endwhile; ?>




</div>

<script>
const newPosts = {
    data() {
      return {
        postsZh: '最新文章',
        postsEn: '-NEW',
      }
    }
  }
  
  Vue.createApp(newPosts).mount('#new-posts')

</script>
<?php $this->need('includes/footer.php'); ?>