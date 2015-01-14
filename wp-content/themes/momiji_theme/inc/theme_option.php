<?php
// theme option
// theme option
add_action('admin_menu', function() {
    add_theme_page('Momiji Theme Option', 'Hiển thị trang chủ', 'manage_options', 'momiji-them-option', 'home_page_setting');
    // ten hien thi         hien thi menu     nguoi co quyen    id ten                ham setting
});
add_action('admin_init', function() {
    register_setting('home-page-group', 'home-cat1');
    register_setting('home-page-group', 'home-cat2');
    register_setting('home-page-group', 'home-cat3');
    register_setting('home-page-group', 'home-cat4');
    register_setting('home-page-group', 'home-cat5');
    // slide
    register_setting('home-page-group', 'slide-img1');
    register_setting('home-page-group', 'slide-img2');
    register_setting('home-page-group', 'slide-img3');
    register_setting('home-page-group', 'slide-img4');
    register_setting('home-page-group', 'slide-img5');
    
    register_setting('home-page-group', 'link-to1');
    register_setting('home-page-group', 'link-to2');
    register_setting('home-page-group', 'link-to3');
    register_setting('home-page-group', 'link-to4');
    register_setting('home-page-group', 'link-to5');
    
    register_setting('home-page-group', 'link-title1');
    register_setting('home-page-group', 'link-title2');
    register_setting('home-page-group', 'link-title3');
    register_setting('home-page-group', 'link-title4');
    register_setting('home-page-group', 'link-title5');
});

function home_page_setting() {
    $categories = get_categories(array());
    ?>
    <div class="wrap">
        <?php screen_icon(); ?>
        <h2>Display Option</h2>
        <form id="home_page_setting" method="post" action="options.php">
            <?php settings_fields('home-page-group'); ?>
            <h3>Chọn thể loại hiển thị trên trang chủ</h3>
            <?php for ($i=1; $i<=4; $i++){ ?>
            <select name="home-cat<?php echo $i ?>">
                <?php foreach ($categories as $cat) { ?>
                    <?php
                    $select = '';
                    if ($cat->term_id == get_option('home-cat'.$i))
                        $select = 'selected';
                    ?>
                    <option <?php echo $select; ?> value="<?php echo $cat->term_id; ?>"><?php echo $cat->name ?></option>
                <?php } ?>
            </select>
            <?php } ?>
            
            <hr />
            <h3>Chọn ảnh hiển thị Slide</h3>
            <?php for ($i=1; $i<=5; $i++){ ?>
            <div style="margin:10px; float: left;" >
                <label style="float:left; margin: 5px 5px 0 0;">Ảnh <?php echo $i ?>:</label>
                <input type="text" id="image_<?php echo $i ?>" name="slide-img<?php echo $i ?>" value="<?php echo get_option('slide-img'.$i) ?>" style="width: 350px; float:left; margin:0 5px;"/>
                <input id="_btn" onclick="upload_image(<?php echo $i ?>)" class="upload_image_button" type="button" value="Upload" />
            </div>
            <div style="margin:10px; float: left;">
                <label>Title: </label>
                <input type="text" value="<?php echo get_option('link-title'.$i) ?>" name="link-title<?php echo $i ?>" placeholder="Tiêu đề" />
            </div>
            <div style="margin:10px; float: left;">
                <label>Link đến: </label>
                <input type="text" name="link-to<?php echo $i ?>" value="<?php echo get_option('link-to'.$i) ?>" style="width: 300px;" />
            </div>
            <div style="clear: both"></div>
            <?php } ?>


            <?php add_thickbox(); ?>
            <script>
                function upload_image(id) {
                    tb_show('', 'media-upload.php?type=image&width=900&height=550&TB_iframe=true');

                    window.send_to_editor = function (html) {
                        imgurl = jQuery('img', html).attr('src');
                        jQuery("#image_" + id).val(imgurl);
                        tb_remove();
                    };
                }
            </script>

            <?php submit_button(); ?>
        </form>

        <?php
    }
