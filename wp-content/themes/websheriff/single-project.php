<?php
get_header();

$hero_image = get_field('projects_hero_image', 'option');
$hero_logo = get_field('projects_hero_logo', 'option');

$images = get_field('images');
$related_people = get_field('person');
$related_municipalities = get_field('municipality');

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

<?php if (empty($images) === false) : ?>
    <section
        class="gallery"
        id="<?php if (empty($id) === false) {
            echo $id;
        } ?>"
    >
        <div class="container">
            <?php if (empty($images) === false) : ?>
                <div class='slider' data-aos="fade-up">
                    <?php foreach ($images as $image) : ?>
                        <div class='slide'>
                            <img src='<?php echo $image['sizes']['large']; ?>' alt='<?php echo $image['alt']; ?>'>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

    <section class="text grey center">
        <div class="container">
            <div class="content">
                <h1 class="h2"><?php echo get_the_title(); ?></h1>
                <?php the_content(); ?>
            </div>
        </div>
    </section>

<?php if (empty($related_municipalities) === false) : ?>
    <section
        class="municipalities"
        id="<?php if (empty($id) === false) {
            echo $id;
        } ?>"
    >
        <div class="container">
            <div class="content">
                <h2>Gerelateerde gemeentes</h2>
            </div>

            <?php if (empty($related_municipalities) === false) : ?>
                <div class="municipalities-grid">
                    <?php foreach ($related_municipalities as $municipality) :
                        $municipality_logo = get_field('logo', $municipality);
                        ?>
                        <a data-aos="fade-up" href="<?php echo get_the_permalink($municipality); ?>" class="person">
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
                    <?php foreach ($related_people as $person) :
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

<?php endif; ?>

<?php
get_footer();

