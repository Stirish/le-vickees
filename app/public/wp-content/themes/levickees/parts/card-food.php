<?php

$foodsTypes = get_terms([
    'taxonomy'   => 'foods_types',
]);


foreach ($foodsTypes as $foodType) {

    $image = get_term_meta( $foodType->term_id, 'foods_types_thumbnails', true );
    $style = "" ;
    
    if (!empty($image)) {
        $style = "style='background-image: url(" . $image . ");'" ;
    }
    ?>

        <div class='food-card col-10' <?= $style ?>>
           
            <div class='food-card--category col'>
                <h2 class='food-card--category--title'><?= $foodType->name ?></h2>
            </div>
            <div class='food-card--menu col'>
                <div class='food-card--menu--all-info'>
                    <?php

                        $query = new WP_Query([
                            'post_type' => 'foodstuff',
                            'posts_per_page' => -1,
                            'orderby' => 'menu_order',
                            'order' => 'ASC',
                            'tax_query' => [
                                [
                                    'taxonomy' => 'foods_types',
                                    'field'    => 'term_id',
                                    'terms'    => $foodType->term_id,
                                ]
                            ]
                        ]);

                        if ($query->have_posts()) {

                            while ($query->have_posts()) : $query->the_post();

                                $prices = get_post_meta(get_the_ID(), FoodPrice::META_KEY, true);

                                ?>
                                
                                    <div class='food-card--menu--all-info--info'>
                                        <span class='food-card--menu--all-info--info--title'><?= the_title() ?></span>
                                        <span class='food-card--menu--all-info--info--price'><?= $prices ?>€</span>
                                    </div>

                                <?php
                            endwhile;
                            wp_reset_postdata();
                        }

                        $meats = get_term_meta($foodType->term_id, 'foods_types_meats', true);

                        if (!empty($meats) ) {
                            ?>  
                                <br />
                                <div class='food-card--menu--all-info--meats'>
                                    <?= $meats ?>
                                </div> 
                            <?php
                        }
                    
                    ?>
                </div>    
            </div>
        </div>
    <?php
}