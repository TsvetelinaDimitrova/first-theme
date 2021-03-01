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
                                    the_content();
                                }
                            }
                        ?>	
                    </article>
                </div>
            </div>
	</div>
    <?php get_footer();?>
    