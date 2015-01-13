<?php get_header() ?>

<div id="single">
    <div id="main"> 
        <div id="content">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div id="main-content" class="box-sizing">
                <h3 class="box-title"><?php the_title(); ?></h3>
                <div class="line"></div>
                <div class="clear"></div>
                <div class="post-bar">
                    <div class="post-thumbnail">
                        <a href=""><img src="<?php echo bloginfo('template_directory'); ?>/asset/source/body/anh-58.jpg" /></a>
                    </div>
                    <div class="bar-author">
                        <h4>Quản lý</h4>
                        <h4 class="author-name content-title"><?php the_author(); ?></h4>
                        <div class="author-info">
                            <div class="avatar">
                                <a href="<?php echo get_the_author_link(); ?>"><?php echo get_avatar(get_the_author_meta('user_email'), 74); ?></a>
                            </div>
                            <div class="info">
                                <?php echo get_the_author_meta('description') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="post-content">
                    <pre>
                   
                    </pre>
                    <h4 class="box-content"><?php the_title(); ?></h4>
			
			<div class="post-meta">
                            <img src="<?php echo bloginfo('template_directory'); ?>/asset/source/body/icon-60.png" /> <span><?php the_time('F j, Y') ?></span>
                        </div>
                        
			<div class="post-body">
                            <?php the_content(); ?>
                        </div>
			
			
			
		</div>
  
                </div>

                <!-- End list - box main -->
            </div>
        <?php endwhile; endif; ?>
            <!-- End detail post -->

            <?php get_sidebar("news") ?>
            <!-- End right bar -->
        </div>
        <!-- End content -->
    </div>
    <!-- End main -->
</div>

<?php get_footer() ?>