<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    $logoUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'logoUrl',
        null,
        null,
        _t('站点 LOGO 地址'),
        _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO')
    );

    $form->addInput($logoUrl);

    $sidebarBlock = new \Typecho\Widget\Helper\Form\Element\Checkbox(
        'sidebarBlock',
        [
            'ShowRecentPosts'    => _t('显示最新文章'),
            'ShowRecentComments' => _t('显示最近回复'),
            'ShowCategory'       => _t('显示分类'),
            'ShowArchive'        => _t('显示归档'),
            'ShowOther'          => _t('显示其它杂项')
        ],
        ['ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'],
        _t('侧边栏显示')
    );

    $form->addInput($sidebarBlock->multiMode());

}

/*
function themeFields($layout)
{
    $logoUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'logoUrl',
        null,
        null,
        _t('站点LOGO地址'),
        _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO')
    );
    $layout->addItem($logoUrl);
}
*/


/**
 * 文章与独立页自定义字段
 */
function themeFields(Typecho_Widget_Helper_Layout $layout) {
    $excerpt = new Typecho_Widget_Helper_Form_Element_Textarea('excerpt', NULL, NULL, '文章摘要', '输入自定义摘要。留空自动从文章截取。');
    $excerpt->input->setAttribute('class', 'w-100');
    $layout->addItem($excerpt);
    $thumb = new Typecho_Widget_Helper_Form_Element_Text('banner', NULL, NULL, '文章主图', '留空自动从本地随机调用图片');
    $thumb->input->setAttribute('class', 'w-100');
    $layout->addItem($thumb);
    $customLink = new Typecho_Widget_Helper_Form_Element_Text('customLink', NULL, NULL, '外链跳转', '输入要跳转的外链。');
    $customLink->input->setAttribute('class', 'w-100');
    $layout->addItem($customLink);
    $copy_author = new Typecho_Widget_Helper_Form_Element_Text('copy_author', NULL, NULL, '转载作者', '文章转载自哪个网站，若为原创则留空');
    $copy_author->input->setAttribute('class', 'w-100');
    $layout->addItem($copy_author);
    $copy_link = new Typecho_Widget_Helper_Form_Element_Textarea('copy_link', NULL, NULL, '转载链接', '转载文章的链接，若为原创则留空');
    $copy_link->input->setAttribute('class', 'w-100');
    $layout->addItem($copy_link);

}