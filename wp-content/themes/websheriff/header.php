<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php wp_title('|', true, 'right'); ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="format-detection" content="telephone=no">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">

    <?php wp_head(); ?>
</head>
<?php
wp_body_open();

$page_theme = get_field('page_theme');
?>
<body <?php body_class($page_theme); ?>>

<?php
wp_body_open();

if(is_singular('municipality')) {
    $logo = get_field('logo');
}

if(empty($logo) === true) {
    $logo = get_field('logo', 'option');

}

$buttons = get_field('buttons', 'option');
?>

<span class="hamburger">
    <span class="line line-1"></span>
    <span class="line line-2"></span>
</span>

<nav class='mobile-nav'>
    <div class='content'>
        <div class='nav'>
            <div class='flex-wrapper'>
                <?php wp_nav_menu(['theme_location' => 'mobile-nav']); ?>
            </div>
        </div>
    </div>
</nav>

<header class='header'>
    <div class='container'>
        <div class='flex-wrapper'>
            <a href='/' class='logo' aria-label="Logo Het Pact">
                <?php if (empty($logo) === false) : ?>
                    <img src='<?php echo $logo['sizes']['large']; ?>' alt='<?php echo $logo['alt']; ?>'>
                <?php endif; ?>
            </a>

            <?php wp_nav_menu(['theme_location' => 'header-nav']); ?>
        </div>
    </div>
</header>

<main id="main-content" class="page-content" role="main">
