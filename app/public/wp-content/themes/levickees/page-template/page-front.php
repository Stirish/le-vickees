<?php

/**
 * Template Name: Home page
 * Template Post Type: page
 *
 * @package levickees
 */
?>

<?php get_header(); ?>

<main>
    <section class='container' id='menus'>
            <div class='row'>
                <div class='all-cards col-12'>
                    <?php 
                        get_template_part('parts/card-food', 'post');
                        get_template_part('parts/card-supplement', 'post');
                    ?>
                </div>
            </div>
    </section>
</main>
<?php get_footer() ?>