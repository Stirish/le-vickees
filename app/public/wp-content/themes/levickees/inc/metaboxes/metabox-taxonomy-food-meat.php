<?php

class TaxoMeats
{
    const META_KEY = 'foods_types_meats';
    
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
            <div class="form-table" role="presentation">
                <tbody>
                    <tr class="form-field term-slug-wrap">
                        <th scope="row"><label for="slug">Viandes</label></th>    
                        <td>
                            <input name="<?= self::META_KEY ?>" type="text" value="<?= $value ?>" style="width: 95%">
                            <p class="description">Entrer une valeur | ex : Tender, Cordon Bleu</p>
                        </td>
                    </tr>
                </tbody>
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