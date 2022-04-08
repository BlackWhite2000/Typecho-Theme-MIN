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


 
<div class="container">
    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3 ">


    <?php while ($this->next()) : ?>
      
   <div class="col">
            <div class="card " >
                  <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
              <a itemprop="url" href="<?php $this->permalink() ?>"><img src="..." class="card-img-top" alt="..."></a>
                
                <div class="card-body">
                    <h5 class="card-title"><?php $this->title() ?></h5>
                    <p class="card-text"><?php $this->content('- 阅读剩余部分 -'); ?></p>
                    <a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a><br>
                    <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><i class="fa-solid fa-clock"></i> <?php $this->date(); ?></time> 
                    <?php $this->category(','); ?>
                    <a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a>
                 
                </div>
                <!--end .card-body-->
   </article>
            </div>
            <!--end .card--> 

        </div>
        <!--end .col-->
     
    <?php endwhile; ?>




    </div>
    <!--end .row-->

</div> 
<!--end .container-->

    <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</div><!-- end #main-->

<?php $this->need('min/sidebar.php'); ?>
<?php $this->need('min/footer.php'); ?>