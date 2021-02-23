<?php if ( is_category() ): ?>
    <div class="container-fluid staff_red">
        <h1> <?php single_cat_title() ?></h1>
        <p>
			<?php if ( function_exists( 'dds_readline' ) ):
				dds_readline( ' / ' );
			endif; ?>
        </p>
    </div>
<?php else: ?>
    <div class="container-fluid staff_red">
        <a href="<?php the_permalink(); ?>">
            <h1><?php the_title(); ?></h1></a>
        <p>
			<?php if ( function_exists( 'dds_readline' ) ):
				dds_readline( ' / ' );
			endif; ?>
        </p>
    </div>
<?php
endif;
