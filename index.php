<?php

/**
 * Default theme for Typecho
 *
 * @package Typecho Replica Theme
 * @author Typecho Team
 * @version 1.2
 * @link http://typecho.org
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('min/header.php');
?>



<!--标题-->
<div class="row">
    <!--最新文章-->
    <div class="col">
        <figure class="mb-0 lead">
            <blockquote class="blockquote text-white text-opacity-75">
                <h4>最新文章</h4>
            </blockquote>
            <figcaption class="blockquote-footer mb-0">
                NEW
            </figcaption>
    </div>
    <!--分页-->
    <div class="col text-end">
        <figure class="mb-0 lead">
            <blockquote class="blockquote text-white text-opacity-25">
                分页
            </blockquote>
            <figcaption class="blockquote-footer mb-0 text-white text-opacity-75">
                <?php $this->pageLink('<i class="fa fa-angle-double-left"></i>'); ?>
                <?php if ($this->_currentPage > 1) echo $this->_currentPage;
                else echo 1; ?> / <?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?>
                <?php $this->pageLink('<i class="fa fa-angle-double-right"></i>', 'next'); ?>
            </figcaption>
    </div>
</div>
</figure>
<!--end 标题-->

<!--输出最新文章-->
<div class="row row-cols-1 row-cols-lg-4 g-2 g-lg-2 mt-0 " style="align-items: center;justify-content: center;">
    <?php while ($this->next()) : ?>
        <div class="col">
            <div class="card" style="background-color:#141414;">
                <article class="post h-200px" itemscope itemtype="http://schema.org/BlogPosting">
                    <?php if (($this->fields->banner) == '') : ?>
                        <div class="card-body row ">
                            <a itemprop="url" href="<?php $this->permalink() ?>">
                                <div class="card-title fs-5 text-white "><?php $this->title() ?></div>
                            </a>
                        </div>
                        <div class="card-body row">
                            <small class="text-white text-opacity-50">
                                <p class="card-text"><?php $this->content('- 阅读剩余部分 -'); ?></p>
                                <div class="float-start"><?php $this->category(','); ?></div>
                                <div class="float-end">
                                    <?php $this->commentsNum('<i class="fa-solid fa-message"></i> 0', '<i class="fa-solid fa-message"></i> 1', '<i class="fa-solid fa-message"></i> %d'); ?>
                                    <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished" style="margin-left:5px;"><i class="fa-solid fa-clock"></i> <?php $this->date(); ?></time>
                                </div>
                            </small>
                        </div>
                        <!--end .card-body-->
                    <?php else : ?>

                        <img src="<?php echo $this->fields->banner; ?>" class="card-img opacity-25" alt="banner">


                        <div class="card-img-overlay row" style="align-content: space-between;">

                            <a itemprop="url" href="<?php $this->permalink() ?>">
                                <div class="card-title fs-5 text-white"><?php $this->title() ?></div>
                            </a>
                            <small class="text-white text-opacity-50 ">
                                <p class="card-text"><?php $this->content('- 阅读剩余部分 -'); ?></p>
                                <div class="float-start"><?php $this->category(','); ?></div>
                                <div class="float-end">
                                    <?php $this->commentsNum('<i class="fa-solid fa-message"></i> 0', '<i class="fa-solid fa-message"></i> 1', '<i class="fa-solid fa-message"></i> %d'); ?>
                                    <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished" style="margin-left:5px;"><i class="fa-solid fa-clock"></i> <?php $this->date(); ?></time>
                                </div>
                            </small>
                        </div>

                    <?php endif; ?>
                </article>
            </div>
            <!--end .card-->

        </div>
        <!--end .col-->

    <?php endwhile; ?>

</div>
<!--end .row-->


</div><!-- end #main-->


<?php $this->need('min/footer.php'); ?>