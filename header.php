<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Sixteen
 */
?>
<?php get_template_part('modules/header/head'); ?>
<body <?php body_class(); ?>>
<?php if ( get_header_image() ) : ?>
    <div id="header-image"></div>
<?php endif; // End header image check. ?>
<div id="page" class="hfeed site">

    <div id="top-section">
        <?php get_template_part('modules/navigation/mobile', 'menu'); ?>

        <?php get_template_part('modules/navigation/main','menu'); ?>

        <header id="masthead" class="site-header" role="banner">

            <div class="site-branding">
                <?php
                if ( has_custom_logo() ) : ?>
                    <div id="site-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                    <div class="title-desc">
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                    </div>
                <?php else:?>
                    <div class="site-info">
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                    </div>
                <?php endif; ?>
            </div>

            <?php get_template_part('modules/social/icon', 'sociocon'); ?>

        </header><!-- #masthead -->
        <?php get_template_part('slider', 'nivo'); ?>

    </div><!--#top-section-->

    <div id="content" class="site-content container">

<?php get_template_part('framework/featured-components/post-large', 'boxes'); ?>

<?php get_template_part('framework/featured-components/post', 'square'); ?>