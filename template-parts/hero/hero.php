<section class="hero bg-opacity-0">
    <div class="container">
        <div class="row">
            <div class="col-md-9 mx-auto mt-3 mt-md-5">
                <?php the_title('<h1 class="display-4 styled-heading styled-heading-center lh-1 mb-3 mb-md-4 text-center">', '</h1>') ?>
                <?php if(get_field('leading_text')): ?>
                    <div class="above-main-text text-center lead"><?php the_field('leading_text') ?></div>
                <?php endif; ?>
                <?php if (get_field('enable_cta_button')) : ?>
                    <div class="text-center mt-4">
                        <a role="button"
                           href="<?php echo esc_url(get_field('hero_button_button_url')); ?>"
                           title="<?php echo esc_attr(get_field('hero_button_button_title')) ?>"
                           class="btn btn-<?php echo esc_attr(get_field('hero_button_button_color')) ?> btn-<?php echo esc_attr(get_field('hero_button_button_size')) ?>"><?php the_field('hero_button_button_title') ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
