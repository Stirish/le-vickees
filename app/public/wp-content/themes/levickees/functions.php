<?php

function sf_levickees_supports()
{
   add_theme_support('title-tag');
   add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'sf_levickees_supports');

function sf_levickees_register_assets()
{

   wp_register_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css');
   wp_enqueue_style('bootstrap-css');

   wp_register_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', [], false, true);
   wp_enqueue_script('bootstrap-js');

   wp_register_script('fontawesome-js', 'https://kit.fontawesome.com/3302364883.js', [], false, true);
   wp_enqueue_script('fontawesome-js');

   wp_enqueue_style('levickees-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'sf_levickees_register_assets');


function aw_include_script()
{

   if (!did_action('wp_enqueue_media')) {
      wp_enqueue_media();
   }

   wp_enqueue_script('taxonomy-image-script', get_stylesheet_directory_uri() . '/js/taxonomy-image-script.js', array('jquery'), null, false);
}
add_action('admin_enqueue_scripts', 'aw_include_script');

function sf_levickees_init()
{
   register_post_type('foodstuff', [
      'label'         => 'Vos Menus',
      'public'        => true,
      'menu_position' => -1,
      'menu_icon'     => 'dashicons-food',
      'supports'      => ['title', 'editor', 'thumbnail', 'page-attributes'],
      'show_in_rest'  => true,
      'has_archive'   => true,
   ]);

   register_post_type('foodsupplement', [
      'label'         => 'Vos Suppléments',
      'public'        => true,
      'menu_position' => 1,
      'menu_icon'     => 'dashicons-plus',
      'supports'      => ['title', 'editor', 'thumbnail', 'page-attributes'],
      'show_in_rest'  => true,
      'has_archive'   => true,
   ]);

   register_taxonomy('foods_types', 'foodstuff', [
      'labels' => [
         'name'              => 'Types de menus',
         'singular_name'     => 'Type de menu',
         'plural_name'       => 'Types de menus',
         'search_items'      => 'Rechercher des types de menus',
         'all_items'         => 'Tous les types de menus',
         'edit_item'         => 'Editer le type de menu',
         'update_item'       => 'Mettre à jour le type de menu',
         'add_new_item'      => 'Ajouter un nouveau type de menu',
         'new_item_name'     => 'Ajouter un nouveau type de menu',
         'menu_name'         => 'Type de menu',
      ],
      'show_in_rest'      => true,
      'hierarchical'      => true,
      'show_admin_column' => true,
      'meta_box_cb'       => 'post_categories_meta_box',
   ]);

   register_taxonomy('supplement_types', 'foodsupplement', [
      'labels' => [
         'name'              => 'Types de suppléments',
         'singular_name'     => 'Type de supplément',
         'plural_name'       => 'Types de suppléments',
         'search_items'      => 'Rechercher des types de suppléments',
         'all_items'         => 'Tous les types de suppléments',
         'edit_item'         => 'Editer le type de supplément',
         'update_item'       => 'Mettre à jour le type de supplément',
         'add_new_item'      => 'Ajouter un nouveau type de supplément',
         'new_item_name'     => 'Ajouter un nouveau type de supplément',
         'menu_name'         => 'Type de supplément',
      ],
      'show_in_rest'      => true,
      'hierarchical'      => true,
      'show_admin_column' => true,
      'meta_box_cb'       => 'post_categories_meta_box',
   ]);
}
add_action('init', 'sf_levickees_init');

function sf_widgets_init()
{
   register_sidebar(
      array(
         'name'           => esc_html('Footer 1', 'oreca'),
         'id'             => 'footer-1',
         'description'    => esc_html('Add widgets here.', 'oreca'),
         'before_widget'  => '<section id="%1$s" class="widget %2$s">',
         'after_widget'   => '</section>',
         'before_title'   => '<h5 class="widget-title">',
         'after_title'    => '</h5>',
         'before_sidebar' => '<div class="col-12 col-sm-6 col-lg legals">',
         'after_sidebar'  => '</div>',
      )
   );
}
add_action('widgets_init', 'sf_widgets_init');

// ------------------ Metaboxes

require get_template_directory() . '/inc/metaboxes/init.php';
