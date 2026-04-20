<?php
/**
 * Custom Nav Walker for Mega Menu with Column Support
 *
 * - Identifies columns by href containing "/col-" (e.g., /col-1, /col-2)
 * - Displays the title as a non-clickable column header
 * - Supports single-column dropdowns with smaller styling
 */

if (! class_exists('Mega_Menu_Walker')) {

    class Mega_Menu_Walker extends Walker_Nav_Menu
    {

        /**
         * Track if we're inside a mega menu (depth 0 submenu)
         */
        private $in_mega_menu = false;

        /**
         * Count columns in current mega menu
         */
        private $column_count = 0;

        /**
         * Track if single-column wrapper was opened
         */
        private $single_column_started = false;

        /**
         * Check if an item is a column marker (by URL only)
         */
        private function is_column_marker($item)
        {
            return (preg_match('/\/col-\d+/', $item->url));
        }

        /**
         * Get column number from URL
         */
        private function get_column_number($item)
        {
            if (preg_match('/col-(\d+)/', $item->url, $matches)) {
                return intval($matches[1]);
            }
            return 1;
        }

        /**
         * Count columns for a menu item (check children)
         */
        private function count_columns($elements, $parent_id)
        {
            $count = 0;
            foreach ($elements as $element) {
                if ($element->menu_item_parent == $parent_id && $this->is_column_marker($element)) {
                    $count++;
                }
            }
            return $count;
        }

        /**
         * Starts the list before the elements are added.
         */
        public function start_lvl(&$output, $depth = 0, $args = null)
        {
            if ($depth === 0) {
                // First level submenu - this is the mega menu dropdown
                $this->in_mega_menu = true;
                $this->column_count = 0;
                $this->single_column_started = false;
                $output .= '<div class="mega-menu-dropdown">';
                $output .= '<div class="mega-menu-inner">';
            } elseif ($depth === 1 && $this->in_mega_menu) {
                // Second level - inside a column, start the list
                $output .= '<ul class="mega-menu-column-list">';
            } else {
                // Deeper or non-mega submenus
                $output .= '<ul class="sub-menu">';
            }
        }

        /**
         * Ends the list after the elements are added.
         */
        public function end_lvl(&$output, $depth = 0, $args = null)
        {
            if ($depth === 0) {
                // Close single-column wrapper if it was opened
                if ($this->single_column_started) {
                    $output .= '</ul>';
                    $output .= '</div>'; // .mega-menu-column-single
                    $this->single_column_started = false;
                }
                // Close mega menu dropdown
                $output .= '</div>'; // .mega-menu-inner
                $output .= '</div>'; // .mega-menu-dropdown
                $this->in_mega_menu = false;
                $this->column_count = 0;
            } elseif ($depth === 1 && $this->in_mega_menu) {
                // Close column list
                $output .= '</ul>'; // .mega-menu-column-list
            } else {
                $output .= '</ul>';
            }
        }

        /**
         * Starts the element output.
         */
        public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
        {
            $args = (object) $args;

            // Handle column markers at depth 1
            if ($depth === 1 && $this->in_mega_menu && $this->is_column_marker($item)) {
                $this->column_count++;
                $col_num = $this->get_column_number($item);
                $col_title = apply_filters('the_title', $item->title, $item->ID);

                $output .= '<div class="mega-menu-column mega-menu-column-' . $col_num . '">';

                // Show column title if it's not empty or just the col marker
                if (! empty($col_title) && ! preg_match('/^\/?(col-\d+|#)$/', $col_title)) {
                    $output .= '<h4 class="mega-menu-column-title">' . esc_html($col_title) . '</h4>';
                }

                return; // Don't output the marker as a clickable menu item
            }

            // Handle regular items at depth 1 that are NOT column markers (single column case)
            if ($depth === 1 && $this->in_mega_menu && ! $this->is_column_marker($item) && $this->column_count === 0) {
                // This is a direct child without column markers - single column dropdown
                // We need to wrap it in a single column container (only once)
                if (! $this->single_column_started) {
                    $output .= '<div class="mega-menu-column mega-menu-column-single">';
                    $output .= '<ul class="mega-menu-column-list">';
                    $this->single_column_started = true;
                }
            }

            // Build classes for regular items
            $classes = empty($item->classes) ? array() : (array) $item->classes;
            $classes[] = 'menu-item-' . $item->ID;

            if ($depth === 0) {
                $classes[] = 'top-level-item';
                if (in_array('menu-item-has-children', $classes)) {
                    $classes[] = 'has-mega-menu';
                }
            }

            $class_names = implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

            $id_attr = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
            $id_attr = $id_attr ? ' id="' . esc_attr($id_attr) . '"' : '';

            $output .= '<li' . $id_attr . $class_names . '>';

            // Build link
            $atts = array(
                'title'  => ! empty($item->attr_title) ? $item->attr_title : '',
                'target' => ! empty($item->target) ? $item->target : '',
                'rel'    => ! empty($item->xfn) ? $item->xfn : '',
                'href'   => ! empty($item->url) ? $item->url : '',
            );

            if ($depth === 0 && in_array('menu-item-has-children', (array) $item->classes)) {
                $atts['class'] = 'top-level-link';
            }

            $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

            $attributes = '';
            foreach ($atts as $attr => $value) {
                if (! empty($value)) {
                    $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            $title = apply_filters('the_title', $item->title, $item->ID);
            $title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);

            $item_output = isset($args->before) ? $args->before : '';
            $item_output .= '<a' . $attributes . '>';
            $item_output .= (isset($args->link_before) ? $args->link_before : '') . $title . (isset($args->link_after) ? $args->link_after : '');
            $item_output .= '</a>';
            $item_output .= isset($args->after) ? $args->after : '';

            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        }

        /**
         * Ends the element output.
         */
        public function end_el(&$output, $item, $depth = 0, $args = null)
        {
            // Column markers close with </div> instead of </li>
            if ($depth === 1 && $this->in_mega_menu && $this->is_column_marker($item)) {
                $output .= '</div>'; // .mega-menu-column
                return;
            }

            $output .= '</li>';
        }

        /**
         * Override display_element to detect single-column menus
         */
        public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output)
        {
            // For top-level items with children, check if they have column markers
            if ($depth === 0 && isset($children_elements[ $element->ID ])) {
                $has_columns = false;
                foreach ($children_elements[ $element->ID ] as $child) {
                    if ($this->is_column_marker($child)) {
                        $has_columns = true;
                        break;
                    }
                }

                // Add a class to identify single-column menus
                if (! $has_columns && ! empty($children_elements[ $element->ID ])) {
                    $element->classes[] = 'single-column-menu';
                }
            }

            parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
        }
    }
}
