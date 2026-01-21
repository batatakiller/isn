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
    <!-- ISN_DEBUG_ACTIVE -->
    <style id="isn-nuclear-styles">
        /* GLOBAL RESET FOR HEADER */
        :root {
            --isn-primary: #a4ec04 !important;
            --isn-dark: #121212 !important;
            /* Cor exata do site original */
        }

        /* FORCE BACKGROUND ON ALL HEADER CONTAINERS */
        body .elementor-location-header,
        body .elementor-location-header .elementor-section,
        body .elementor-location-header .elementor-container,
        body .elementor-location-header .e-con,
        body .elementor-location-header .e-con-inner {
            background-color: var(--isn-dark) !important;
        }

        /* HEADER BORDER BOTTOM (Only on the main wrapper) */
        body .elementor-location-header {
            border-bottom: 6px solid var(--isn-primary) !important;
        }

        /* MENU LINKS - Targeting standard Elementor Menu and specific Nav Menu */
        body .elementor-nav-menu .elementor-item,
        body .elementor-nav-menu--main .elementor-item,
        body .elementor-navigation .elementor-item {
            color: #ffffff !important;
            font-family: 'Quantico', sans-serif !important;
            font-size: 14px !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            padding: 12px 20px !important;
            transition: all 0.2s ease-in-out !important;
            background: transparent !important;
        }

        body .elementor-item:hover,
        body .elementor-item.elementor-item-active,
        body .elementor-item.current-menu-item {
            color: var(--isn-primary) !important;
        }

        /* IVORY SEARCH (The plugin being used) - Transform into the neon pill style */
        body .is-search-form {
            background: #ffffff !important;
            border-radius: 50px !important;
            padding: 5px 5px 5px 20px !important;
            border: none !important;
            display: flex !important;
            align-items: center !important;
            max-width: 400px;
        }

        body .is-search-input {
            background: transparent !important;
            border: none !important;
            color: #161616 !important;
            font-family: 'Quantico', sans-serif !important;
            outline: none !important;
            box-shadow: none !important;
            width: 100% !important;
        }

        body .is-search-submit {
            background-color: var(--isn-primary) !important;
            border-radius: 50% !important;
            color: #000 !important;
            width: 35px !important;
            height: 35px !important;
            padding: 0 !important;
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            border: none !important;
            min-width: 35px !important;
        }

        body .is-search-submit svg {
            width: 18px !important;
            height: 18px !important;
            fill: #000 !important;
        }

        /* ACCOUNT & PHONE LINKS (Icon List) */
        body .elementor-icon-list-item a,
        body .elementor-icon-list-text {
            color: #ffffff !important;
            font-family: 'Quantico', sans-serif !important;
            font-weight: 700 !important;
            font-size: 14px !important;
            text-transform: uppercase !important;
        }

        body .elementor-icon-list-icon i {
            color: var(--isn-primary) !important;
        }

        /* CART COUNTER BUBBLE */
        body .elementor-button-icon-qty {
            background-color: var(--isn-primary) !important;
            color: #000 !important;
            font-family: 'Quantico', sans-serif !important;
            font-weight: bold !important;
        }

        /* ANNOUNCEMENT BAR (If present) */
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
