<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
	
	<link rel="shortcut icon" href="/favicon.ico">
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        
        <script src="<?php echo get_template_directory_uri() ?>/js/jquery.min.js"></script>
        <script src="<?php echo get_template_directory_uri() ?>/js/jquery-ui.min.js"></script>
        <script src="<?php echo get_template_directory_uri() ?>/js/slider.js"></script>

	<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<div id="container">
            <div id="header">
                <div id="logo">
                    <img src="<?php echo bloginfo('template_directory'); ?>/asset/source/header/logo-06.png" />
                </div>
                <div id="logo-more">
                    <img src="<?php echo bloginfo('template_directory'); ?>/asset/source/header/hoala-07.png" /> 
                </div>
                <div id="header-menu" class="clear">
                    <?php wp_nav_menu(array('container'=>'')); ?>

                    <?php get_search_form() ?>
                </div>
                <!-- End header menu -->
            </div>
            <!-- End header -->
            <div id="box-slide">
                    <div id="slide">
                        <ul>
                            <li id="img1"><a><img src="<?php echo get_option('slide-img1') ?>" /></a></li>
                            <li id="img2"><a><img src="<?php echo get_option('slide-img2') ?>" /></a></li>
                            <li id="img3"><a><img src="<?php echo get_option('slide-img3') ?>" /></a></li>
                            <li id="img4"><a><img src="<?php echo get_option('slide-img4') ?>" /></a></li>
                            <li id="img5"><a><img src="<?php echo get_option('slide-img5') ?>" /></a></li>
                        </ul>
                        <a class="prev"><img src="<?php echo bloginfo('template_directory'); ?>/asset/source/slide/dau-trai-phai-truoc-22.png" /></a>
                        <a class="next"><img src="<?php echo bloginfo('template_directory'); ?>/asset/source/slide/dau-trai-phai-truoc-23.png" /></a>
                        <ol class="items">
                            <li><a onclick="hoverSlide(1)" href=""><img src="<?php echo bloginfo('template_directory'); ?>/asset/source/slide/dau-cham-25.png" /></a></li>
                            <li><a onclick="hoverSlide(2)" href=""><img src="<?php echo bloginfo('template_directory'); ?>/asset/source/slide/dau-cham-25.png" /></a></li>
                            <li><a onclick="hoverSlide(3)" href=""><img src="<?php echo bloginfo('template_directory'); ?>/asset/source/slide/dau-cham-25.png" /></a></li>
                            <li><a onclick="hoverSlide(4)" href=""><img src="<?php echo bloginfo('template_directory'); ?>/asset/source/slide/dau-cham-25.png" /></a></li>
                            <li><a onclick="hoverSlide(5)" href=""><img src="<?php echo bloginfo('template_directory'); ?>/asset/source/slide/dau-cham-25.png" /></a></li>
                        </ol>
                        <input type="hidden" id="curr-item" value="<?php echo bloginfo('template_directory'); ?>/asset/source/slide/dau-cham-24.png"/>
                        <input type="hidden" id="prev-item" value="<?php echo bloginfo('template_directory'); ?>/asset/source/slide/dau-cham-25.png"/>
                    </div>
                    <div id="slide-bar">
                        <ul>
                            <li class="slide1" ><a onclick="hoverSlide(1)"  href="">Tuyển sinh</a></li>
                            <li class="slide2" ><a onclick="hoverSlide(2)" href="">Tu nghiệp sinh</a></li>
                            <li class="slide3" ><a onclick="hoverSlide(3)" href="">Đào tạo tiếng nhật</a></li>
                            <li class="slide4" ><a onclick="hoverSlide(4)" href="">Giới thiệu việc làm</a></li>
                            <li class="slide5" ><a onclick="hoverSlide(5)" href="">Hội thảo du học</a></li>
                        </ul>
                    </div>
                </div>
                <!-- End Box Slide -->
                
            <div class="clear"></div>