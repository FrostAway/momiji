
<?php get_header() ?>

<div id="main"> 
    <div id="content">
        <div id="main-content">
            <ul class="list-box">
                
                
                <?php $home_cats = array(get_option('home-cat1'), get_option('home-cat2'), get_option('home-cat3'), get_option('home-cat4')); ?>
                <?php foreach ($home_cats as $cat_id){ ?>
                
                    <li class="box">
                    <div class="bar"></div>
                    <div class="box-main">
                        <div class="above">
                            <?php 
                            query_posts(array('showposts'=>1, 'cat'=>$cat_id, 'orderby'=>'post_date', 'order'=>'desc'));
                            while(have_posts()): the_post();  
                            $postid = $post->ID;
                            ?>
                            <h3 class="box-title"><a href="<?php echo get_category_link($cat_id) ?>"><?php echo get_cat_name($cat_id) ?></a></h3>
                            <div class="box-post">
                                <div class="thumbnail">
                                    <a href="<?php the_permalink() ?>"><?php the_post_thumbnail("medium") ?></a>
                                </div>
                                <div class="box-content">
                                    <a href="<?php the_permalink() ?>"><h4 class="content-title"><?php the_title() ?></h4></a>
                                    <div class="time"><?php the_time('F j, Y') ?></div>
                                    <p><?php echo my_excerpt(15); ?></p>
                                    
                                </div>
                            </div>
                            <?php    endwhile; wp_reset_postdata(); ?>
                        </div>
                        <div class="box-meta">
                            <ul>
                                <?php query_posts(array('showposts'=>4, 'cat'=>$cat_id, 'offset'=>1)) ?>
                                <?php while(have_posts()): the_post(); ?>
                                <li><img src="<?php echo bloginfo('template_directory'); ?>/asset/source/body/dau-cham-19.png" /> <a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                        <a href="<?php echo get_category_link($cat_id) ?>" class="more-footer">Xem thêm</a>
                    </div>
                    </li>
                
                <?php } ?>
                
            </ul>
        </div>
        <!-- End list - box main -->

        <?php get_sidebar() ?>
        <!-- End right bar -->
    </div>
    <!-- End content -->

    <div class="clear"></div>
    <div id="banner">
        <a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/asset/source/banner/banner-34.jpg" /></a>
    </div>
    <!-- End banner -->

    <div id="about-service">
        <div class="first-col">
            <h3 class="about-title">CÁC DỊCH VỤ CỦA CHÚNG TÔI</h3>
            <ul>
                <li><img src="<?php echo bloginfo('template_directory'); ?>/asset/source/under-banner/icon-ben-trai-37.png" /><a href="<?php echo home_url() ?>/tu-van-du-hoc-3">Tư vấn du học</a></li>
                <li><img src="<?php echo bloginfo('template_directory'); ?>/asset/source/under-banner/icon-ben-trai-38.png" /><a href="<?php echo home_url() ?>/dao-tao-tieng-nhat">Đào tạo tiếng Nhật</a></li>
                <li><img src="<?php echo bloginfo('template_directory'); ?>/asset/source/under-banner/icon-ben-trai-39.png" /><a href="<?php echo home_url() ?>/tu-van-viec-lam">Tư vấn việc làm</a></li>
                <li><img src="<?php echo bloginfo('template_directory'); ?>/asset/source/under-banner/icon-ben-trai-40.png" /><a href="<?php echo home_url() ?>/to-chuc-hoi-thao-du-hoc">Tổ chức hội thảo du học</a></li>
            </ul>
        </div>

        <div class="second-col">
            <div class="bg-col">
                <h3 class="about-title">LÝ DO NÊN CHỌN MOMIJI</h3>
                <ul>
                    <li class="ft-box">
                        <div class="ft-icon"><img src="<?php echo bloginfo('template_directory'); ?>/asset/source/under-banner/icon-ben-phai-41.png" /></div>
                        <div class="ft-content">
                            <a href="<?php echo get_page_link(100) ?>"><h3>UY TÍN</h3></a>
                            <p><?php echo my_content(25, 100) ?></p>
                        </div>
                    </li >
                    <li class="ft-box">
                        <div class="ft-icon"><img src="<?php echo bloginfo('template_directory'); ?>/asset/source/under-banner/icon-ben-phai-43.png" /></div>
                        <div class="ft-content">
                            <a href="<?php echo get_page_link(102) ?>"><h3>TIẾT KIỆM</h3></a>
                            <p><?php echo my_content(25, 102) ?></p>
                        </div>
                    </li>
                    <li class="ft-box">
                        <div class="ft-icon"><img src="<?php echo bloginfo('template_directory'); ?>/asset/source/under-banner/icon-ben-phai-42.png" /></div>
                        <div class="ft-content">
                            <a href="<?php echo get_page_link(105) ?>"><h3>TẬN TÌNH</h3></a>
                            <p><?php echo my_content(25, 105) ?></p>
                        </div>
                    </li>
                    <li class="ft-box">
                        <div class="ft-icon"><img src="<?php echo bloginfo('template_directory'); ?>/asset/source/under-banner/icon-ben-phai-44.png" /></div>
                        <div class="ft-content">
                            <a href="<?php echo get_page_link(107) ?>"><h3>CAM KẾT</h3></a>
                            <p><?php echo my_content(25, 107) ?></p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End About -->
</div>
<!-- End main -->

<?php get_footer() ?>