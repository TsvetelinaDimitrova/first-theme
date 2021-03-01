<?php get_header();?>

	<article class="content">

        <?php 
            if( have_posts() ){
                while ( have_posts() ){
                    the_post();
                    get_template_part('content', 'archive' );
                }
            }
        ?>	

        <?php 
            the_posts_pagination();
            // Displays a paginated navigation to next/previous set of posts, when applicable.
        ?>
	</article>

<?php get_footer();?>
