<div id="right-bar">
    <h3 class="bar-title">Bài viết nổi bật</h3>
    <?php
    $query = array(
        'meta_key' => 'post_views_count',
        'posts_per_page' => 2,
        'orderby' => 'meta_value_num post_views_cout',
        'order' => 'desc'
    );
    query_posts($query);
    ?>
    <ul class="bar-post">
        <?php while(have_posts()): the_post() ?>
        <li class="box-main">
            <div class="news-thubnail">
                <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(200, 200) ?></a>
            </div>
            <div class="box-content">
                <a href="<?php the_permalink() ?>"><h4 class="content-title"><?php the_title(); ?></h4></a>
                <div class="view"> </div>
                <p><?php echo my_excerpt(30) ?></p>
            </div>
            <div class="box-footer">
                 <?php the_time('F j, Y') ?>
            </div>
        </li>
        <?php endwhile; ?>
        
    </ul>

    <div class="more-news">
        <h3 class="bar-title">Từ khóa tìm kiếm hot</h3>
        <p>
            <?php //query_posts(array(
               
            //)); ?>
            
            <?php //if(have_posts()): while (have_posts()): the_post(); ?>
            <?php// the_title(); ?>
            <?php// endwhile; ?>          
            <?php //else: ?>
            <!--No thing-->
            <?php// endif; ?>
            
            <?php $args = array(
                'smallest' => '8',
                'largest' => '13',
                'unit' => 'pt',
                'separator' => ', ',
                'taxonomy' => 'post_tag'
            ) ?>
            <?php wp_tag_cloud($args); ?>
        </p> 
    </div>
</div>

