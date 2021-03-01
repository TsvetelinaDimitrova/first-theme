<?php

function theme_support(){
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    // add_theme_support( "custom-header", $args );
    // add_theme_support( "custom-background", $args );
}
add_action('after_setup_theme','theme_support');


//Register Sidebar
function main_menus(){
    $locations = array(
        'primary' => "Header Menu Items",
        'footer' => "Footer Menu Items"
    );

    register_nav_menus($locations);
}

add_action('init', 'main_menus');



add_theme_support('widgets');
function my_sidebar()
{
    register_sidebar(
        array(
            'name' => 'Primary Sidebar',
            'id' => 'primary-sidebar',
            'description' => 'The Primary Area',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )
    );
    
    register_sidebar(
        array(
            'name' => 'Secondary Sidebar',
            'id' => 'secondary-sidebar',
            'description' => 'The Secondary Area',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )
    );
}
add_action('widgets_init', 'my_sidebar');

/* add_filter( 'the_author', 'guest_author_name' );
add_filter( 'get_the_author_display_name', 'guest_author_name' );
 
function guest_author_name( $name ) {
    global $post;
 
    $author = get_post_meta( $post->ID, 'guest-author', true );
 
    if ( $author )
    $name = $author;
    return $name;
}
*/

if ( ! isset( $content_width ) ) $content_width = 900;


class wpc_post_author{
    
    public function __construct(){    
        add_action('add_meta_boxes', [$this, 'create_meta_box']);
        add_action('save_post', [$this,'save_author']);
    }

    public function create_meta_box(){
        add_meta_box('wpc_author', 'Post Autor', [$this, 'meta_box_html'], ['post']);
    }

    public function save_author($post_id){
        if(isset($_POST['wpc_post_author']) && is_numeric($_POST['wpc_post_author'])){
            $author_id = _sanitize_text_fields($_POST['wpc_post_author']);
            update_post_meta($post_id, 'wpc_post_author', $author_id);
        }
    }

    public function meta_box_html(){
        $user_query = new WP_User_Query([
            'role' => 'author',
            'number' => '-1',
            'fields' => [
                'display_name',
                'ID',
            ],
        ]);

        $authors = $user_query->get_results();

        if(! empty($authors)){

        ?>
            <label for="post_author">Autor:</label>
            <select name="wpc_post_author" id="post_author">
                <option> - Select One -</option>
                <?php
                    foreach($authors as $author){
                        echo'<option value="'.$author->ID.'" '.selected(get_post_meta(get_the_ID(),
                        'wpc_post_author', true), $author->ID, false).'>' .$author->display_name.'</option>';
                    }
                ?>
            </select>
        <?php
        } else {
            echo '<p>No Autors Found.</p>';
        }
    }
}

new wpc_post_author();
    
/**
 * hook to the 'add_meta_boxes' action to modify title
 */
add_action('add_meta_boxes', 'change_author_metabox');
function change_author_metabox() {
    global $wp_meta_boxes;
    $wp_meta_boxes['post']['normal']['core']['authordiv']['title']= 'Redakteur';
}

add_filter( 'manage_edit-post_columns', 'rename_author_column' );
function rename_author_column( $columns ) {
    $columns['author'] = 'Redaktuer';
    return $columns;
}
?>

