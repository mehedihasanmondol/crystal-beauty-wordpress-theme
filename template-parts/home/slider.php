<section class="main-slider d-none d-md-block" data-loop="true" data-autoplay="true" data-interval="2000">
    <div class="inner">
        <?php
        $args = array(
            'post_type'      => 'slider',
            'posts_per_page' => -1,
            'order'          => 'ASC',
            'meta_query'     => array(
                array(
                    'key'     => '_slider_display_mode',
                    'value'   => 'computer',
                    'compare' => '='
                )
            )
        );
        $slider_query = new WP_Query($args);

        if ($slider_query->have_posts()) :
            while ($slider_query->have_posts()) : $slider_query->the_post();
                $slide_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                $slider_style = get_post_meta(get_the_ID(), '_slider_style', true) ?: 'slide-inner1'; // Default: style1
                $button_text = get_post_meta(get_the_ID(), '_slider_button_text', true);
                $button_link = get_post_meta(get_the_ID(), '_slider_button_link', true);
                $button_text = $button_text ? $button_text : 'More details';
                $button_link = $button_link ? $button_link : esc_url(get_permalink());

        ?>

                <div class="slide slideResize slide2" style="background-image: url('<?php echo esc_url($slide_image); ?>');">
                    <div class="container">
                        <div class="common-inner <?php echo $slider_style ?>">
                            <span class="h1 from-bottom"><?php the_title(); ?></span>
                            <span class="h4 from-bottom"><?php echo get_the_excerpt() ?></span><br>

                            <a href="<?php echo $button_link; ?>" class="btn btn-primary first-btn waves-effect waves-light scale-up">
                                <?php echo $button_text ?>
                            </a>
                        </div>
                    </div>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>No slides found. Please add slides in the Slider section.</p>';
        endif;
        ?>
    </div>
</section>
<section class="main-slider mobile d-block d-md-none" data-loop="true" data-autoplay="true" data-interval="2000">
    <div class="inner">
        <?php
        $args = array(
            'post_type'      => 'slider',
            'posts_per_page' => -1,
            'order'          => 'ASC',
            'meta_query'     => array(
                array(
                    'key'     => '_slider_display_mode',
                    'value'   => 'mobile',
                    'compare' => '='
                )
            )
        );
        $slider_query = new WP_Query($args);

        if ($slider_query->have_posts()) :
            while ($slider_query->have_posts()) : $slider_query->the_post();
                $slide_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                $slider_style = get_post_meta(get_the_ID(), '_slider_style', true) ?: 'slide-inner1'; // Default: style1
                $button_text = get_post_meta(get_the_ID(), '_slider_button_text', true);
                $button_link = get_post_meta(get_the_ID(), '_slider_button_link', true);
                $button_text = $button_text ? $button_text : 'More details';
                $button_link = $button_link ? $button_link : esc_url(get_permalink());

        ?>

                <div class="slide slideResize slide2" style="background-image: url('<?php echo esc_url($slide_image); ?>');">
                    <div class="container">
                        <div class="common-inner <?php echo $slider_style ?>">
                            <span class="h1 from-bottom"><?php the_title(); ?></span>
                            <span class="h4 from-bottom"><?php echo get_the_excerpt() ?></span><br>

                            <a href="<?php echo $button_link; ?>" class="btn btn-primary first-btn waves-effect waves-light scale-up">
                                <?php echo $button_text ?>
                            </a>
                        </div>
                    </div>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>No slides found. Please add slides in the Slider section.</p>';
        endif;
        ?>
    </div>
</section>