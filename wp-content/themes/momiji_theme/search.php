

<?php get_header(); ?>
<?php
/*
  Template Name: Search
 */
?>

<div id="news">
    <div id="main"> 
        <div id="content">
            <div id="main-content" class="box-sizing">
                <a href=""><h3 class="box-title">Tìm kiếm</h3></a>
                <p class="key">Từ khóa: "Học bổng" . HIển thị 78 kết quả</p>
                <p class="key">Sắp xếp theo</p>
                <div class="form-select">
                    <select>
                        <option>Ngày tháng</option>
                    </select>
                    <div class="dropdown"></div>
                </div>

                <?php
                global $query_string;

                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $query_args = explode("&", $query_string);
                
                $search_query = array();

                foreach ($query_args as $key => $string) {
                    $query_split = explode("=", $string);
                    $search_query[$query_split[0]] = urldecode($query_split[1]);
                }
                $search_query['posts_per_page'] = 3;
                $search_query['post_type'] = 'post';
                query_posts($search_query);
                ?>            
                <ul class="list-box">

                    <?php if (have_posts()): while (have_posts()): the_post(); ?>
                            <?php if (get_post_type() == 'post') { ?>
                                <li class="box-main">
                                    <div class="news-thubnail">
                                        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail("medium"); ?></a>
                                    </div>
                                    <div class="box-content">
                                        <h4 class="content-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
                                        <div class="view"><img src="<?php echo bloginfo('template_directory') ?>/asset/source/body/icon-59.png" /> 1596</div>
                                        <?php the_excerpt() ?>
                                        <div class="text-hide">
                                            <?php echo apply_filters('the_content', substr(get_the_content(), 0, 600)) ?>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <img src="<?php echo bloginfo('template_directory') ?>/asset/source/body/icon-60.png" /> <?php the_time('F j, Y') ?>
                                    </div>
                                </li>
                            <?php } ?>
                        <?php endwhile; ?>

                        <div class="clear"></div>
                        <?php if($paged >= 1){ ?>
                        <div class="pagination">
                            <?php
                            if (get_previous_posts_link()) {
                                previous_posts_link('<img src="' . get_template_directory_uri() . '/asset/source/body/prev-icon.png"  />');
                            } else {
                                ?>
                                <a class="page-next"><img src="<?php echo get_template_directory_uri() ?>/asset/source/body/prev-icon.png"  /></a>
                                    <?php } ?>                   
                            <div class="page-bar">
                                <ul class="list-page">
                                    <?php
                                    $big = 99999999;
                                    echo paginate_links(array(
                                        'prev_next' => false,
                                        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                                    ));
                                    ?>
                                </ul>
                            </div>
                            <?php
                            if (get_next_posts_link()) {
                                next_posts_link('<img src="' . get_template_directory_uri() . '/asset/source/body/icon-next.png"  />');
                            } else {
                                ?>
                                <a class="page-next"><img src="<?php echo get_template_directory_uri() ?>/asset/source/body/icon-next.png"  /></a>
                        <?php } ?>
                        </div>
                        <?php } ?>

            <?php else: ?>
                        <h3>Không có kết quả nào phù hợp</h3>
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

<?php get_footer(); ?>