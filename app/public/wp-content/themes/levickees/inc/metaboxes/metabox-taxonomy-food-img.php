<?php

class TaxoImg
{
    const META_KEY = 'foods_types_thumbnails';
    
    public static function register()
    {
        add_action('foods_types_add_form_fields', [self::class, 'render'] );
        add_action('foods_types_edit_form_fields', [self::class, 'render'] );
        add_action('create_foods_types', [self::class, 'save'] );
        add_action('edited_foods_types', [self::class, 'save'] );
    }

    public static function render($term)
    {
        $value = '';

        if(!empty($term->term_id)) {
            $value = get_term_meta($term->term_id, self::META_KEY, true);
        }

        ?>
            <div class="form-field term-image-wrap">
                <label for="taxonomy-image-id"><?php _e( 'Image' ); ?></label>
                <p><a href="#" class="ct_tax_media_button button button-secondary"><?php _e('Upload Image'); ?></a></p>
                <input type="text" name="<?= self::META_KEY ?>" id="taxonomy-image-id" value="<?= $value ?>" size="40" />
            </div>
         <?php
    }

    public static function save($term_id)
    {
        $input = $_POST[self::META_KEY];

        if (!empty($input)) {
            update_term_meta($term_id, self::META_KEY, $input);
        } else {
            delete_term_meta($term_id, self::META_KEY);
        }
    }
}