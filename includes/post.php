<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('includes/header.php'); ?>
<link rel="stylesheet" href="<?php $this->options->themeUrl('dist/css/post.css'); ?>">
<div class="px-40">
<div class="text-[#d9d9d9] bg-[#141414] mt-10 px-20">
    <article class="flex justify-center flex-col ">
        <div class="text-2xl  text-center mt-10">
            <?php $this->title() ?>
        </div>
        <div class="leading-loose mb-2 tracking-widest" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
        <div class="flex flex-1 mb-2">
            <div class="p-2 bg-[#292929] text-[#141414] text-xs rounded-md"><?php $this->category(', '); ?>, <?php $this->tags(', ', true, ''); ?></div>
        </div>
    </article>

    <?php $this->need('includes/comments.php'); ?>

    <ul class="post-near">
        <li class="text-2xl">上一篇: <?php $this->thePrev('%s', '没有了'); ?></li>
        <li>下一篇: <?php $this->theNext('%s', '没有了'); ?></li>
    </ul>
    <?php $this->need('includes/sidebar.php'); ?>

</div><!-- end #main-->M/div>
<?php $this->need('includes/footer.php'); ?>