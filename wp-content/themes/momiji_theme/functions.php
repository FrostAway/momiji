<?php

// Add RSS links to <head> section
automatic_feed_links();

//post thumbnail
add_theme_support('post-thumbnails');
add_image_size("medium", 225, 225);
add_image_size("small", 107, 107);

//set default thumbnail

add_filter('post_thumbnail_html', function($image) {
    if (empty($image)) {
        $image = '<img src="' . get_template_directory_uri() . '/asset/source/default-image.jpg" />';
    }
    return $image;
});

// Load jQuery
if (!is_admin()) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"), false);
    wp_enqueue_script('jquery');
}

// Clean up the <head>
function removeHeadLinks() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
}

add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');

// Declare sidebar widget zone
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Sidebar Widgets',
        'id' => 'sidebar-widgets',
        'description' => 'These are widgets for the sidebar.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));
}

//filter excerpt
add_filter('the_excerpt', function($excerpt) {
    return str_replace('<p', '<p class="excerpt"', $excerpt);
});

//pagination

function my_post_queries($query) {
    // do not alter the query on wp-admin pages and only alter it if it's the main query
    if (!is_admin() && $query->is_main_query()) {

        // alter the query for the home and category pages 

        if (is_home()) {
            $query->set('posts_per_page', 3);
        }

        if (is_category()) {
            $query->set('posts_per_page', 3);
        }

        if (is_search()) {
            $query->set('posts_per_page', 3);
        }
        
    }
}

add_action('pre_get_posts', 'my_post_queries');


//add class to next previous link
add_filter('next_posts_link_attributes', function() {
    return 'class="page-next"';
});
add_filter('previous_posts_link_attributes', function() {
    return 'class="page-prev"';
});

// excerpt length
function my_excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
    return $excerpt;
}


// get and set post view

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0 View';
    }
    return $count.' Views';
}
 
// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
 
// Add it to a column in WP-Admin - (Optional)
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('Views');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}

?>