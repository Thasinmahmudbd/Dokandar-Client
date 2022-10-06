<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dokandar-Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="{{url('/dashboard/super/admin')}}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DOKANDAR</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{asset('Admin/'.session('Admin_Image'))}}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{session('Admin_Name')}}</h6>
                        <span>{{session('Admin_Type')}} admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">

                    <a href="{{url('/dashboard/super/admin')}}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-bell me-2"></i>Notification</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{url('super/user/notification')}}" class="dropdown-item">To Users</a>
                            <a href="{{url('super/vendor/notification')}}" class="dropdown-item">To Vendors</a>
                        </div>
                    </div>

                    <a href="{{url('/cities')}}" class="nav-item nav-link"><i class="fas fa-map-marker-alt me-2"></i>Cities</a>

                    <a href="{{url('/city/admin')}}" class="nav-item nav-link"><i class="fas fa-user-shield me-2"></i>City Admin</a>

                    <a href="{{url('/banners')}}" class="nav-item nav-link"><i class="fas fa-sticky-note me-2"></i>Banner</a>

                    <a href="{{url('/app/user')}}" class="nav-item nav-link"><i class="fas fa-user me-2"></i>App Users</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-box me-2"></i>Order</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{url('/order/complaints')}}" class="dropdown-item">Complaints</a>
                            <a href="{{url('/order/cancelled')}}" class="dropdown-item">Cancelled</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-coins me-2"></i>Commissions</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{url('')}}" class="dropdown-item">Rewards</a>
                            <a href="{{url('')}}" class="dropdown-item">Redeem Points</a>
                            <a href="{{url('')}}" class="dropdown-item">App Refers</a>
                            <a href="{{url('')}}" class="dropdown-item">Commissions</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-asterisk me-2"></i>Policy</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{url('/terms')}}" class="dropdown-item">Terms & Conditions</a>
                            <a href="{{url('/about')}}" class="dropdown-item">About Us</a>
                        </div>
                    </div>

                    <a href="{{url('/feedback')}}" class="nav-item nav-link"><i class="fas fa-comments me-2"></i>Feedbacks</a>

                    <a href="{{url('/setting')}}" class="nav-item nav-link"><i class="fas fa-cogs me-2"></i>Settings</a>

                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                
                <div class="navbar-nav align-items-center ms-auto">

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="{{asset('Admin/'.session('Admin_Image'))}}" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">{{session('Admin_Name')}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="{{url('/setting')}}" class="dropdown-item">Settings</a>
                            <a href="{{url('/logout')}}" class="dropdown-item">Log Out</a>
                        </div>
                    </div>

                </div>
            </nav>
            <!-- Navbar End -->





            <!--Session message-->

            @if(session('msgHook')=='green' && session()->has('msg'))
            <div class="alert alert-success alert-dismissible fade show m-4" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i> {{session('msg')}} 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            @elseif(session('msgHook')=='red' && session()->has('msg'))
            <div class="alert alert-danger alert-dismissible fade show m-4" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i> {{session('msg')}} 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            @elseif(session('msgHook')=='yellow' && session()->has('msg'))
            <div class="alert alert-warning alert-dismissible fade show m-4" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i> {{session('msg')}} 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            @endif




<!-- container -->
@section('container')
@show




            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Dokandar</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Developed By <a target="_blank" href="https://thasinmahmud.com">Thasin Mahmud</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib/chart/chart.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>