<?php get_header() ?>
<?php setPostViews(get_the_ID()) ?>

<div id="single">
    <div id="main"> 
        <div id="content">
            
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
           
            <div id="main-content" class="box-sizing">
                <h3 class="box-title"><a href="<?php echo get_category_link(get_the_category()[0]->term_id) ?>"><?php echo get_the_category()[0]->cat_name ?></a></h3>
                <div class="line"></div>
                <div class="clear"></div>
                <div class="post-bar">
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('medium') ?>
                    </div>
                    <div class="bar-author">
                        <h4>Tác giả</h4>
                        <h4 class="author-name content-title"><a href="<?php echo get_the_author_meta('author_url', $post->post_author) ?>"><?php the_author(); ?></a></h4>
                        <div class="author-info">
                            <div class="avatar">
                                <a href="<?php  ?>"><?php echo get_avatar($post->post_author, 74) ?></a>
                            </div>
                            <div class="info">
                                <?php echo get_the_author_meta('description', $post->post_author) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="post-content">
                    
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
                    <h4 class="box-content"><?php the_title(); ?></h4>
			
			<div class="post-meta">
                            <img src="<?php echo bloginfo('template_directory'); ?>/asset/source/body/icon-60.png" /> <span>24 tháng 12 2012</span>
                        </div>
                        <?php the_excerpt() ?>
			<div class="post-body">
                            <?php the_content() ?>
                        </div>
			
			<?php //edit_post_link('Edit this entry','','.'); ?>
			<div class="more-post">
                        <ul>
                            <li><a href="">>> Học thiết kế thời trang cao cấp ở ModArt Paris</a></li>
                            <li><a href="">>> Hoc kinh doanh thời trang tại Singapore</a></li>
                            <li><a href="">>> Học thiết kế thời trang tại thành phố của những trái tim nghệ sĩ, Meibourne</a></li>
                            <li><a href="">>> Học thời trang ở London. Đi thực tế 2 lần/tuần</a></li>
                        </ul>
                        </div>
		</div>

                    <?php //comments_template(); ?>

                <?php endwhile; endif; ?>
                    
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