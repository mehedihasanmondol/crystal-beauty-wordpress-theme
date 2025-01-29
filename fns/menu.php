<?php
// Register Menus
function crystalbeauty_register_menus()
{
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'crystal-beauty'),
        'footer_menu'   => __('Footer Menu', 'crystal-beauty'),
    ));
}
add_action('init', 'crystalbeauty_register_menus');


class Custom_Nav_Walker extends Walker_Nav_Menu
{
    // Start Level - Adds dropdown menu class
    function start_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        if ($depth >= 1) {
            $output .= "\n$indent<ul class=\"dropdown-menu submenu\">\n";
        } else {
            $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
        }

        // echo 'dfkdjffffffffffffffffffffffffffffffffffffff' . $depth . '<br>';
    }

    // Start Element - Customizes menu items
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $classes = empty($item->classes) ? array() : (array) $item->classes;

        // Add 'nav-item' class ONLY to first-level menu items
        if ($depth === 0) {
            $classes[] = 'nav-item';
        }

        // Add 'active' class if the menu item is the current page
        if (in_array('current-menu-item', $classes)) {
            $classes[] = 'active';
        }

        // Add 'dropdown' class for parent menu items
        if (in_array('menu-item-has-children', $classes)) {
            $classes[] = 'dropdown ';
        }

        $class_names = join(' ', array_filter($classes));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $output .= '<li' . $class_names . '>';

        $atts = array();
        $atts['title']  = ! empty($item->title) ? $item->title : '';
        $atts['target'] = ! empty($item->target) ? $item->target : '';
        $atts['rel']    = ! empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = ! empty($item->url) ? $item->url : '';
        $atts['class']   = '';

        // Add dropdown attributes only for first-level menu items with children
        if ($depth === 0 && in_array('menu-item-has-children', $classes)) {
            $atts['class'] = 'nav-link dropdown-toggle';
            $atts['data-toggle'] = 'dropdown';
            $atts['aria-haspopup'] = 'true';
            $atts['aria-expanded'] = 'false';
        } else if ($depth === 0) {
            $atts['class'] = 'nav-link';
        } else if ($depth >= 1 && in_array('menu-item-has-children', $classes)) {
            $atts['class'] .= ' dropdown-toggle';
        }


        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (! empty($value)) {
                $attributes .= ' ' . $attr . '="' . esc_attr($value) . '"';
            }
        }

        $output .= '<a' . $attributes . '>';
        $output .= apply_filters('the_title', $item->title, $item->ID);
        $output .= '</a>';
    }

    // End Element
    function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= "</li>\n";
    }
}
