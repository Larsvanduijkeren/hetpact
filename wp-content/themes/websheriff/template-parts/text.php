<?php
$background_color = get_field('background_color');
$alignment = get_field('alignment');
$title = get_field('title');
$text = get_field('text');
$buttons = get_field('buttons');

$id = get_field('id');
?>

<section
    class="text <?php echo $background_color . ' ' . $alignment; ?>"
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

            <?php if (empty($buttons) === false) : ?>
                <div class="buttons">
                    <?php foreach ($buttons as $button) : ?>
                        <?php if (empty($button['button']) === false) {
                            echo sprintf('<a href="%s" target="%s" class="btn">%s</a>', $button['button']['url'], $button['button']['target'], $button['button']['title']);
                        } ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
