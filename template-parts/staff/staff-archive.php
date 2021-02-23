<div class="col-sm-6 col-md-4 staff_prepodlist">
    <article>
        <a href="<?php echo get_permalink(); ?>">
			<?php if ( has_post_thumbnail() )
			{
				the_post_thumbnail( 'full', array( 'class' => 'img-fluid center-block' ) );
			}
			the_title( '<h4>', '</h4>' ); ?>
        </a>
    </article>
</div><!-- #post-## -->
