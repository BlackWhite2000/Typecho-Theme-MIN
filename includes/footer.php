<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

        </div><!-- end .row -->
    </div>
</div><!-- end #body -->
<footer id="footer" role="contentinfo" class="dark:text-[#999999] text-center mt-16">
    <p class="mb-2">Copyright &copy; <?php echo date('Y'); ?><a class="ml-2" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a><a href="/admin" class="ml-2">admin</a></p>
    <p>Powered by <a href="http://www.typecho.org" class="mr-2">Typecho</a>·<a href="https://github.com/BlackWhite2000/Typecho-Theme-MIN" class="ml-2">Theme ZERO MIN</a></p>
</footer><!-- end #footer -->

<?php $this->footer(); ?>
</body>
</html>
