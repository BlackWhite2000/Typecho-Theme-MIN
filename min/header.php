<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle([
                'category' => _t('分类 %s 下的文章'),
                'search'   => _t('包含关键字 %s 的文章'),
                'tag'      => _t('标签 %s 下的文章'),
                'author'   => _t('%s 发布的文章')
            ], '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/css.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/fontawesome-6.1.1/css/all.min.css'); ?>">
    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>

<body>

    <header id="header" class="clearfix">
        <div class="container">
            <div class="row">

                <!--标题-->
                <figure class="text-center mt-5 mb-4">
                    <blockquote class="blockquote">
                        <h1><?php $this->options->title() ?></h1>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                        <h4><?php $this->options->description() ?></h4>
                    </figcaption>
                </figure>
                
                <!--搜索-->
                <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search" class="nav justify-content-center">
                    <div class="form-floating mb-4 col-5">
                        <input type="text" id="s" name="s" class="text form-control me-2 rounded-pill" placeholder="<?php _e('输入关键字搜索'); ?>" />
                        <label for="floatingInput"><?php _e('输入关键字搜索'); ?></label>
                    </div>
                </form>

                <!--导航-->
                <ul class="nav nav-pills justify-content-center mb-3">

                    <!--首页-->
                    <li class="nav-item">
                        <a<?php if ($this->is('index')) : ?> class="nav-link" <?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
                    </li>

                    <!--独立页面-->
                    <?php \Widget\Contents\Page\Rows::alloc()->to($pages); ?>
                    <?php while ($pages->next()) : ?>
                        <li class="nav-item">
                            <a class="nav-link" <?php if ($this->is('page', $pages->slug)) : ?> <?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                        </li>
                    <?php endwhile; ?>

                    <!--分类, 带下拉菜单-->
                    <?php \Widget\Metas\Category\Rows::alloc()->to($categorys); ?>
                    <?php while ($categorys->next()) : ?>
                        <!--判断-->
                        <?php if ($categorys->levels === 0) : ?>
                            <?php $children = $categorys->getAllChildren($categorys->mid); ?>
                            <?php if (empty($children)) { ?>

                                <!--没有子类-->
                                <li class="nav-item">
                                    <a class="nav-link" <?php if ($this->is('page', $categorys->slug)) : ?> <?php endif; ?> href="<?php $categorys->permalink(); ?>" title="<?php $categorys->name(); ?>"><?php $categorys->name(); ?></a>
                                </li>

                            <?php } else { ?>

                                <!--拥有子类-->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><?php $categorys->name(); ?></a>
                                    <ul class="dropdown-menu">
                                        <!--输出-->
                                        <?php foreach ($children as $mid) { ?>
                                            <?php $child = $categorys->getCategory($mid); ?>
                                            <li><a class="dropdown-item" href="<?php echo $child['permalink'] ?>"><?php echo $child['name']; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>

                                <?php } ?><?php endif; ?>
                            <?php endwhile; ?>

                </ul>
                <!--end .nav .nav-pills-->

            </div><!-- end .row -->
        </div>
    </header><!-- end #header -->
    <div id="body">
        <div class="container">
            <div class="row">