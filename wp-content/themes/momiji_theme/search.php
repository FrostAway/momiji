

<?php get_header(); ?>
<?php
/*
  Template Name: Search
 */
?>

<div id="news">
    <div id="main"> 
        <div id="content">
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
                $search_query['orderby'] = 'date';
                $search_query['order'] = 'desc';
                query_posts($search_query);
                
                global $wp_query;
                ?>
            
            <div id="main-content" class="box-sizing">
                <a href=""><h3 class="box-title">Tìm kiếm</h3></a>
                <p class="key">Từ khóa: "<?php echo get_query_var('s'); ?>" . HIển thị <?php echo $wp_query->found_posts; ?> kết quả</p>
<!--                <p class="key">Sắp xếp theo</p>
                <div class="form-select">
                    <select>
                        <option>Ngày tháng</option>
                    </select>
                    <div class="dropdown"></div>
                </div>-->
                <p></p>

                           
                <ul class="list-box">

                    <?php if (have_posts()): while (have_posts()): the_post(); ?>
                            <?php if (get_post_type() == 'post') { ?>
                                <li class="box-main">
                                    <div class="news-thubnail">
                                        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail("medium"); ?></a>
                                    </div>
                                    <div class="box-content">
                                        <a href="<?php the_permalink() ?>"><h4 class="content-title"><?php the_title() ?></h4></a>
                                        <div class="view"><img src="<?php echo bloginfo('template_directory') ?>/asset/source/body/icon-59.png" /> <?php echo getPostViews(get_the_ID()) ?></div>
                                        <p><?php echo my_excerpt(20); ?></p>
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