<?php

/**
 * Register all shortcodes
 *
 * @return null
 */
function register_shortcodes()
{
    add_shortcode('capabilities', 'xact_shortcode_capabilities');
    add_shortcode('work-slider', 'xact_shortcode_work');
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
    ob_start();
?>
    <section id="our-capabilities" class="container">
        <div class="row">
            <div class="col-lg-10 col-md-12">
                <?php
                while ($loop->have_posts()) :

                    $loop->the_post();
                ?>
                    <div class="capability-container row pb-5">
                        <div class="col-md-6 image">
                            <?php the_post_thumbnail('capabilities-thumb'); ?>
                        </div>
                        <div class="col-md-6 details">
                            <h3 class="font-bold"><?php the_title(); ?></h3>
                            <?php
                            the_content();
                            ?>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>
<?php
return ob_get_clean();
}
?>

<?php
/**
 * work Shortcode Callback
 * 
 * @param Array $atts
 *
 * @return string
 */
function xact_shortcode_work($atts)
{
    global $wp_query,
        $post;

    $atts = shortcode_atts(array(
        'page' => '',
        'slider-title' => '',
        'title-class' => ''
    ), $atts);

    $loop = new WP_Query(array(
        'post_type'         => 'work',
        'posts_per_page'    => -1,
        'order'             => 'ASC',
        'tax_query'         => array(array(
            'taxonomy'  => 'work_categories',
            'field'     => 'slug',
            'terms'     => array(sanitize_title($atts['page']))
        ))
    ));

    if (!$loop->have_posts()) {
        return false;
    }
    ob_start();
?>
    <section id="our-work" class="pt-5 mt-5">
        <!-- section title -->
        <div class="header">
            <div class="container">
                <h3 class="<?php echo ($atts['title-class']) ? $atts['title-class'] : 'gradient-work'; ?>"> <?php echo $atts['slider-title']  ?></h3>
            </div>
        </div>
        <!-- slider section -->
        <div class="slider pt-5">
            <div class="our_work_slider">
                <?php
                while ($loop->have_posts()) :
                    $loop->the_post();
                ?>
                    <!-- image slider -->
                    <div class="img_slider" onclick="ToogleSlider(<?php the_ID() ?>)">
                        <a class="<?php echo 'scroll_tag_' . get_the_ID() ?>">
                            <div class="overlay"></div>
                            <img class="img-slide" src=" <?php
                                                            if (has_post_thumbnail()) {
                                                                echo get_the_post_thumbnail_url();
                                                            } else {
                                                                null;
                                                            }
                                                            ?>" alt="<?php the_title(); ?>" id="1">
                            <div class="img_text" id="<?php echo 'img_text_' . get_the_ID() ?>">
                                <h2><?php the_title(); ?></h2>
                                <p>
                                    <?php
                                    if (has_excerpt(get_the_id())) {
                                        the_excerpt();
                                    }
                                    ?>
                                </p>
                                <div class="arrow">
                                    <img src="<?php echo get_template_directory_uri() . '/images/right-chevron.svg'; ?>">
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                endwhile;
                ?>
            </div>
        </div>
        <!-- End slider section -->

        <!-- section details -->
        <div class="content-wrapper">
            <?php
            while ($loop->have_posts()) :
                $loop->the_post();
                // get custom fields data
                $project_details = get_post_meta(get_the_ID(), 'work_repeat_group', 1);
                // check if there is data in custom field
                if ($project_details) :
            ?>

                    <div class="container pb-5 our_work_content" id="<?php echo 'content_' . get_the_ID() ?>">
                        <!-- close icon -->
                        <a href="#our-work">
                            <img src="<?php echo get_template_directory_uri() . '/images/close.svg' ?>" class="close-icon" alt="Phone icon">
                        </a>
                        <!-- end close icon -->
                        <div class="row">
                            <div class="col-md-10">
                                <!-- loop throught project details -->
                                <?php
                                foreach ($project_details as $details) :
                                ?>
                                    <div class="row pt-5 flex-md-row our_work_content_section">
                                        <div class="col-md-6 pt-3">
                                            <?php
                                            echo $details['project_description']
                                            ?>
                                        </div>
                                        <?php
                                        // check if there is images
                                        if ($details['project_images']) :
                                        ?>
                                            <div class="col-md-6 pt-3 img">
                                                <?php
                                                foreach ($details['project_images'] as $attachment_id => $attachment_url) :
                                                    // echo wp_get_attachment_image( $attachment_id, 'medium', "", ["class" => "our_work_img"]  );
                                                ?>
                                                    <img src="<?php echo wp_get_attachment_image_url($attachment_id, 'large'); ?>" alt="<?php the_title() ?>" class="our_work_img">
                                                <?php
                                                endforeach;
                                                ?>
                                            </div>
                                        <?php
                                        endif; // check images check
                                        ?>
                                    </div>
                                <?php
                                endforeach;
                                ?>
                            </div>
                        </div>

                    </div>

            <?php
                endif; // end check of data in custom field
            endwhile;
            ?>
        </div>
        <!-- end section details -->
    </section>
<?php
    return ob_get_clean();
}
?>