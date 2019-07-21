<?php
/*
Plugin Name: MyStaff
Plugin URI: http://страница_с_описанием_плагина_и_его_обновлений
Description: Краткое описание плагина.
Version: Номер версии плагина, например: 1.0
Author: Имя автора плагина
Author URI: http://страница_автора_плагина
*/


add_action('init', 'ninyDev_registerStaffType');
function ninyDev_registerStaffType(){

    register_post_type(
        'staff',

        array(
            'labels'             => array(
                'name'               => esc_html__( 'Staff', 'itstep' ), // Основное название типа записи
                'singular_name'      => 'Сотрудник', // отдельное название записи типа Book
                'add_new'            => 'Добавить нового',
                'add_new_item'       => 'Добавить нового сотрудника',
                'edit_item'          => 'Редактировать сотрудника',
                'new_item'           => 'Новый сотрудник',
                'view_item'          => 'Посмотреть сотрудника',
                'search_items'       => 'Найти сотрудника',
                'not_found'          =>  'Сотрудников не найдено',
                'not_found_in_trash' => 'В корзине Сотрудников не найдено',
                'parent_item_colon'  => '',
                'menu_name'          => __( 'Staff')

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
            'supports'           => array('title','editor','thumbnail','custom-fields')
        )
    );

    // список параметров: http://wp-kama.ru/function/get_taxonomy_labels
    register_taxonomy('department', array('staff'), array(
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => array(
            'name'              => 'Отделы',
            'singular_name'     => 'Отдел',
            'search_items'      => 'Search Отдел',
            'all_items'         => 'All Отдел',
            'view_item '        => 'View Отдел',
            'parent_item'       => 'Parent Отдел',
            'parent_item_colon' => 'Parent Отдел:',
            'edit_item'         => 'Edit Отдел',
            'update_item'       => 'Update Отдел',
            'add_new_item'      => 'Add New Отдел',
            'new_item_name'     => 'New Отдел',
            'menu_name'         => 'Отдел',
        ),
        'description'           => 'Подразделения моей компании', // описание таксономии
        'public'                => true,
        'publicly_queryable'    => null, // равен аргументу public
        'show_in_nav_menus'     => true, // равен аргументу public
        'show_ui'               => true, // равен аргументу public
        'show_in_menu'          => true, // равен аргументу show_ui
        'show_tagcloud'         => true, // равен аргументу show_ui
        'show_in_rest'          => null, // добавить в REST API
        'rest_base'             => null, // $taxonomy
        'hierarchical'          => true,
        //'update_count_callback' => '_update_post_term_count',
        'rewrite'               => true,
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities'          => array(),
        'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
        'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
        '_builtin'              => false,
        'show_in_quick_edit'    => null, // по умолчанию значение show_ui
    ) );

    register_taxonomy('lang', array('staff'), array(
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => array(
            'name'              => 'Языки',
            'singular_name'     => 'Язык',
            'search_items'      => 'Search Язык',
            'all_items'         => 'All Язык',
            'view_item '        => 'View Язык',
            'parent_item'       => 'Parent Язык',
            'parent_item_colon' => 'Parent Язык:',
            'edit_item'         => 'Edit Язык',
            'update_item'       => 'Update Язык',
            'add_new_item'      => 'Add New Язык',
            'new_item_name'     => 'New Язык',
            'menu_name'         => 'Язык',
        ),
        'description'           => 'Владение языками программирования', // описание таксономии
        'public'                => true,
        'publicly_queryable'    => null, // равен аргументу public
        'show_in_nav_menus'     => true, // равен аргументу public
        'show_ui'               => true, // равен аргументу public
        'show_in_menu'          => true, // равен аргументу show_ui
        'show_tagcloud'         => true, // равен аргументу show_ui
        'show_in_rest'          => null, // добавить в REST API
        'rest_base'             => null, // $taxonomy
        'hierarchical'          => false,
        //'update_count_callback' => '_update_post_term_count',
        'rewrite'               => true,
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities'          => array(),
        'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
        'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
        '_builtin'              => false,
        'show_in_quick_edit'    => null, // по умолчанию значение show_ui
    ) );

}