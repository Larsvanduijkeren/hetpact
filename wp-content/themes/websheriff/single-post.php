<?php
get_header();

$post_id        = get_the_ID();
$featured_image = get_the_post_thumbnail_url($post_id, 'full');
$thumbnail_id   = get_post_thumbnail_id($post_id);
$alt            = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
$author_id      = get_post_field('post_author', $post_id);
$author_name    = get_the_author_meta('display_name', $author_id);
$author_url     = get_author_posts_url($author_id);
$publish_date   = get_the_date('j F Y', $post_id);
$categories     = get_the_category($post_id);
?>

<section class="hero single-post-hero">
    <?php if (!empty($featured_image)) : ?>
        <span class="image">
            <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr($alt); ?>">
        </span>
    <?php endif; ?>

    <div class="container">
        <div class="content" data-aos="fade-up">
            <h1 class="h2"><?php echo get_the_title(); ?></h1>

            <div class="meta">
                <span class="date"><?php echo esc_html($publish_date); ?></span>
                <span class="sep">•</span>
                <span class="author">Door <?php echo esc_html($author_name); ?></span>

                <?php if (!empty($categories)) : ?>
                    <span class="sep">•</span>
                    <span class="category">
                        <?php foreach ($categories as $index => $category) :
                            if ($index > 0) echo ', ';
                            echo esc_html($category->name);
                        endforeach; ?>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="text" id="<?php if (!empty($id)) echo esc_attr($id); ?>">
    <div class="container">
        <div class="content" data-aos="fade-up">
            <h2 class="h3">Meer informatie</h2>

            <?php echo apply_filters('the_content', get_the_content()); ?>

            <div class="share">
                <p>Deel dit artikel:</p>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener">Facebook</a>
                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" rel="noopener">X (Twitter)</a>
                <a href="mailto:?subject=<?php echo rawurlencode(get_the_title()); ?>&body=<?php echo rawurlencode(get_permalink()); ?>">E-mail</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
