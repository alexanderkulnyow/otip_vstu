<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Otip_Theme
 */
?>
</div>
<footer class="container-fluid footer">
    <div class="row bloginfo justify-content-center">
        <a href="https://vstu.by/ru/">
            <img src="<?php bloginfo('template_directory'); ?>/img/vstu_logo_new.png" alt="logo">
        </a>
            <p><?php echo get_bloginfo( 'description' ) ?></p>

    </div>
    <div>
        <p class="footbrand">
            &#169; Кафедра "<?php bloginfo( 'name' ); ?>" 2017г.
        </p>
    </div>
<script type="text/javascript">
    console.log('Designed by Alexander Kulnyow https://dds.by')
</script>
</footer>
<?php wp_footer(); ?>

<!-- Designed & by dds.by. Vitebsk, Belarus-->
<!--http://dds.by/-->
</body>
</html>
