<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

        </div><!-- end .row -->
    </div>
</div><!-- end #body -->
<script src="js/js.js" ></script>
<script src="js/bootstrap.bundle.min.js" ></script>

<footer id="footer" role="contentinfo" class="text-center mt-5">
    <p>Copyright &copy; <?php echo date('Y'); ?> <a class="mb-5" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a></p>
    <p><?php _e('Powered by <a href="http://www.typecho.org">Typecho</a>  · <a href="#">Theme ZERO MIN</a>'); ?></p>
</footer><!-- end #footer -->

<?php $this->footer(); ?>
</body>
</html>
