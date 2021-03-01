<?php get_header();?>
<div>    
    <article class="content">
        <?php 
            if( have_posts() ){
                while ( have_posts() ){
                    the_post();
                    get_template_part('content', 'archive' );
                    }
            }
        ?>	
    </article>
</div>

<?php get_footer();?>
