<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= wp_get_document_title() ?></title>
    <script>document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/, 'js');</script>
    <?php wp_head() ?>
</head>
<body <?php body_class() ?>>
<div class="flex h-screen h-available overflow-y-hidden flex-col-reverse md:flex-row ">

    <nav class="site-menu-wrapper w-full h-12 md:h-screen border-t pt-0.5 md:pt-2 md:flex-none md:w-16 border-r border-black cursor-pointer relative">
        <?php
        \MyTheme\View::render('SiteMenu');
        ?>
    </nav>
    <?php
    \MyTheme\View::render('MenuSlider');
    ?>
    <?php
    \MyTheme\View::render('ShopInfo');
    ?>
    <script type="text/javascript">
        jQuery(function($) {
            $('.site-menu-wrapper, .menuSlider .exit').click(function() {
                if ($(window).width() < 769) {
                    $('.menuSlider').toggleClass('w-full');
                }
                else {
                    $('.menuSlider').toggleClass('opener');
                }
                $('.menuSlider').toggleClass('w-0');
            });

            $('.menuSlider .info, .shopInfo .exit, .product-details .info').click(function() {
                if ($(window).width() < 769) {
                    $('.shopInfo').toggleClass('w-full');
                }
                else {
                    $('.shopInfo').toggleClass('opener');
                }

                setTimeout(() => {
                    if ($('.shopInfo').hasClass('opener')) { window.addEventListener('click', clickOutsideListener); }
                    else { window.removeEventListener('click', clickOutsideListener) }
                }, 150)
                $('.shopInfo').toggleClass('w-0');
            });
        });

        function clickOutsideListener (e) {
            if (window.isMobile) return

            const shopInfo = document.querySelector('.shopInfo')
            if (shopInfo.contains(e.target)){
                // Clicked in box
            } else{
                // Clicked outside the box
                if (shopInfo.classList.contains('opener')) {
                    // shopInfo.classList.remove('w-full')
                    jQuery('.shopInfo').toggleClass('opener');
                    jQuery('.shopInfo').toggleClass('w-0');
                }
            }
        }
    </script>