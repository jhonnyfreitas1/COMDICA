@extends('layouts.app')
    @section('js')
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <link href='/css/carousel-css.css' rel="stylesheet" type="text/css"  />
        
    @endsection

    @section('content')
    <div class='page-wrapper'>
        <div class="post-slider">
            <h1 class="slide-title   font-italic   font-weight-bolder text-light title ">Postagens recentes</h1>
           <div class='center-slider'>
            <i class='fas fa-chevron-left prev fa-2x'> </i> 
            <div class="post-wrapper">
                <li class="card">
                    <p class="text-title" disabled>
                    </p>
                    <div class='img-container'> 
                        <img class="image" src="https://avatars0.githubusercontent.com/u/9892522?v=4"alt="..." disabled />
                    </div>  
                    <h3 class="text-justify badge badge-primary text-wrap">sempre é visto aquilo que é sempre visto é feito feito feito feito feito</h3>    
                </li>
                <li class="card">
                    <p class="text-title" disabled>
                    </p>
                    <div class='img-container'> 
                        <img class="image" src="https://cdn.pixabay.com/photo/2018/08/21/23/29/fog-3622519__340.jpg"alt="..." disabled />
                    </div>  
                    <h3 class="text-justify badge badge-primary text-wrap">sempre é visto aquilo que é sempre visto é feito feito feito feito feito</h3>    
                </li>
                <li class="card">
                    <p class="text-title" disabled>
                    </p>
                    <div class='img-container'> 
                        <img class="image" src="https://cdn.pixabay.com/photo/2018/02/08/22/27/flower-3140492__340.jpg"alt="..." disabled />
                    </div>  
                    <h3 class="text-justify badge badge-primary text-wrap">sempre é visto aquilo que é sempre visto é feito feito feito feito feito</h3>    
                </li>
                <li class="card">
                    <p class="text-title" disabled>
                    </p>
                    <div class='img-container'> 
                        <img class="image" src="https://www.intz.com.br/wp-content/uploads/wallpapers/WallpaperApollo_Mobile.png"alt="..." disabled />
                    </div>  
                    <h3 class="text-justify badge badge-primary text-wrap">sempre é visto aquilo que é sempre visto é feito feito feito feito feito</h3>    
                </li>
                <li class="card">
                    <p class="text-title" disabled>
                    </p>
                    <div class='img-container'> 
                        <img class="image" src="https://i.pinimg.com/originals/67/f7/9c/67f79c2f393ef84880b507429d24fa43.png"alt="..." disabled />
                    </div>  
                    <h3 class="text-justify badge badge-primary text-wrap">sempre é visto aquilo que é sempre visto é feito feito feito feito feito</h3>    
                </li>
                           
            </div>
           
            <i class='fas fa-chevron-right next fa-2x'> </i> 
            </div>
        </div>
    </div>
   
    <script>
    $('.post-wrapper').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            nextArrow:$('.next'),
            prevArrow:$('.prev'),
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
    


            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object

           
    </script>
    @endsection