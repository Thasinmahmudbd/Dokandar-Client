<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- meta -->
    @section('meta')
    @show

    <meta name="author" content="Thasin Mahmud">

    <!-- title -->
    @section('title')
    @show

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="#">
    <link rel="icon" type="image/png" sizes="32x32" href="#">
    <link rel="icon" type="image/png" sizes="16x16" href="#">
    <link rel="manifest" href="#">
    <!-- CDN Development -->
    <link rel="stylesheet" href="https://raw.githack.com/Thasinmahmudbd/TcSS-Framework/Thasin/dist/css/tcss.min.css">
    <!-- CDN Backup -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Thasinmahmudbd/TcSS-Framework/dist/css/tcss.min.css">
    <!-- CDN Production (current version)-->
    <link rel="stylesheet" href="https://rawcdn.githack.com/Thasinmahmudbd/TcSS-Framework/8272c261b90f1bd691ade6402fa9f73ada36fa12/dist/css/tcss.min.css">

    <!-- style -->
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/videoGallery.css')}}">
    <link rel="stylesheet" href="{{asset('css/articleModeShift.css')}}">
    <link rel="stylesheet" href="{{asset('css/global.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive/index_res.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive/global_res.css')}}">
    <link rel="stylesheet" href="{{asset('css/cursor.css')}}">

    <!-- aos -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- fonts    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&family=Satisfy&display=swap" rel="stylesheet">

    <!-- icons -->
    <script src="https://kit.fontawesome.com/aafecdc4bf.js" crossorigin="anonymous"></script>

    <!-- Script -->
    <script defer src="{{asset('js/pigment.js')}}"></script>
    <script defer src="{{asset('js/type.js')}}"></script>
    <script defer src="{{asset('js/ham.js')}}"></script>
    <script defer src="{{asset('js/cusCur.js')}}"></script>
    <script defer src="{{asset('js/theme.js')}}"></script>

    <!-- prism -->
    <link rel="stylesheet" href="{{asset('prism/prism.css')}}">
    <script defer src="{{asset('prism/prism.js')}}"></script>
</head>

<!-- body -->
@section('body')
@show

    <div class="pigment" id="pigment"></div>


    <!-- nav for mobile -->

    <div class="navType_2 bgmix2 mobileNav">
    
        <!-- Text Logo. -->
        <p class="txtLogo clrWhite">TM</p>
    
        <!-- Search Form. -->
        <span></span>
    
        <!-- Links. -->
        <div class="mainLinks">
                <a class="hamburger disGrid clrWhite" onclick="ham()" href="#"><i class="fas fa-bars"></i></a>
        </div>
    
    </div>

    <div class="hamOverlay gridCol_3_size_1" id="ham">
        <li class="hamNavs"><i class="fa-solid fa-diagram-project"></i><a href="{{url('/show/all/projects/')}}">Projects</a></li>
        <li class="hamNavs"><i class="fa-solid fa-newspaper"></i><a href="{{url('/show/all/articles/')}}">Articles</a></li>
        <li class="hamNavs"><i class="fa-brands fa-hubspot"></i><a href="{{url('/show/all/frameworks/')}}">Frameworks</a></li>
        <li class="hamNavs"><i class="fa-solid fa-code"></i><a href="{{url('/show/all/extensions/')}}">Extensions</a></li>
        <li class="hamNavs"><i class="fa-solid fa-note-sticky"></i><a href="{{url('/open/contact/page/')}}">Contact</a></li>
        <li class="hamNavs"><i class="fa-solid fa-info"></i><a href="{{url('/open/about/page/')}}">About</a></li>
        <li class="hamNavs"><i class="fa-solid fa-house"></i><a href="{{url('/')}}">Home</a></li>
    </div>

    <!-- sidenav -->
    @section('sidenav')
    @show








    <!-- container -->
    @section('container')
    @show









    <div class="cusCur"></div>



    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>
</html>