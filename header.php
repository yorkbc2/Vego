<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <?php if (!has_site_icon()) {
        define('FAVICON', get_template_directory_uri() . '/assets/img/favicon'); ?>
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo FAVICON . '/apple-icon-57x57.png'; ?>">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo FAVICON . '/apple-icon-60x60.png'; ?>">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo FAVICON . '/apple-icon-72x72.png'; ?>">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo FAVICON . '/apple-icon-76x76.png'; ?>">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo FAVICON . '/apple-icon-114x114.png'; ?>">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo FAVICON . '/apple-icon-120x120.png'; ?>">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo FAVICON . '/apple-icon-144x144.png'; ?>">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo FAVICON . '/apple-icon-152x152.png'; ?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo FAVICON . '/apple-icon-180x180.png'; ?>">
        <link rel="icon" type="image/png" sizes="192x192" href="<?php echo FAVICON . '/android-icon-192x192.png'; ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo FAVICON . '/favicon-32x32.png'; ?>">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo FAVICON . '/favicon-96x96.png'; ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo FAVICON . '/favicon-16x16.png'; ?>">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo FAVICON . '/favicon.ico'; ?>">
        <link rel="icon" type="image/x-icon" href="<?php echo FAVICON . '/favicon.ico'; ?>">
        <link rel="manifest" href="<?php echo FAVICON . '/manifest.json'; ?>">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?php echo FAVICON . '/ms-icon-144x144.png'; ?>">
        <meta name="theme-color" content="#ffffff">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-title"
              content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
    <?php } ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> id="top">

<?php wp_body(); ?>

<div class="wrapper">

    <?php if (is_front_page()) {
        get_template_part('template-parts/header', 'front-page');
    } elseif ('projects' === get_post_type() && is_single()) {
        get_template_part('template-parts/header', 'projects');
    } else {
        get_template_part('template-parts/header', 'default');
    } ?>

    <?php /*
    <div class="container" style="padding: 40px 0;">
        <button class="button-small">Проложить маршрут</button>
        <button class="button-medium">Проложить маршрут</button>
        <button class="button-large">Проложить маршрут</button>
        <br>
        <button class="button-small button-outline">Проложить маршрут</button>
        <button class="button-medium button-outline">Проложить маршрут</button>
        <button class="button-large button-outline">Проложить маршрут</button>
    </div>
    <?php get_default_logo_link(); ?>

    <?php if (function_exists('pll_the_languages')) { ?>
        <ul class="lang">
            <?php pll_the_languages(array(
                'show_flags' => 1,
                'show_names' => 0,
                'hide_if_empty' => 0,
                'display_names_as' => 'name'
            )); ?>
        </ul>
    <?php } ?>

    <?php if (has_social()) { ?>
        <ul class="social">
            <?php foreach (get_social() as $social) { ?>
                <li class="social-item">
                    <a href="<?php echo esc_attr(esc_url($social['url'])); ?>" class="social-link" target="_blank">
                        <i class="<?php echo esc_attr($social['icon']); ?>" aria-hidden="true"
                           aria-label="<?php echo esc_attr($social['text']); ?>"></i>
                    </a>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>

    <?php if (has_messengers()) { ?>
        <ul class="messenger">
            <?php foreach (get_messengers() as $name => $messenger) { ?>
                <li class="messenger-item">
                    <a class="messenger-link messenger-<?php echo esc_attr($name) ?>"
                       href="tel:<?php echo esc_attr(get_phone_number($messenger['tel'])); ?>" target="_blank">
                        <i class="<?php echo esc_attr($messenger['icon']); ?>" aria-hidden="true"
                           aria-label="<?php echo esc_attr($messenger['text']); ?>"></i>
                    </a>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>

    <?php if (has_phones()) { ?>
        <ul class="phone">
            <?php foreach (get_phones() as $phone) { ?>
                <li class="phone-item">
                    <a href="tel:<?php echo esc_attr(get_phone_number($phone)); ?>" class="phone-number">
                        <?php echo esc_html($phone); ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>

    <?php
    $email = get_theme_mod('bw_additional_email');
    $address = get_theme_mod('bw_additional_address');
    if (!empty($email)) { ?>
        <a href="mailto:<?php echo esc_attr($email); ?>">
            <i class="fas fa-envelope" aria-hidden="true"></i>
            <?php echo esc_html($email); ?>
        </a>
    <?php }
    if (!empty($address)) { ?>
        <span>
            <b><?php _e('Address', 'brainworks'); ?>:</b>
            <?php echo esc_html($address); ?>
        </span>
    <?php } ?>

    <button type="button" class="button-medium <?php the_lang_class('js-call-back'); ?>">
        <?php _e('Call back', 'brainworks'); ?>
    </button>

    <h1><?php echo esc_html(get_bloginfo('name')); ?></h1>
    <h3><?php bloginfo('description'); ?></h3>
    <h3><?php bloginfo('admin_email'); ?></h3>

    <?php
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'meta_query' => array(
            'relation' => 'OR',
            array(
                'key' => 'on-front',
                'value' => 'yes',
            ),
        )
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) { ?>
        <div class="container">
            <div class="row advert-list">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <section id="post-<?php the_ID(); ?>" <?php post_class('col-md-4 advert-item'); ?>>
                        <?php if (has_post_thumbnail()) { ?>
                            <figure class="advert-preview">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', array('class' => 'advert-thumbnail')); ?>
                                </a>
                            </figure>
                        <?php } ?>
                        <h3 class="advert-headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="advert-excerpt"><?php the_excerpt(); ?></div>
                        <div class="text-right">
                            <a class="button-small advert-link" href="<?php the_permalink(); ?>">
                                <?php _e('Continue reading', 'brainworks'); ?>
                            </a>
                        </div>
                    </section>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    <?php } ?>

    <?php echo do_shortcode('[bw_advert count=3 class=advert]'); ?>

    */ ?>
