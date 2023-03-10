<?php

if (!defined('ABSPATH')) {
    exit();
}

require get_template_directory() . '/inc/metaboxes/metabox-food-price.php';
FoodPrice::register();

require get_template_directory() . '/inc/metaboxes/metabox-taxonomy-food-img.php';
TaxoImg::register();

require get_template_directory() . '/inc/metaboxes/metabox-taxonomy-food-meat.php';
TaxoMeats::register();