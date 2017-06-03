<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>

			<!-- header -->
			<header class="header clear" role="banner">
					<!-- logo -->
					<div class="logo">
						<a href="<?php echo home_url(); ?>">
							<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
							<!-- <img src="<?php echo get_template_directory_uri(); ?>/assets/images/figjam-logo.svg" alt="Logo" class="logo-img"> -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50.8 61" fill="#fff">
                              <path d="M14.1 61h22.2c5.8 0 10.4-4.7 10.4-10.5V20h.1c1.2 0 2.2-.3 3.2-.7.3-.1.6-.4.7-.7.1-.3 0-.7-.2-1l-6.4-8.7V3.5c0-1.9-1.6-3.5-3.5-3.5H10C8.1 0 6.5 1.6 6.5 3.5v5.4L.2 17.5c-.4.5-.2 1.2.3 1.6.1 0 .1.1.2.1.9.4 1.9.7 2.8.8h.1v30.6C3.6 56.3 8.3 61 14.1 61zm30.4-10.5c0 4.5-3.7 8.2-8.2 8.2H14.1c-4.5 0-8.2-3.7-8.2-8.2V20.1H6c2.2 0 4.3-.8 6-2.2l.1-.1.1.1c1.9 1.5 4.2 2.3 6.6 2.2 2.4.1 4.7-.7 6.6-2.2l.1-.1.1.1c1.9 1.5 4.2 2.3 6.6 2.2 2.4.1 4.8-.6 6.6-2.2l.1-.1.1.1c1.5 1.3 3.4 2 5.4 2.1h.1v30.5zM8.8 3.5c0-.7.5-1.2 1.2-1.2h30.6c.7 0 1.2.5 1.2 1.2v5h-2.1v-.7c0-.4-.3-.8-.7-.8-.4 0-.7.3-.7.7v.7H16.9V6.7c0-.4-.3-.7-.7-.7s-.7.3-.7.7v1.8h-2.8V5.2c0-.4-.3-.7-.7-.7s-.7.3-.7.7v3.3H8.8v-5zM3.1 17.6h-.2L8.5 10H42l5.6 7.7h-.2c-.6.1-1.3.2-1.9.2-3.5 0-5.6-1.5-5.6-2.5 0-.6-.5-1.1-1.1-1.1-.6 0-1.1.5-1.1 1.1 0 .5-.5 1.1-1.4 1.6-1.3.6-2.7 1-4.2.9-3.5 0-5.6-1.5-5.6-2.5 0-.6-.5-1.1-1.1-1.1-.6 0-1.1.5-1.1 1.1 0 .5-.5 1.1-1.4 1.6-1.3.6-2.7 1-4.2.9-3.5 0-5.6-1.5-5.6-2.5 0-.6-.5-1.1-1.1-1.1-.6 0-1.1.5-1.1 1.1 0 .5-.5 1.1-1.4 1.6-1.3.6-2.7 1-4.2.9-.7-.1-1.4-.1-2.2-.3z"/>
                              <path d="M40.8 42.3H9.5c-.5 0-.8.4-.8.8v6.1c0 3.7 3 6.7 6.7 6.7h19.4c3.7 0 6.7-3 6.7-6.7v-6.1c.1-.4-.3-.8-.7-.8zm-.9 7c0 2.8-2.3 5.1-5.1 5.1H15.4c-2.8 0-5.1-2.3-5.1-5.1V44h29.5v5.3z"/>
                              <path d="M34.8 56.1H15.4c-3.8 0-6.9-3.1-6.9-6.9v-6.1c0-.6.4-1 1-1h31.2c.6 0 1 .4 1 1v6.1c.1 3.8-3 6.9-6.9 6.9.1 0 .1 0 0 0zM9.5 42.4c-.4 0-.7.3-.7.7v6.1c0 3.7 3 6.6 6.6 6.6h19.4c3.7 0 6.6-3 6.6-6.6v-6.1c0-.4-.3-.7-.7-.7H9.5zm25.3 12.1H15.4c-2.9 0-5.2-2.3-5.2-5.2v-5.4H40v5.4c.1 2.8-2.3 5.2-5.2 5.2.1 0 .1 0 0 0zM10.5 44.1v5.2c0 2.7 2.2 4.9 4.9 4.9h19.4c2.7 0 4.9-2.2 4.9-4.9v-5.2H10.5z"/>
                            </svg>
						</a>
					</div>
					<!-- /logo -->

					<!-- nav -->
					<nav class="nav" role="navigation">
						<?php figjam_nav(); ?>
					</nav>
					<!-- /nav -->
                    <a class="nav-toggle" href="#">
                        <span class="line1"></span>
                        <span class="line2"></span>
                        <span class="line3"></span>
                        <p>Open Menu</p>
                    </a>
                    <div class="utility-menu">
                        <a href="#" class="search-toggle">
                            <svg id="Layer_2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60.7 60.7">
                                <style>
                                    .st0{fill:none;stroke:#fff;stroke-width:4;stroke-linecap:round;stroke-miterlimit:10;} .st1{enable-background:new ;}
                                </style>
                                    <path class="st0" d="M40.3 40.3c-8.5 8.5-22.4 8.5-30.9 0S.9 17.9 9.4 9.4s22.4-8.5 30.9 0c8.5 8.6 8.5 22.4 0 30.9zM40.6 40.6l17.1 17.1"/>
                            </svg>
                        </a>
                    </div>
			</header>
            <div class="nav-bg"></div>
			<!-- /header -->
        <!-- wrapper -->
        <div class="wrapper">
