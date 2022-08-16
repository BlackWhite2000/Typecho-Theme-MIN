<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('includes/header.php'); ?>
<link rel="stylesheet" href="<?php $this->options->themeUrl('dist/css/post.css'); ?>">
<div class="px-40">
<div class="text-[#d9d9d9] bg-[#141414] mt-10 px-20 rounded-md">
    <article class="flex justify-center flex-col mb-10">
        <h2 class="text-center my-10">
            <?php $this->title() ?>
        </h2>
        <div class="leading-loose mb-2 tracking-widest" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
        <div class="flex flex-1 mb-2 ">
            <div class="px-3 py-2 bg-[#292929] text-[#141414] rounded-md text-sm"><?php $this->category(', '); ?><?php $this->tags(', ', true, ''); ?></div>
        </div>
    </article>
   <ul class="flex justify-between mb-4 mx-2">
        <li>上一篇: <?php $this->thePrev('%s', '没有了'); ?></li>
        <li class="order-last">下一篇: <?php $this->theNext('%s', '没有了'); ?></li>
    </ul> 
    
    <?php $this->need('includes/comments.php'); ?>
    <div class="pb-12" / >



</div><!-- end #main-->
<?php $this->need('includes/footer.php'); ?>