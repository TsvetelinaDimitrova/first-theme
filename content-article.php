    <div class="conteiner">
        <header class="content-header">
            <div>
                <span class="date"><?php the_date(); ?></span>
                <?php the_tags('<span class="tag"></span>')
                ?>
                <span class="comment"><a href="#comments"><?php comments_number(); ?></a></span>
            </div>
        </header>
    </div>
    <?php
    the_content();
    ?>

    <?php 
    comments_template();
    ?>
    
</div>