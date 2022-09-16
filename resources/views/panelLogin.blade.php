<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your description.">
    <meta name="keywords" content="tag, tag, tag">
    <meta name="author" content="Thasin Mahmud">
    <!-- Title -->
    <title>Thasin Mahmud - Admin Login</title>
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
    <link rel="stylesheet" href="{{asset('css/animation.css')}}">
    
    
    
    <!-- Script -->
    <script defer src="{{asset('js/copyPaste.js')}}"></script>
</head>

<body class="lato scrlNone ofHiddenY">

    <div action="">

            <div class="frmElm_6 bgThasin clrWhite">
                <label  class="p_0_h fSize_20px" for=""> Password </label>
                <input  class="p_0_h fSize_20px" type="password" id="input1" required>
            </div>

            <div class="disGrid gridCol_2_size_1 gridGap_q w_100vw">
                <form action="{{url('/login')}}" class="disGrid alignItemsCenter" method="post">
                @csrf
                    <input  class="disNone" type="password" id="input2" name="password" value="" required>
                    <input  value="admin" type="hidden" name="panel">
                    <button type="submit" class="link p_0_h h_100vh bgThasin admin">
                        <i class="fa-solid fa-gear fSize_20 txtCenter animSpinZ clrWhite"></i>
                    </button>
                </form>
                <form action="{{url('/login')}}" class="disGrid alignItemsCenter" method="post">
                @csrf
                    <input  class="disNone" type="password" id="input3" name="password" value="" required>
                    <input  value="articleEditor" type="hidden" name="panel">
                    <button type="submit" class="link p_0_h h_100vh bgThasin articleEditor">
                        <i class="fa-solid fa-pen fSize_20 txtCenter animSpinZ clrWhite"></i>
                    </button>
                </form>
            </div> 
    </div>

</body>
</html>