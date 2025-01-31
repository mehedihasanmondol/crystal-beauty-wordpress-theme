<?php get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <!-- PAGE TITLE SECTION -->
        <?php
        if (has_post_thumbnail()) {
            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
        ?>
            <section class="clearfix pageTitleArea" style="background-image: url(<?php echo $thumbnail_url ?>);">
                <div class="container">
                    <div class="pageTitle">
                        <h1>

                            <?php the_title(); ?>
                        </h1>
                    </div>
                </div>
            </section>
        <?php } ?>
        <?php the_content(); ?>
<?php endwhile;
endif; ?>

<?php get_footer(); ?>