
<aside>

    <div class="container">
        <h2 class="text-uppercase small">последни публикации</h2>
    </div>
    <div id="recent_posts_slider" class="d-flex flex-wrap">
        <?php
        $recent_posts = wp_get_recent_posts(array(
            'numberposts' => 4, // Number of recent posts thumbnails to display
            'post_status' => 'publish' // Show only the published posts
        ));
        foreach($recent_posts as $post) : ?>
            <div class="position-relative shadow-lg">
                <a href="<?php echo get_permalink($post['ID']) ?>">
                    <?php echo get_the_post_thumbnail($post['ID'], 'medium', ['class' => 'w-100 h-auto']); ?>
                    <!-- <p class="position-absolute w-100 py-2 text-center bg-white">
                        <span class="text-primary text-uppercase small">see more ></span>
                    </p> -->
                    <p class="position-absolute w-100 px-1 py-1 py-sm-2 text-center bg-white">
                        <span class="text-dark text-uppercase"><?php echo $post['post_title'] ?></span>
                    </p>
                </a>
            </div>
        <?php endforeach; wp_reset_query(); ?>
    </div>

</aside>