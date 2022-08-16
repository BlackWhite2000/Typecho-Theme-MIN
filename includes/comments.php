<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()) : ?>
        <h3 class="mb-4"><?php $this->commentsNum(_t('暂无评论'), _t('已有 1 条评论'), _t('已有 %d 条评论')); ?></h3>
    <?php endif; ?>

    <?php if ($this->allow('comment')) : ?>
        <div id="<?php $this->respondId(); ?>" class="respond">
            <div class="cancel-comment-reply">
                <?php $comments->cancelReply(); ?>
            </div>

            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form" class="p-4 bg-[#292929] rounded-md">
                <?php if ($this->user->hasLogin()) : ?>
                    <p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a>
                    </p>
                <?php else : ?>
                    <div class="flex w-full">
                        <p class="w-3/12 mr-1 my-1">
                            <input type="text" name="author" id="author" class="text bg-[#292929] px-3 py-1.5 rounded-md border-dashed border border-[#666666] w-full" placeholder="名称" value="<?php $this->remember('author'); ?>" required />
                        </p>
                        <p class="w-3/12 m-1">

                            <input type="email" name="mail" id="mail" class="text bg-[#292929] px-3 py-1.5 rounded-md border-dashed border border-[#666666] w-full" placeholder="邮箱" value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail) : ?> required<?php endif; ?> />
                        </p>
                        <p class="w-6/12 ml-1 my-1">
                            <input type="url" name="url" id="url" class="text bg-[#292929] px-3 py-1.5 rounded-md border-dashed border border-[#666666] w-full" placeholder="http://" value="<?php $this->remember('url'); ?>" <?php if ($this->options->commentsRequireURL) : ?> required<?php endif; ?> />
                        </p>
                    </div>
                <?php endif; ?>
                <p class="w-full my-1">

                    <textarea rows="8" cols="50" name="text" id="textarea" class="textarea bg-[#292929] px-3 py-1.5 rounded-md border-dashed border border-[#666666] w-full" placeholder="欢迎留言" required><?php $this->remember('text'); ?></textarea>
                </p>
                <div class="pt-2 flex justify-between">
                    <div class="bg-[#d9d9d9] px-5 py-2 rounded-sm text-[#1e1e1f]">表情</div>
                    <button type="submit" class="submit bg-[#d9d9d9] px-5 py-2 rounded-sm text-[#1e1e1f] order-last">提交评论</button>
                </div>
            </form>
        </div>
        <?php $comments->listComments(); ?>
        <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>

    <?php else : ?>
        <h3>评论已关闭</h3>
    <?php endif; ?>
</div>