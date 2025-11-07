<?php
$title = get_field('title');
$text = get_field('text');
$block_id = get_field('id');

$args = [
    'post_type'      => 'post',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
];

$query = new WP_Query($args);
?>

<section class="posts" id="<?php echo !empty($block_id) ? esc_attr($block_id) : ''; ?>">
    <div class="container">
        <div class="content" data-aos="fade-up">
            <?php if (!empty($title)) : ?>
                <h2><?php echo esc_html($title); ?></h2>
            <?php endif; ?>

            <?php if (!empty($text)) echo wp_kses_post($text); ?>
        </div>

        <div class="post-grid">
            <?php if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    $thumbnail_id = get_post_thumbnail_id();
                    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                    ?>
                    <div data-aos="fade-up" class="single-post">
                        <?php if (!empty($featured_image)) : ?>
                            <span class="image">
                                <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr($alt); ?>">
                            </span>
                        <?php endif; ?>

                        <div class="post-content">
                            <h3 class="h4"><?php the_title(); ?></h3>

                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="btn">Lees verder</a>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
    </div>
</section>
