jQuery(document).ready(function () {
    $ = jQuery;

    // Bouton menu pour la version mobile
    $('#menu-button').on('click', function (e) {
        let pressed = $(this).attr("aria-pressed") == "true";
        //change la valeur de aria-pressed quand le bouton est basculé :
        $(this).attr("aria-pressed", pressed ? "false" : "true");
        //        $(this).blur(); // Supprime le focus => ne pas supprimer le focus car lors du clic au clavier on perd le focus
        $(this).stop(true, true).toggleClass('active');
        $('nav').stop(true, true).toggleClass('active');
        e.preventDefault();
    });

    $('#slider-singleproduit').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
    });

    $('#more-article').slick({
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 2,
        arrows: false,
        dots: false,
    });



});