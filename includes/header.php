<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="dark">

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
    <link rel="stylesheet" href="//unpkg.com/element-plus/dist/index.css" />
    <link rel="stylesheet" href="<?php $this->options->themeUrl('dist/css/main.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('dist/css/style.css'); ?>">
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>

<body class="dark:bg-[#1e1e1e]" style='background-image: url(<?php $this->options->themeUrl('dist/img/overlay.png'); ?>)'>

    <header>
        <div class="container mx-auto" >

            <!--标题-->
            <div class="flex justify-center flex-col items-center mt-12 dark:text-white">
                <div class="text-5xl mb-2.5"> <?php $this->options->title() ?> </div>
                <div class="h-px w-4 dark:bg-[#7e7e7e]"></div>
                <div class="text-xl pt-2.5 tracking-wider dark:text-[#7e7e7e]"><?php $this->options->description() ?> </div>


                <!--搜索-->
                <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search" class="w-1/3 mt-10">

                    <input type="text" id="s" name="s" placeholder="<?php _e('输入关键字搜索'); ?>" class="rounded-full h-14 w-full pl-4 dark:bg-[#1e1e1e] dark:border-2 dark:border-[#282829]" />

                </form>

                <!--导航-->
                <ul class="flex flex-row mt-12">

                    <!--首页-->
                    <li>
                        <a class="p-5 no-underline" href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
                    </li>

                    <!--独立页面-->
                    <?php \Widget\Contents\Page\Rows::alloc()->to($pages); ?>
                    <?php while ($pages->next()) : ?>

                        <li>
                            <a class="p-5 no-underline" <?php if ($this->is('page', $pages->slug)) : ?> <?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
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
                                <li>
                                    <a class="p-5 no-underline" <?php if ($this->is('page', $categorys->slug)) : ?> <?php endif; ?> href="<?php $categorys->permalink(); ?>" title="<?php $categorys->name(); ?>"><?php $categorys->name(); ?></a>
                                </li>

                            <?php } else { ?>

                                <!--拥有子类-->
                                <li class="group">
                                    <a class="p-5 no-underline" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><?php $categorys->name(); ?> <span class="iconify inline -mx-2" data-icon="ic:baseline-arrow-drop-down" data-width="28"></span></a>
                                    <ul class="hidden group-hover:block">
                                        <!--输出-->
                                        <?php foreach ($children as $mid) { ?>
                                            <?php $child = $categorys->getCategory($mid); ?>
                                            <li class="absolute m-3"><a class="py-3 px-5 no-underline hover:bg-[#3c3d3e]" href="<?php echo $child['permalink'] ?>"><?php echo $child['name']; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>

                                <?php } ?><?php endif; ?>
                            <?php endwhile; ?>

                </ul>
                <!--end .nav .nav-pills-->

            </div>
    </header><!-- end #header -->
    <div>
        <div class="container mx-auto">