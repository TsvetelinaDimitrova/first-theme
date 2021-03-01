<?php get_header();?>
    <div>
        <div class="page-title">
            <header>
                <h1 class="heading"><?php the_title();?></h1>
                <p class="author-name"> 
                    <?php  if ($author_id = get_post_meta(get_the_ID(), 'wpc_post_author', true)){
                        ?> Autor: <?php echo get_the_author_meta('display_name', $author_id); ?>
                    <?php } ?>
                </p>
            </header>
        </div>
        <div>
            <article class="content">
                <?php 
                    if( have_posts() ){
                        while ( have_posts() ){
                            the_post();
                            
                            get_template_part('content', 'article');
                        }
                    }
                ?>	
            </article>
        </div>
    
<?php if(is_active_sidebar('page-sidebar') ):?>	
	<?php dynamic_sidebar('page-sidebar');?>
<?php endif;?>

<?php get_footer();?>