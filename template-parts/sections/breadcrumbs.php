<div id="spb" class="nav-scroller single-page py-3 bg-white small <?php echo is_page_template('page-templates/template-landing-sections.php') ?: 'mb-4'; ?>">
    <nav class="nav-single-page" aria-label="Breadcrumbs">
        <div class="container">
            <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
        </div>
    </nav>
</div>
