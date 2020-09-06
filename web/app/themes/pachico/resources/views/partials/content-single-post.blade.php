<article @php post_class() @endphp>
  <header>
    <figure class="mb-0">
      {!! get_the_post_thumbnail(get_the_ID(), 'full', ['class' => 'w-100 h-auto']) !!}
      <caption>
        <span class="small text-uppercase">{!! wp_get_attachment_caption() !!}</span>
      </caption>
    </figure>
    <h1 class="entry-title">{!! get_the_title() !!}</h1>
  </header>
  <div class="entry-content">
    @php the_content() @endphp
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  @php comments_template('/partials/comments.blade.php') @endphp
</article>

<aside>
<h2>Recent Posts</h2>
<ul id="slider-id" class="slider-class">
    <?php
    $recent_posts = wp_get_recent_posts(array(
        'numberposts' => 4, // Number of recent posts thumbnails to display
        'post_status' => 'publish' // Show only the published posts
    ));
    foreach($recent_posts as $post) : ?>
        <li>
            <a href="<?php echo get_permalink($post['ID']) ?>">
                <?php echo get_the_post_thumbnail($post['ID'], 'full', ['class' => 'w-100 h-auto']); ?>
                //Assuming that the slider support captions 
                <p class="slider-caption-class"><?php echo $post['post_title'] ?></p>
            </a>
        </li>
    <?php endforeach; wp_reset_query(); ?>
</ul>
</aside>