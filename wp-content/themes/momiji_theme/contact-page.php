<?php
/* 
 *  Template Name: Contact Page
 */
?>

<?php get_header() ?>

<div id="single">
    <div id="main"> 
        <div id="content">
            
            <div id="main-content" class="box-sizing">
                <h3 class="box-title">Liên hệ</h3>
                <div class="line"></div>
                <div class="clear"></div>
                <div class="post-bar">
                    <div class="post-thumbnail">
                        <a href=""><img src="<?php echo bloginfo('template_directory'); ?>/asset/source/body/contact.jpg" /></a>
                    </div>
                    <div class="bar-author">
                        <h4>Quản lý</h4>
                        <h4 class="author-name"><?php echo get_option('blogname') ?></h4>
                        <div class="author-info">
                            <div class="avatar">
                                <a href="<?php  ?>"><?php echo get_avatar(1, 74) ?></a>
                            </div>
                            <div class="info">
                                <?php echo get_the_author_meta('description', 1) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="post-content">
                    
                    <h4 class="box-content">Liên hệ</h4>
                    <a href="single.php"></a>
                    <form method="post" action="" class="data-form">
                        
                        <label>Họ tên: </label>
                        <p><input name="contact[name]" type="text" placeholder="Họ tên" required="" /></p>
                        <label>Điện thoại: </label>
                        <p><input name="contact[phone]" type="text" placeholder="01234567899" /></p>
                        <label>Email: </label>
                        <p><input name="contact[email]" type='email' placeholder="example@gmail.com" required=""/></p>
                        <label>Chủ đề: </label>
                        <p><input name="contact[subject]" type="text" placeholder="Chủ đề" required="" /></p>
                        <label>Nội dung: </label>
                        <p><textarea name="contact[content]" placeholder="Nội dung" required=""></textarea></p>
                        <p><input type="submit" name="contact-submit" value="Gửi" /></p>
                    </form>
            
                </div>

                <!-- End list - box main -->
            </div>
            <!-- End detail post -->

            <?php get_sidebar("news") ?>
            <!-- End right bar -->
        </div>
        <!-- End content -->
    </div>
    <!-- End main -->
</div>

<?php get_footer() ?>

