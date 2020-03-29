<?php

/**
 * Register all shortcodes
 *
 * @return null
 */
function register_shortcodes()
{
    add_shortcode('capabilities', 'xact_shortcode_capabilities');
}
add_action('init', 'register_shortcodes');

/**
 * capabilities Shortcode Callback
 * 
 * @param Array $atts
 *
 * @return string
 */
function xact_shortcode_capabilities($atts)
{
    global $wp_query,
        $post;

    $atts = shortcode_atts(array(
        'page' => ''
    ), $atts);

    $loop = new WP_Query(array(
        'post_type'         => 'capabilities',
        'posts_per_page'    => -1,
        // 'orderby'           => 'menu_order title',
        'order'             => 'ASC',
        'tax_query'         => array(array(
            'taxonomy'  => 'capabilities_categories',
            'field'     => 'slug',
            'terms'     => array(sanitize_title($atts['page']))
        ))
    ));

    if (!$loop->have_posts()) {
        return false;
    }
?>
    <section id="our-capabilities" class="container">
        <?php
        while ($loop->have_posts()) :

            $loop->the_post();
        ?>
            <div class="capability-container row pb-5">
                <div class="col-lg-10 col-md-12">
                    <div class="row">
                        <div class="col-md-6 image">
                            <!-- <img src="<?php /*
                    if (has_post_thumbnail()) {
                    echo get_the_post_thumbnail_url('capabilities-thumb');
                    } else {
                    null;
                    }
                ?>" alt="<?php the_title(); */ ?>"> -->
                            <?php the_post_thumbnail('capabilities-thumb'); ?>
                        </div>
                        <div class="col-md-6 details">
                            <h2><?php the_title(); ?></h2>
                            <?php
                            the_content();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </section>
<?php
}
?>