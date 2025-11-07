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
        <div class="content" data-aos="fade-up">
            <?php if (empty($title) === false) : ?>
                <h2><?php echo $title; ?></h2>
            <?php endif; ?>

            <?php if (empty($text) === false) {
                echo $text;
            } ?>
        </div>

        <?php if (empty($projects) === false) : ?>
            <div class="projects-grid">
                <?php foreach ($projects as $project) :
                    $project_image = get_field('hero_image', $project);
                    ?>
                    <a data-aos="fade-up" href="<?php echo get_the_permalink($project); ?>" class="project">
                        <?php if (empty($project_image) === false) : ?>
                        <span class="image">
                                <img src="<?php echo $project_image['sizes']['large']; ?>" alt="<?php echo $project_image['alt']; ?>">
                        </span>
                        <?php endif; ?>

                        <h3 class="h4"><?php echo get_the_title($project); ?></h3>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
