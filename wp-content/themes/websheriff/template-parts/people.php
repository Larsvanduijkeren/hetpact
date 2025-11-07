<?php
$title = get_field('title');
$text = get_field('text');
$selection = get_field('selection');

$id = get_field('id');

$people = [];

$args = [
    'post_type'      => 'person',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order',
    'order'          => 'asc',
];

$query = new WP_Query($args);
$people = $query->posts;
?>

<section
    class="people blue"
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

        <?php if (empty($people) === false) : ?>
            <div class="people-grid">
                <?php foreach ($people as $person) :
                    $person_image = get_field('hero_image', $person);
                    ?>
                    <a data-aos="fade-up" href="<?php echo get_the_permalink($person); ?>" class="person">
                        <?php if (empty($person_image) === false) : ?>
                            <span class="image">
                                <img src="<?php echo $person_image['sizes']['large']; ?>"
                                     alt="<?php echo $person_image['alt']; ?>">
                            </span>
                        <?php endif; ?>

                        <h3 class="h4"><?php echo get_the_title($person); ?></h3>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
