<?php
$title = get_field('title');
$text = get_field('text');
$selection = get_field('selection');

$id = get_field('id');

$municipalities = [];

$args = [
    'post_type'      => 'municipality',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order',
    'order'          => 'asc',
];

$query = new WP_Query($args);
$municipalities = $query->posts;
?>

<section
    class="municipalities blue"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <div class="content" data-aos="fade-up">
            <?php if (empty($title) === false) : ?>
                <h2><?php echo $title; ?></h2>
            <?php endif; ?>

            <?php if (empty($text) === false) {
                echo $text;
            } ?>
        </div>

        <?php if (empty($municipalities) === false) : ?>
            <div class="municipalities-grid">
                <?php foreach ($municipalities as $municipality) :
                    $municipality_logo = get_field('logo', $municipality);
                    ?>
                    <a data-aos="fade-up" href="<?php echo get_the_permalink($municipality); ?>" class="municipality">
                        <?php if (empty($municipality_logo) === false) : ?>
                            <span class="logo">
                                <img src="<?php echo $municipality_logo['sizes']['large']; ?>"
                                     alt="<?php echo $municipality_logo['alt']; ?>">
                            </span>
                        <?php endif; ?>

                        <h3 class="h4"><?php echo get_the_title($municipality); ?></h3>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
