<?php
/**
 * Hello Elementor Child theme functions and definitions
 */

function hello_elementor_child_enqueue_styles()
{
    // Enqueue parent styles
    wp_enqueue_style('hello-elementor-parent-style', get_template_directory_uri() . '/style.css');

    // Enqueue child styles
    wp_enqueue_style('hello-elementor-child-style', get_stylesheet_directory_uri() . '/style.css', array('hello-elementor-parent-style'), '1.0.0');

    // Enqueue Quantico font from Google Fonts
    wp_enqueue_style('isn-quantico-font', 'https://fonts.googleapis.com/css2?family=Quantico:ital,wght@0,400;0,700;1,400;1,700&display=swap', array(), null);
}
add_action('wp_enqueue_scripts', 'hello_elementor_child_enqueue_styles');

/**
 * Force ISN Nutrition Design via wp_head (Bypasses Elementor CSS priorities)
 */
function isn_force_style_injection()
{
    ?>
    <style id="isn-nuclear-styles">
        /* GLOBAL RESET FOR HEADER */
        :root {
            --isn-primary: #a4ec04 !important;
            --isn-dark: #161616 !important;
        }

        body header.site-header,
        body #site-header,
        body .elementor-location-header {
            background-color: var(--isn-dark) !important;
            border-bottom: 6px solid var(--isn-primary) !important;
        }

        /* MENU LINKS */
        body .elementor-nav-menu .elementor-item,
        body .elementor-item,
        body .main-navigation a {
            color: #ffffff !important;
            font-family: 'Quantico', sans-serif !important;
            font-size: 14px !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            padding: 12px 20px !important;
            transition: color 0.2s !important;
        }

        body .elementor-item:hover,
        body .elementor-item.elementor-item-active,
        body .current-menu-item>a {
            color: var(--isn-primary) !important;
            background: transparent !important;
        }

        /* SEARCH PILL */
        body .elementor-search-form,
        body .elementor-search-form__container {
            background: #ffffff !important;
            border-radius: 50px !important;
            padding: 2px 5px 2px 20px !important;
            border: none !important;
        }

        body .elementor-search-form__input {
            color: #161616 !important;
            font-family: 'Quantico', sans-serif !important;
        }

        body .elementor-search-form__submit {
            background-color: var(--isn-primary) !important;
            border-radius: 50% !important;
            color: #000 !important;
            width: 38px !important;
            height: 38px !important;
        }

        /* ANNOUNCEMENT BAR */
        .isn-top-announcement {
            background: #000 !important;
            color: #fff !important;
            text-align: center;
            padding: 8px;
            font-family: 'Quantico', sans-serif;
            font-weight: bold;
            font-size: 11px;
            text-transform: uppercase;
        }
    </style>
    <?php
}
add_action('wp_head', 'isn_force_style_injection', 999);
