@extends('layouts.app')
    @section('js')
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <link href='/css/carousel-css.css' rel="stylesheet" type="text/css"  />
        
    @endsection

    @section('content')
    <div class='page-wrapper'>
        <div class="post-slider">
            <h1 class="slide-title">codigo dos outros lib tambem</h1>
           <div class='center-slider'>
            <i class='fas fa-chevron-left prev fa-2x'> </i> 
            <div class="post-wrapper">
                <div class="post col-12 shadow-lg">1</div>
                <div class="post col-12">2</div>
                <div class="post col-12">3</div>
                <div class="post col-12">4</div>
                <div class="post col-12">5</div>            
            </div>
           
            <i class='fas fa-chevron-right next fa-2x'> </i> 
            </div>
        </div>
    </div>
    <script>
       
window.addEventListener('change', () =>{
    if (window.matchMedia("(min-width: 100px)").matches) {
        console.log('entrei')
        $('.post-wrapper').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            nextArrow:$('.next'),
            prevArrow:$('.prev')
            });
    }
    else {
        $('.post-wrapper').slick({
            dots: true,
            infinite: true,
            speed: 300,
            autoplaySpeed: 2000,
            slidesToShow: 1,
            slidesToScroll: 1,
            responsive: [
            {
                breakpoint: 1024,
                settings: {
                slidesToShow: 3,
                autoplay: true,
                autoplaySpeed: 2000,
                slidesToScroll: 3,
                infinite: true,
                dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                slidesToShow: 2,
                autoplay: true,
                autoplaySpeed: 2000,
                slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                slidesToShow: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                slidesToScroll: 1
                }
            }

            ]
        });
    }


});


            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object

           
    </script>
    @endsection