<?php
$background_image = get_field('background_image');
$logo = get_field('logo');

$id = get_field('id');
?>

<section
    class="hero"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <?php if (empty($background_image) === false) : ?>
        <span class="image">
            <img src="<?php echo $background_image['sizes']['full']; ?>" alt="<?php echo $background_image['alt']; ?>">
        </span>
    <?php endif; ?>

    <div class="container">
        <?php if (empty($logo) === false) : ?>
            <img class="logo" src="<?php echo $logo['sizes']['medium']; ?>" alt="<?php echo $logo['alt']; ?>">
        <?php endif; ?>
    </div>
</section>
