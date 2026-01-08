<?php
$title = get_field('title');
$text = get_field('text');
$images = get_field('gallery');

$id = get_field('id');
?>

<section
    class="gallery"
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
