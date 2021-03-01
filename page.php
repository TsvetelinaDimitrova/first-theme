<?php get_header();?>
<div>    
    <div class="page-title">
        <header>
            <h1 class="heading"><?php the_title();?></h1>
        </header>
    </div>
    <div>
        <article class="content">
            <?php 
                if( have_posts() ){
                    while ( have_posts() ){
                        the_post();
                        get_template_part('content', 'page' );
                    }
                }
            ?>	

            <?php 
                the_posts_pagination();
            ?>
        </article>
    </div>
</div>

<?php get_footer();?>
