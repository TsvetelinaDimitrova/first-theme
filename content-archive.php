<div class="container">
    <div class="post">
        <div class="media">
            <img src="<?php the_post_thumbnail_url('thumbnail');?>" alt="image">
        </div>
        
        <div class="media-body">
            <h3><?php the_title(); ?></h3>
            <div>
                <span class="date"><?php the_date(); ?></span><br>
                <span class="comment"><?php comments_number(); ?></span>
            </div>
            <div>
                <?php 
                the_excerpt();
                ?>
            </div>
        <a class="more-link" href="<?php the_permalink(); ?>">Read more...</a>
        </div>
    </div>
</div>
