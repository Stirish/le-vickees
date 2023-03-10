<?php

$supplementsTypes = get_terms([
    'taxonomy'   => 'supplement_types',
]);

foreach ($supplementsTypes as $supplementType) {

    ?>
        <div class='supplement-card col-10'>
            <div class='supplement-card--category'>
                <h2 class='supplement-card--category--title'><?= $supplementType->name ?></h2>
            </div>
            <div class='supplement-card--sauces'>
                <?php

                    $query = new WP_Query([
                        'post_type'      => 'foodsupplement',
                        'posts_per_page' => -1,
                        'orderby'        => 'menu_order',
                        'order'          => 'ASC',
                        'tax_query'      => [
                            [
                                'taxonomy' => 'supplement_types',
                                'field'    => 'term_id',
                                'terms'    => $supplementType->term_id,
                            ]
                        ]
                    ]);

                    if ($query->have_posts()) {

                        while ($query->have_posts()) : $query->the_post();

                            $sauces[] = get_the_title();

                        endwhile;

                        $implode = implode(" / ", $sauces);

                        ?>

                            <span class='supplement-card--sauces--title'><?= $implode ?></span>

                        <?php
                        wp_reset_postdata();
                    }

                ?>
            </div>
        </div>
    <?php
}