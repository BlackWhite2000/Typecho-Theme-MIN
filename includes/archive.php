<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('includes/header.php'); ?>

<div class="col-mb-12 col-8" id="main" role="main">
    <h3 class="text-white"><?php $this->archiveTitle([
            'category' => _t('分类 %s 下的文章'),
            'search'   => _t('包含关键字 %s 的文章'),
            'tag'      => _t('标签 %s 下的文章'),
            'author'   => _t('%s 发布的文章')
        ], '', ''); ?></h3>
    <?php if ($this->have()): ?>
        <?php while ($this->next()): ?>
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
    <?php else: ?>
        <article class="post">
            <h2 class="text-white">没有找到内容</h2>
        </article>
    <?php endif; ?>

    <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</div><!-- end #main -->

<?php $this->need('includes/footer.php'); ?>
