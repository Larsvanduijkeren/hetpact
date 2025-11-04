<?php
get_header();

$hero_image = get_field('hero_image');
$hero_logo = get_field('hero_logo');

$related_projects = get_field('project');
$related_people = get_field('person');

$id = get_field('id');
?>

    <section class="hero">
        <?php if (empty($hero_image) === false) : ?>
            <span class="image">
                <img src="<?php echo $hero_image['sizes']['full']; ?>" alt="<?php echo $hero_image['alt']; ?>">
            </span>
        <?php endif; ?>

        <div class="container">
            <?php if (empty($hero_logo) === false) : ?>
                <img class="logo" src="<?php echo $hero_logo['sizes']['medium']; ?>"
                     alt="<?php echo $hero_logo['alt']; ?>">
            <?php endif; ?>
        </div>
    </section>

    <section class="text grey center">
        <div class="container">
            <div class="content">
                <h1 class="h2"><?php echo get_the_title(); ?></h1>
                <?php the_content(); ?>
            </div>
        </div>
    </section>

<?php if (empty($related_projects) === false) : ?>
    <section
        class="projects"
        id="<?php if (empty($id) === false) {
            echo $id;
        } ?>"
    >
        <div class="container">
            <div class="content">
                <h2>Gerelateerde projecten</h2>
            </div>

            <?php if (empty($related_projects) === false) : ?>
                <div class="projects-grid">
                    <?php foreach ($related_projects as $project) : ?>
                        <a href="<?php echo get_the_permalink($project); ?>" class="project">
                            <?php echo get_the_title($project); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php if (empty($related_people) === false) : ?>

    <section
        class="people blue"
        id="<?php if (empty($id) === false) {
            echo $id;
        } ?>"
    >
        <div class="container">
            <div class="content">
                <h2>Gerelateerde verbinders</h2>
            </div>

            <?php if (empty($related_people) === false) : ?>
                <div class="people-grid">
                    <?php foreach ($related_people as $person) : ?>
                        <a href="<?php echo get_the_permalink($person); ?>" class="person">
                            <?php echo get_the_title($person); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

<?php endif; ?>

<?php
get_footer();

