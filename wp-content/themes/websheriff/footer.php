</main>

<?php
$footer_logo = get_field('footer_logo', 'option');
$footer_text_1 = get_field('footer_text_1', 'option');
$footer_text_2 = get_field('footer_text_2', 'option');
?>

<footer class='footer'>
    <div class="container">
        <?php if (empty($footer_logo) === false) : ?>
            <img class="logo" src="<?php echo $footer_logo['sizes']['medium']; ?>" alt="<?php echo $footer_logo['alt']; ?>">
        <?php endif; ?>

        <div class="flex-wrapper">
            <div class="col">
                <?php if(empty($footer_text_1) === false) {
                    echo $footer_text_1;
                } ?>
            </div>

            <div class="col">
            <?php if(empty($footer_text_2) === false) {
                echo $footer_text_2;
            } ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
