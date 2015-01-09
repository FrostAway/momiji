<?php get_header() ?>


<div id="news">
    <div id="main"> 
        <div id="content">
            <div id="main-content" class="box-sizing">              
                <?php if (have_posts()) : ?>
 			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php /* If this is a category archive */ if (is_category()) { ?>
                         <h3 class="box-title"><?php single_cat_title(); ?></h3>

			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h3 class="box-title"><?php single_tag_title(); ?></h3>

			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h3 class="box-title"><?php the_time('F jS, Y'); ?></h3>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h3 class="box-title"><?php the_time('F, Y'); ?></h3>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<<h3 class="box-title"><?php the_time('Y'); ?></h3>

			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h3 class="box-title">Author Archive</h3>

			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h3 class="box-title">Blog Archives</h3>
			
			<?php } ?>
                                
                        <div class="line"></div>   
                                
                    <?php 
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $args = array('posts_per_page' => 3, 'paged' => $paged , 'cat' => $cat);
                        query_posts($args); 
                    ?>          
                <p class="intro">
                    Cập nhật các thông tin mới nhất và mọi mặt về hệ thống giáo dục quốc tế và đời sống du học sinh Việt ở nước ngoài cũng như những tính năng mới nhất được phát triển trên hệ thống mạng lưới Hotcourses quốc tế trong đó có Hotcourses Việt Nam. Bạn chắc chắn sẽ không muốn bỏ lỡ những tin tức mới nhất về chính sách thị thực, các bài phỏng vấn với các chuyên gia giáo dục quốc tế, các bảng xếp hạng mới được xuất bản hay những cuộc thi, hội chợ của du học sinh Việt ở nước ngoài.
                </p>
                
                <ul class="list-box">
                    
                    <?php while (have_posts()) : the_post(); ?>
                    <li class="box-main">
                        <div class="news-thubnail">
                            <a href="<?php the_permalink() ?>"><?php echo the_post_thumbnail('medium'); ?></a>
                        </div>
                        <div class="box-content">
                            <a href="<?php the_permalink() ?>"><h4 class="content-title"><?php the_title() ?></h4></a>
                            <div class="view"><img src="<?php echo bloginfo('template_directory'); ?>/asset/source/body/icon-59.png" /> <?php echo getPostViews(get_the_ID()) ?></div>
                            <p><?php echo my_excerpt(25); ?></p>
                            <div class="text-hide">
                               <?php echo apply_filters('the_content', substr(get_the_content(), 0, 600) ); ?>
                            </div>
                        </div>
                        <div class="box-footer">
                            <img src="<?php echo bloginfo('template_directory'); ?>/asset/source/body/icon-60.png" /> <?php the_time('F j, Y') ?>
                        </div>
                    </li>
                    <?php endwhile;  ?>
                    <div class="clear"></div>
                    <?php if($paged >= 1){ ?>
                    <div class="pagination">                 
                    <div class="page-bar">
                        <ul class="list-page">
                        <?php 
                        $big = 99999999;
                        echo paginate_links(array(
                            'base'      => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                        ));
                        ?>
                        </ul>
                    </div>
                    </div>
                    <?php } ?>
                  <?php else : ?>

		<h2>Nothing found</h2>

                <?php endif; ?>
                </ul>
                
                
                <!-- End list - box main -->
            </div>

            <?php get_sidebar("news") ?>
            <!-- End right bar -->
        </div>
        <!-- End content -->

    </div>
    <!-- End main -->
</div>


<?php get_footer() ?>
