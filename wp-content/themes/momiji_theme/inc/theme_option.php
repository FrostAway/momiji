<?php
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
                <input type="text" id="image_1" name="slide-img1" value="<?php echo get_option('slide-img1') ?>" style="width: 550px; float:left; margin:0 5px;"/>
                <input id="_btn" onclick="upload_image(1)" class="upload_image_button" type="button" value="Upload Image" />
            </div>
            <div style="margin:10px;">
                <label style="float:left; margin: 5px 5px 0 0;">Image 2:</label>
                <input type="text" id="image_2" name="slide-img2" value="<?php echo get_option('slide-img2') ?>" style="width: 550px; float:left; margin:0 5px;"/>
                <input id="_btn" onclick="upload_image(2)" class="upload_image_button" type="button" value="Upload Image" />
            </div>
            <div style="margin:10px;">
                <label style="float:left; margin: 5px 5px 0 0;">Image 3:</label>
                <input type="text" id="image_3" name="slide-img3" value="<?php echo get_option('slide-img3') ?>" style="width: 550px; float:left; margin:0 5px;"/>
                <input id="_btn" onclick="upload_image(3)" class="upload_image_button" type="button" value="Upload Image" />
            </div>
            <div style="margin:10px;">
                <label style="float:left; margin: 5px 5px 0 0;">Image 4:</label>
                <input type="text" id="image_4" name="slide-img4" value="<?php echo get_option('slide-img4') ?>" style="width: 550px; float:left; margin:0 5px;"/>
                <input id="_btn" onclick="upload_image(4)" class="upload_image_button" type="button" value="Upload Image" />
            </div>
            <div style="margin:10px;">
                <label style="float:left; margin: 5px 5px 0 0;">Image 5:</label>
                <input type="text" id="image_5" name="slide-img5" value="<?php echo get_option('slide-img5') ?>" style="width: 550px; float:left; margin:0 5px;"/>
                <input id="_btn" onclick="upload_image(5)" class="upload_image_button" type="button" value="Upload Image" />
            </div>

            <?php add_thickbox(); ?>
            <script>
                function upload_image(id) {
                    tb_show('', 'media-upload.php?type=image&TB_iframe=true');

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
