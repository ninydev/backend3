<?php

//*--------------------------------------------------------------------------------------------
// Photo
add_action('init', 'addPresentation');
function addPresentation(){
    register_post_type('presentation', array(
        'labels'             => array(
            'name'               => 'Презентации', // Основное название типа записи
            'singular_name'      => 'Презентации', // отдельное название записи типа Book
            'add_new'            => 'Добавить новую',
            'add_new_item'       => 'Добавить новую Презентации',
            'edit_item'          => 'Редактировать Презентации',
            'new_item'           => 'Новое Презентации',
            'view_item'          => 'Посмотреть Презентации',
            'search_items'       => 'Найти Презентации',
            'not_found'          =>  'Презентации не найдено',
            'not_found_in_trash' => 'В корзине фото не Презентации',
            'parent_item_colon'  => '',
            'menu_name'          => 'Презентации'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title','editor','thumbnail')
    ) );


    // Добавляем НЕ древовидную таксономию 'writer' (как метки)
    register_taxonomy('yers', 'presentation',array(
        'hierarchical'  => false,
        'labels'        => array(
            'name'                        => _x( 'Yers', 'taxonomy general name' ),
            'singular_name'               => _x( 'Yers', 'taxonomy singular name' ),
            'search_items'                =>  __( 'Search Yers' ),
            'popular_items'               => __( 'Popular Yers' ),
            'all_items'                   => __( 'All Yers' ),
            'parent_item'                 => null,
            'parent_item_colon'           => null,
            'edit_item'                   => __( 'Edit Yers' ),
            'update_item'                 => __( 'Update Yers' ),
            'add_new_item'                => __( 'Add New Yers' ),
            'new_item_name'               => __( 'New Yers Name' ),
            'separate_items_with_commas'  => __( 'Separate Yers with commas' ),
            'add_or_remove_items'         => __( 'Add or remove Yers' ),
            'choose_from_most_used'       => __( 'Choose from the most used Yers' ),
            'menu_name'                   => __( 'Yers' ),
        ),
        'show_ui'       => true,
        'query_var'     => true,
        //'rewrite'       => array( 'slug' => 'the_writer' ), // свой слаг в URL
    ));


}

//*--------------------------------------------------------------------------------------------
// register_sidebar()
add_action( 'widgets_init', 'register_my_widgets' );
function register_my_widgets(){
    register_sidebar( array(
        'name'          => 'AboutLeft',
        'id'            => "aboutLeft",
        'description'   => 'Text on page about',
    ) );

    register_sidebar( array(
        'name'          => 'AboutFooter',
        'id'            => "aboutFooter",
        'description'   => 'text in footer',
    ) );

}

//*--------------------------------------------------------------------------------------------
// Photo
add_action('init', 'addPhoto');
function addPhoto(){
    register_post_type('photo', array(
        'labels'             => array(
            'name'               => 'Фотки', // Основное название типа записи
            'singular_name'      => 'Фотка', // отдельное название записи типа Book
            'add_new'            => 'Добавить новую',
            'add_new_item'       => 'Добавить новую фото',
            'edit_item'          => 'Редактировать фото',
            'new_item'           => 'Новое фото',
            'view_item'          => 'Посмотреть фото',
            'search_items'       => 'Найти фото',
            'not_found'          =>  'фото не найдено',
            'not_found_in_trash' => 'В корзине фото не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Фото'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('thumbnail')
    ) );
}


//*--------------------------------------------------------------------------------------------


function register_my_menu() {
    register_nav_menu('MainMenu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );


class MyMainMenu extends Walker_Nav_Menu {

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

        $classes   = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        /**
         * Filters the arguments for a single nav menu item.
         *
         * @since 4.4.0
         *
         * @param stdClass $args  An object of wp_nav_menu() arguments.
         * @param WP_Post  $item  Menu item data object.
         * @param int      $depth Depth of menu item. Used for padding.
         */
        $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

        /**
         * Filters the CSS classes applied to a menu item's list item element.
         *
         * @since 3.0.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param string[] $classes Array of the CSS classes that are applied to the menu item's `<li>` element.
         * @param WP_Post  $item    The current menu item.
         * @param stdClass $args    An object of wp_nav_menu() arguments.
         * @param int      $depth   Depth of menu item. Used for padding.
         */
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        /**
         * Filters the ID applied to a menu item's list item element.
         *
         * @since 3.0.1
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param string   $menu_id The ID that is applied to the menu item's `<li>` element.
         * @param WP_Post  $item    The current menu item.
         * @param stdClass $args    An object of wp_nav_menu() arguments.
         * @param int      $depth   Depth of menu item. Used for padding.
         */
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';



        $atts           = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target ) ? $item->target : '';
        if ( '_blank' === $item->target && empty( $item->xfn ) ) {
            $atts['rel'] = 'noopener noreferrer';
        } else {
            $atts['rel'] = $item->xfn;
        }
        $atts['href']         = ! empty( $item->url ) ? $item->url : '';
        $atts['aria-current'] = $item->current ? 'page' : '';

        // Keeper
        //echo $item->ID . " ";
        if ($item->ID == 39) {
            $atts ['class'] = "btn round-btn";
           //var_dump($atts);
        }

        /**
         * Filters the HTML attributes applied to a menu item's anchor element.
         *
         * @since 3.6.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param array $atts {
         *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
         *
         *     @type string $title        Title attribute.
         *     @type string $target       Target attribute.
         *     @type string $rel          The rel attribute.
         *     @type string $href         The href attribute.
         *     @type string $aria_current The aria-current attribute.
         * }
         * @param WP_Post  $item  The current menu item.
         * @param stdClass $args  An object of wp_nav_menu() arguments.
         * @param int      $depth Depth of menu item. Used for padding.
         */
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        /** This filter is documented in wp-includes/post-template.php */
        $title = apply_filters( 'the_title', $item->title, $item->ID );

        /**
         * Filters a menu item's title.
         *
         * @since 4.4.0
         *
         * @param string   $title The menu item's title.
         * @param WP_Post  $item  The current menu item.
         * @param stdClass $args  An object of wp_nav_menu() arguments.
         * @param int      $depth Depth of menu item. Used for padding.
         */
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

        $item_output  = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        /**
         * Filters a menu item's starting output.
         *
         * The menu item's starting output only includes `$args->before`, the opening `<a>`,
         * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
         * no filter for modifying the opening and closing `<li>` for a menu item.
         *
         * @since 3.0.0
         *
         * @param string   $item_output The menu item's starting HTML output.
         * @param WP_Post  $item        Menu item data object.
         * @param int      $depth       Depth of menu item. Used for padding.
         * @param stdClass $args        An object of wp_nav_menu() arguments.
         */
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    //    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
//    {
//        $output = "Start El";
//    }
}
