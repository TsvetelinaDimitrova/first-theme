<?php
/*
Template Name: Author List
*/

get_header();
// get a list of users
$authors = get_users();
echo '<div class="list-autors">';
// check if there are any users (there should be at least 1)
if (!empty($authors)) {

    // print out the title of the page as a heading 1
    echo '<h1 class="page-title">' . get_the_title() . '</h1>';
    
    // loop through each user
    foreach ($authors as $author) {

        // get all posts authored by this user
        $posts = get_posts(array('author' => $author->ID, 'numberposts' => -1));
    
        // check if the user authored any posts and skip them if they have no posts
        if (!empty($posts)) {
           
            // print out the users name as a heading 2
            $link = '<a href="">' . $author->display_name . '</a>';
            echo '<h3 class="author-link">' . $link . '</h3>';

        
            if ( $author = get_post_meta( $post->ID, 'guest-author', true ) )
            $name = $author;
            echo $name;
            // print the start of the list of posts
            echo '<ul>';

            // loop through each post
            foreach ($posts as $post) {
                // print each post as a list item including post link and post title
                echo '<li><a href="' . get_permalink($post->ID) . '">';
                echo $post->post_title;
                echo '</a></li>';
            }

            // end the list of posts
            echo '</ul>';
        
        }
    }
  echo '</div>';
}

// get the page footer
get_footer();
?>
