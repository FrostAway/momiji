<?php get_header() ?>

<div id="single">
    <div id="main"> 
        <div id="content">
            
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
                        <h4 class="author-name content-title">Momiji</h4>
                        <div class="author-info">
                            <div class="avatar">
                                <a href="<?php the_author_link() ?>"><img src="<?php echo bloginfo('template_directory'); ?>/asset/source/footer/anh-khach-45.png" /></a>
                            </div>
                            <div class="info">
                                Biên tập viên, chuyên viên marketing tại 4handy và biên tập viên tại Hotcourses Vietnam. Thích chó mèo và đồ handmade
                            </div>
                        </div>
                    </div>
                </div>
                <div class="post-content">
                    
     
			
                    <h4 class="box-content"><?php the_title(); ?></h4>
			
			<div class="post-meta">
                            <img src="<?php echo bloginfo('template_directory'); ?>/asset/source/body/icon-60.png" /> <span><?php the_time('F j, Y') ?></span>
                        </div>
                        <?php the_excerpt() ?>
			<div class="post-body">
                            <?php the_content() ?>
                        </div>
			
			<?php //edit_post_link('Edit this entry','','.'); ?>
			
		</div>
  
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