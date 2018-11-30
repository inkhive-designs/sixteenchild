<?php
/**
 * @package Sixteen
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('sixteen-article'); ?>>


    <div class="featured-thumb">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('homepage-thumb',array(  'alt' => trim(strip_tags( $post->post_title )))); ?></a>
        <?php else: ?>
            <a href="<?php the_permalink(); ?>"><img alt="<?php the_title() ?>" src="<?php echo get_stylesheet_directory_uri()."/images/dthumb.jpg"; ?>"></a>
        <?php endif; ?>
    </div>

    <div class="out-thumb">
        <header class="entry-header">
            <h3 class="entry-title">
                <a href="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>" rel="bookmark">
                    <?php if (strlen(get_the_title()) >= 30) : ?>
                        <?php echo substr(get_the_title(), 0, 30)."..."; ?>
                    <?php else : ?>
                        <?php	the_title(); ?>
                    <?php endif; ?>
                </a>
            </h3>
        </header><!-- .entry-header -->
        <div class="excerpt">
            <?php echo substr(get_the_content(), 0, 150)."..."; ?>
        </div>
    </div>

</article><!-- #post-## -->
