/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



jQuery(document).ready(function ($) {

    $(window).resize(function () {
        var bodyheight = $(this).height();
        $(".home-banner").height(bodyheight);
    }).resize();

    $(".owl-slider").owlCarousel({
        items: 3,
        lazyLoad: true,
        navigation: true,
        margin: 10

    });


    $('.carousel').carousel({
        interval: 5000 //changes the speed
    });

    $("#datepicker").datepicker();

    $(".owl-slider.owl-about").owlCarousel({
        items: 4,
        itemsDesktop: [1370, 4],
        itemsDesktopSmall: [979, 3],
        itemsTablet: [768, 3],
        itemsTabletSmall: false,
        itemsMobile: [479, 1],
        margin: 5
    });

    $('#selfDrive').click(function () {
      $('#driveType').val('0');
      $('.divDriver').addClass('hide');
      $('.filterform').removeClass('hide');
    });

    $('#withDriver').click(function () {
      $('.filterform').removeClass('hide');
      $('.divDriver').removeClass('hide');
    $('#driveType').val('1');

    });
});  