<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('includes/header.php'); ?>

<div class="text-white bg-[#141414] mt-10 px-20" >
    <article class="flex justify-center flex-col " >
        <div class="text-2xl  text-center mt-10">
        <?php $this->title() ?>
</div>
        <ul class="post-meta ">
        <div class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
            <li><?php _e('时间: '); ?>
                <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time>
            </li>
            <li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
        </ul>
    
        <p itemprop="keywords" class="tags"><?php _e('标签: '); ?><?php $this->tags(', ', true, 'none'); ?></p>
    </article>

    <?php $this->need('includes/comments.php'); ?>

    <ul class="post-near">
        <li>上一篇: <?php $this->thePrev('%s', '没有了'); ?></li>
        <li>下一篇: <?php $this->theNext('%s', '没有了'); ?></li>
    </ul>
<?php $this->need('includes/sidebar.php'); ?>

</div><!-- end #main-->

<?php $this->need('includes/footer.php'); ?>
