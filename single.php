<?php get_header(); ?>

<div class="page-wrapper container">
    <div class="section-content">
        <div class="text-center">
            <?php if (function_exists('kama_breadcrumbs')) {
                kama_breadcrumbs(' &mdash; ');
            } ?>
            <div class="h1 text-uppercase section-headline">Новости</div>
        </div>
        <?php get_template_part('loops/content', 'single'); ?>
        <?php get_template_part('template-parts/block', 'latest'); ?>
    </div>
</div>

<?php get_footer(); ?>
