<?php
// Add RSS links to <head> section
//automatic_feed_links();
//hide addmin bar
//add_action('after_setup_theme', function() {
//    if (!is_admin()) {
//        show_admin_bar(false);
//    }
//});
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
            $query->set('posts_per_page', 4);
        }

        if (is_category()) {
            $query->set('posts_per_page', 9);
        }

        if (is_search()) {
            $query->set('posts_per_page', 9);
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

function getPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0';
    }
    return $count;
}

// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Add it to a column in WP-Admin - (Optional)
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views', 5, 2);

function posts_column_views($defaults) {
    $defaults['post_views'] = __('Views');
    return $defaults;
}

function posts_custom_column_views($column_name, $id) {
    if ($column_name === 'post_views') {
        echo getPostViews(get_the_ID());
    }
}

//send a contact email

if (isset($_POST['contact-submit'])) {
    $contact = $_POST['contact'];

    if (wp_mail($contact['email'], $contact['subject'], $contact['content'])) {
        echo 'Đã gửi liên hệ của bạn';
        wp_redirect(home_url());
        exit();
    } else {
        echo 'Có lỗi xảy ra';
    }
}

// theme option
// theme option
add_action('admin_menu', function() {
    add_theme_page('Momiji Theme Option', 'Display Opiton', 'manage_options', 'momiji-them-option', 'home_page_setting');
    // ten hien thi         hien thi menu     nguoi co quyen    id ten                ham setting
});
add_action('admin_init', function() {
    register_setting('home-page-group', 'home-cat1');
    register_setting('home-page-group', 'home-cat2');
    register_setting('home-page-group', 'home-cat3');
    register_setting('home-page-group', 'home-cat4');
    // slide
    
    register_setting('home-page-group', 'slide-img1');
    register_setting('home-page-group', 'slide-img2');
    register_setting('home-page-group', 'slide-img3');
    register_setting('home-page-group', 'slide-img4');
    register_setting('home-page-group', 'slide-img5');
    
});

function home_page_setting() {
    $categories = get_categories(array());
    ?>
    <div class="wrap">
        <?php screen_icon(); ?>
        <h2>Display Option</h2>
        <form id="home_page_setting" method="post" action="options.php">
            <?php settings_fields('home-page-group'); ?>
            <h3>Select Category show in Home page</h3>

            <select name="home-cat1">
                <?php foreach ($categories as $cat) { ?>
                    <?php
                    $select = '';
                    if ($cat->term_id == get_option('home-cat1'))
                        $select = 'selected';
                    ?>
                    <option <?php echo $select; ?> value="<?php echo $cat->term_id; ?>"><?php echo $cat->name ?></option>
                <?php } ?>
            </select>
            <select name="home-cat2">
                <?php foreach ($categories as $cat) { ?>
                    <?php
                    $select = '';
                    if ($cat->term_id == get_option('home-cat2'))
                        $select = 'selected';
                    ?>
                    <option <?php echo $select; ?> value="<?php echo $cat->term_id; ?>"><?php echo $cat->name ?></option>
                <?php } ?>
            </select>
            <select name="home-cat3">
                <?php foreach ($categories as $cat) { ?>
                    <?php
                    $select = '';
                    if ($cat->term_id == get_option('home-cat3'))
                        $select = 'selected';
                    ?>
                    <option <?php echo $select; ?> value="<?php echo $cat->term_id; ?>"><?php echo $cat->name ?></option>
                <?php } ?>
            </select>
            <select name="home-cat4">
                <?php foreach ($categories as $cat) { ?>
                    <?php
                    $select = '';
                    if ($cat->term_id == get_option('home-cat4'))
                        $select = 'selected';
                    ?>
                    <option <?php echo $select; ?> value="<?php echo $cat->term_id; ?>"><?php echo $cat->name ?></option>
                <?php } ?>
            </select>

            <hr />
            <h3>Select Image Slide</h3>
            <div style="margin:10px;">
                <label style="float:left; margin: 5px 5px 0 0;">Image 1:</label>
                <input type="text" id="image_1" name="slide-img1" value="<?php echo  get_option('slide-img1') ?>" style="width: 550px; float:left; margin:0 5px;"/>
                <input id="_btn" onclick="upload_image(1)" class="upload_image_button" type="button" value="Upload Image" />
            </div>
            <div style="margin:10px;">
                <label style="float:left; margin: 5px 5px 0 0;">Image 2:</label>
                <input type="text" id="image_2" name="slide-img2" value="<?php echo  get_option('slide-img2') ?>" style="width: 550px; float:left; margin:0 5px;"/>
                <input id="_btn" onclick="upload_image(2)" class="upload_image_button" type="button" value="Upload Image" />
            </div>
            <div style="margin:10px;">
                <label style="float:left; margin: 5px 5px 0 0;">Image 3:</label>
                <input type="text" id="image_3" name="slide-img3" value="<?php echo  get_option('slide-img3') ?>" style="width: 550px; float:left; margin:0 5px;"/>
                <input id="_btn" onclick="upload_image(3)" class="upload_image_button" type="button" value="Upload Image" />
            </div>
            <div style="margin:10px;">
                <label style="float:left; margin: 5px 5px 0 0;">Image 4:</label>
                <input type="text" id="image_4" name="slide-img4" value="<?php echo  get_option('slide-img4') ?>" style="width: 550px; float:left; margin:0 5px;"/>
                <input id="_btn" onclick="upload_image(4)" class="upload_image_button" type="button" value="Upload Image" />
            </div>
            <div style="margin:10px;">
                <label style="float:left; margin: 5px 5px 0 0;">Image 5:</label>
                <input type="text" id="image_5" name="slide-img5" value="<?php echo  get_option('slide-img5') ?>" style="width: 550px; float:left; margin:0 5px;"/>
                <input id="_btn" onclick="upload_image(5)" class="upload_image_button" type="button" value="Upload Image" />
            </div>

            <?php add_thickbox(); ?>
            <script>
                function upload_image(id){
                    tb_show('', 'media-upload.php?type=image&TB_iframe=true');
                   
                     window.send_to_editor = function (html) {
                    imgurl = jQuery('img', html).attr('src');
                    jQuery("#image_"+id).val(imgurl);
                    tb_remove();
                };
            }

            </script>

            <?php submit_button(); ?>
        </form>

        <?php
    }

// add custom post 
    add_action('init', 'reg_product_post_type');

    function reg_product_post_type() {
        register_post_type('search-option', array(
            'labels' => array(
                'name' => 'Tìm kiếm',
                'singular_name' => 'Tìm kiếm',
                'add_new' => false,
                'edit_item' => false,
                'all_items' => false,
                'new_item_name' => false,
                'view_item' => false,
                'menu_name' => 'Tìm kiếm',
            ),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'search-option'),
            'has_archive' => true,
            'supports' => array(),
        ));

        register_taxonomy('school-category', 'search-option', array(
            'labels' => array(
                'name' => 'Trường ĐH',
                'singular_name' => 'Trường ĐH',
                'add_new' => 'Thêm Trường',
                'new_item_name' => 'Trường mới',
                'add_new_item' => 'Thêm Trường ĐH'
            ),
            'public' => true,
            'hierarchical' => true,
            'has_archive' => true,
            'show_admin_column' => true,
            'rewirte' => array('slug' => 'school'),
            'query_var' => true,
        ));
        register_taxonomy('city-category', array('school-category'), array(
            'labels' => array(
                'name' => 'Thành phố',
                'singular_name' => 'Thành phố',
                'add_new' => 'Thêm Thành phố',
                'new_item_name' => 'Thành phố mới',
                'add_new_item' => 'Thêm thành phố mới'
            ),
            'public' => true,
            'hierarchical' => false,
            'show_admin_column' => true,
            'rewirte' => array('slug' => 'city'),
            'query_var' => true,
        ));
    }
    ?>