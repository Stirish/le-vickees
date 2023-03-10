<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <script>
        var script = document.createElement('script');
        script.dataset.cache = true;
        script.dataset.websiteId = '4c791654-0bb6-43e2-9e92-e147793774b8';
        script.src = 'https://s.abla.io/abla.js';
        document.getElementsByTagName('head')[0].appendChild(script);
    </script>
    <?php wp_head() ?>
</head>

<body>
    <header class='header'>
        <div class='container'>
            <div class='row header--content '>
                <div class='header--content--items col-12 col-lg-6'>
                    <div class='header--content--items--container'>
                        <h1 class='header--content--items--title'>
                            <span class='header--content--items--title__title'><?php the_title() ?></span>
                            <span class='header--content--items--title__subtitle'>Votre snack à Saint-drezery</span>
                        </h1>
                        <div class='header--btn'>
                            <a href='#menus'><button class='header--btn--purple'>Découvrez nos menus</button></a>
                            <a href='https://goo.gl/maps/R6HxSvkdZtJT7yTd8' target='_blank'><button class='header--btn--yellow'>Itinéraire</button></a>
                            <a href='tel:0780368634'><button class='header--btn--yellow'><i class="fas fa-phone"></i></button></a>
                        </div>
                    </div>
                </div>
                <div class='header--content--image col-6'>
                    <?php the_post_thumbnail() ?>
                </div>
            </div>
        </div>
    </header>