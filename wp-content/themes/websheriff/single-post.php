<?php
get_header();

$post = get_the_id();
$featured_image = get_the_post_thumbnail_url($post, 'full');
$thumbnail_id = get_post_thumbnail_id($post);
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
?>

    <section class="hero single-post-hero">
        <?php if (empty($featured_image) === false) : ?>
            <span class="image">
                <img src="<?php echo $featured_image; ?>" alt="<?php echo $alt; ?>">
            </span>
        <?php endif; ?>

        <div class="container">
            <div class="content" data-aos="fade-up">
                <h1 class="h2"><?php echo get_the_title(); ?></h1>
            </div>
        </div>
    </section>

    <section
        class="text"
        id="<?php if (empty($id) === false) {
            echo $id;
        } ?>"
    >
        <div class="container">
            <div class="content" data-aos="fade-up">
                <?php echo get_the_content(); ?>
            </div>
        </div>
    </section>


<?php
get_footer();

