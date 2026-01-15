<?php
    $title = get_field('title');
    $text = get_field('text');
    $selection = get_field('selection');
    $year = get_field('year');
    $id = get_field('id');
    
    $args = [
        'post_type'      => 'project',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'menu_order',
        'order'          => 'asc',
    ];
    
    if ($selection === 'year' && empty($year) === false) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'project_year',
                'terms'    => $year,
                'operator' => 'IN',
            ],
        ];
    }
    
    $query = new WP_Query($args);
    $projects = $query->posts;

?>

<section
    class="projects"
    id="<?php echo !empty($id) ? esc_attr($id) : ''; ?>"
>
    <div class="container">
        <div class="content" data-aos="fade-up">
            <?php if (!empty($title)) : ?>
                <h2><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
            
            <?php if (!empty($text)) : ?>
                <?php echo $text; ?>
            <?php endif; ?>
        </div>
        
        <?php if (!empty($projects)) : ?>

            <div class="projects-grid">
                <?php foreach ($projects as $project) :
                    $project_image = get_field('hero_image', $project);
                    ?>
                    <a
                        href="<?php echo get_permalink($project); ?>"
                        class="project"
                        data-aos="fade-up"
                    >
                        <?php if (!empty($project_image)) : ?>
                            <span class="image">
                                <img
                                    src="<?php echo esc_url($project_image['sizes']['large']); ?>"
                                    alt="<?php echo esc_attr($project_image['alt']); ?>"
                                >
                            </span>
                        <?php endif; ?>

                        <h4 class="h4">
                            <?php echo esc_html(get_the_title($project)); ?>
                        </h4>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
</section>
