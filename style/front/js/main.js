$(function () {
    'use strict';
    $('[data-toggle="datepicker"]').datepicker();
    /* -------------------------------------------------------------------
            Back To Top Button
           ------------------------------------------------------------------- */
    var body = $('body');
    var btnTop = $('#btn-top');
    $(window).on('scroll', function () {
        if ($(window).scrollTop() > 400) {
            btnTop.fadeIn(1000);
        }
        else {
            btnTop.fadeOut(1000);
        }
    });
    btnTop.on('click', function () {
        body.animate({
            scrollTop: 0
        }, 2000);
    });
    
    /* -------------------------------------------------------------------
        PageLoader
       ------------------------------------------------------------------- */
    $(window).on('load', function () {
        $('.pageloader .spinner').fadeOut(2000, function () {
            $('.pageloader').fadeOut();
        });
    });
    
    $('#shareItem').on('click', function () {
        $('.share-box').fadeToggle();
        event.preventDefault();
    });
    
    $('.share').on('click', function () {
        $(this).parent().toggleClass('active');
        
        event.preventDefault();
    });
    
    /* -------------------------------------------------------------------
        Custom Audio Player
       ------------------------------------------------------------------- */
    
    var myVideo = document.getElementById("custom-audio"),
        myPlayBtn = document.getElementById('playBtn'); 

    myPlayBtn.onclick = function playPause() { 
        if (myVideo.paused) 
            myVideo.play(); 
        else 
            myVideo.pause(); 
    }  
});