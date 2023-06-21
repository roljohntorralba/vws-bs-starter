<?php
if(get_field('enable_custom_widget')) : ?>
    <section id="custom-widget" class="widget mb-4 bg-white">
        <h2 class="widget-title fs-5 fw-bold mb-3"><?php the_field('custom_widget_title') ?></h2>
        <div class="textwidget">
            <?php the_field('custom_widget_content') ?>
        </div>
    </section>
<?php endif ?>
