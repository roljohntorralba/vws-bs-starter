<?php
$categories = get_the_category();
if ( ! empty( $categories ) ) : ?>
    <section id="widget-related-articles" class="widget mb-4">
        <h2 class="widget-title fs-5 fw-bold mb-3">Related Articles</h2>

    <?php
    $cat_query = new WP_Query([
        'cat' => $categories[0]->term_id,
        'posts_per_page' => 3,
        'post__not_in' => [get_the_ID()]
    ]);
    if($cat_query->have_posts()) : ?>
    <div class="list-group">
    <?php while ($cat_query->have_posts()) : $cat_query->the_post(); ?>
        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="list-group-item list-group-item-action link-primary">
            <h3 class="fs-6 fw-semibold mb-0" title="<?php the_title() ?>"><?php the_title(); ?></h3>
            <div class="text-muted hstack small">
                <time datetime="<?php echo get_the_modified_date('c'); ?>" itemprop="datePublished"><?php echo get_the_modified_date(); ?></time>
                <div class="mx-2">&middot;</div>
                <?php
                $categories = get_the_category();
                if ( ! empty( $categories ) ) {
                    echo esc_html( $categories[0]->name );
                }
                ?>
            </div>
        </a>
    <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <?php endif; ?>
</section>
<?php endif; ?>
