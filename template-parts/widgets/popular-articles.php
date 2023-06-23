<section id="widget-popular-articles" class="widget mb-4">
    <h2 class="widget-title fs-5 fw-bold mb-3">Popular Articles</h2>
    <?php
    $popular_posts = new WP_Query([
        'posts_per_page' => 3,
        'meta_key' => '_vws_page_views',
        'orderby' => 'meta_value_num',
        'order' => 'DESC'
    ]);
    if($popular_posts->have_posts()): ?>
        <div class="list-group">
            <?php while ($popular_posts->have_posts()) : $popular_posts->the_post(); ?>
                <a href="<?php the_permalink() ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center link-primary">
                    <div>
                        <h3 class="my-1 fw-bold fs-6" title="<?php the_title() ?>"><?php the_title(); ?></h3>
                        <div class="text-muted small">
                            <time datetime="<?php echo get_the_modified_date('c'); ?>" itemprop="datePublished"><?php echo get_the_modified_date(); ?></time>
                            &middot;
                            <span>
                                <?php
                                $categories = get_the_category();
                                if ( ! empty( $categories ) ) {
                                    echo esc_html( $categories[0]->name );
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                    <span class="text-black-50 small hstack gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                          <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                          <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                        </svg>
                        <?php vws_bs_starter_get_page_views(null, null); ?>
                    </span>
                </a>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    <?php endif; ?>
</section>
