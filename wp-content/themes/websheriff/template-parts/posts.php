<?php

$id = get_field('id');
?>

<section
    class="posts"
    id="<?php if (empty($id) === false) {
        echo $id;
    } ?>"
>
    <div class="container">
        <h2>posts</h2>
    </div>
</section>
