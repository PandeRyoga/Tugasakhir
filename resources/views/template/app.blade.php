<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Portal Berita Desa Adat Bualu</title>
    <link rel="icon" href="{{asset('front/img/logo-desa-mini.png')}}" type="image/x-icon"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet">

     <!--jquery untuk galeri-->
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <link type="text/css" rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css')}}" />

    <link rel="stylesheet" href="{{asset('front/css/font-awesome.min.css')}}">

    <link type="text/css" rel="stylesheet" href="{{asset('front/css/style.css')}}" />
</head>

<body>

    <!-- Header -->
    <header id="header">
        <!-- Nav -->
        <div id="nav" >
            <!-- Main Nav -->
            <div id="nav-fixed">
                <div class="container" >
                    <!-- logo -->
                    <div class="nav-logo">
                        <a href="{{route ('home')}}" class="logo"><img src="{{asset('front/img/bualuvillage.png')}}" alt=""></a>
                    </div>
                    <!-- /logo -->

                    <!-- nav -->
                    @stack('nav')
                    <!-- /nav -->

                    <!-- search & aside toggle -->
                    <div class="nav-btns">
                        <button class="aside-btn"><i class="fa fa-bars"></i></button>
                       
                       
                    </div>
                    <!-- /search & aside toggle -->
                </div>
            </div>
            <!-- /Main Nav -->

            <!-- Aside Nav -->
            <div id="nav-aside">
                <!-- nav -->
                <div class="section-row">
                    <ul class="nav-aside-menu">
                        <li><a href="{{route('album-index')}}">Album</a></li>
                        <li><a href="{{route('tentang-index')}}">Tentang</a></li>
                        <li><a href="{{route('login')}}">Masuk</a></li>
                    </ul>
                </div>
                <!-- /nav -->


                <!-- social links -->
                <div class="section-row">
                    <h3>Ikuti Sosial Media Kami</h3>
                    <ul class="nav-aside-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
                <!-- /social links -->

                <!-- aside nav close -->
                <button class="nav-aside-close"><i class="fa fa-times"></i></button>
                <!-- /aside nav close -->
            </div>
            <!-- Aside Nav -->
        </div>
        <!-- /Nav -->
    </header>
    <!-- /Header -->

    @yield('content')


    <!-- Footer -->
    <footer id="footer">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-5">
                    <div class="footer-widget">
                        <div class="footer-logo">
                          <img src="{{asset('front/img/logo2.png')}}" alt="" width="200px">
                            <p>     ©2023 Desa Adat Bualu</p>
                        </div> 
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="footer-widget">
                                <h3 class="footer-title">Tentang Kami</h3>
                                <ul class="footer-links">
                                    <li><a href="{{route('album-index')}}">Album</a></li>
                                    <li><a href="{{route('tentang-index')}}">Tentang</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="footer-widget">
                                <h3 class="footer-title">Kategori</h3>
                                <ul class="footer-links">
                                    @stack('categori')
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="col-md-3">
        <div class="footer-widget">
            <h3 class="footer-title">Ikuti Sosial Media Kami</h3>
            <div class="footer-newsletter">
            </div>
            <ul class="footer-social">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
        </div>
    </div>

</div>
<!-- /row -->
</div>
<!-- /container -->
</footer>
<!-- /Footer -->

<!-- jQuery Plugins -->
<script src="{{asset('front/js/jquery.min.js')}}"></script>
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front/js/main.js')}}"></script>
<script id="dsq-count-scr" src="//portal-berita-desa-bualu.disqus.com/count.js" async></script>

</body>

</html>