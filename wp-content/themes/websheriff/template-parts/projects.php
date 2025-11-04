<?php
$title = get_field('title');
$text = get_field('text');
$selection = get_field('selection');

$id = get_field('id');

$projects = [];

$args = [
    'post_type'      => 'project',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order',
    'order'          => 'asc',
];

$query = new WP_Query($args);
$projects = $query->posts;
?>

<section
    class="projects"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <div class="content">
            <?php if (empty($title) === false) : ?>
                <h2><?php echo $title; ?></h2>
            <?php endif; ?>

            <?php if (empty($text) === false) {
                echo $text;
            } ?>
        </div>

        <?php if (empty($projects) === false) : ?>
            <div class="projects-grid">
                <?php foreach ($projects as $project) : ?>
                    <a href="<?php echo get_the_permalink($project); ?>" class="project">
                        <?php echo get_the_title($project); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
