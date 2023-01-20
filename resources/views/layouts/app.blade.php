<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gym Booking Uitm Puncak Perdana</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    @yield('head')
</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none"
                        href="mailto:info@company.com">info@uitm.com.my</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">+60 16-558 5600</a>
                </div>
                <div>
                    @auth
                        <div class="text-end">
                            <a class="text-light mr-3" style="font-size: 13px;  text-decoration: none;">Logged in as {{ Auth::user()->username }}
                            </a>
                            <a href="{{ route('logout.perform') }}" class="btn btn-outline-light ml-5 me-2">Logout</a>
                        </div>
                    @endauth
                    @guest
                        <div class="text-end">
                            <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
                            <a href="{{ route('register.perform') }}" class="btn"
                                style="background-color: #fab011;">Register</a>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    {{-- Header --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow sticky-top">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="/" class="navbar-brand d-flex align-items-center px-5 px-lg-5">
                <img style="width: 150px; height: auto;" src="assets/img/uitm_logo.png" alt="Image">
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
                id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#main">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#feedback">Feedback</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    {{-- Modal --}}
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q"
                        placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-light text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <body>
        @yield('content')
    </body>

    {{-- Footer --}}
    <footer class="bg-dark" id="tempaltemo_footer">
        <div id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 pt-5">
                        <h2 class="h2 text-light border-bottom pb-3 border-light logo">Gym Booking Uitm Puncak Perdana
                        </h2>
                        <ul class="list-unstyled text-light footer-link-list">
                            <li>
                                <i class="fas fa-map-marker-alt fa-fw"></i>
                                Uitm Puncak Perdana, Jalan Pulau Indah Au10/A, Puncak Perdana, 40150 Shah Alam, Selangor
                            </li>
                            <li>
                                <i class="fa fa-phone fa-fw"></i>
                                <a class="text-decoration-none" href="tel:010-020-0340">011-11279910</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope fa-fw"></i>
                                <a class="text-decoration-none" href="mailto:info@company.com">info@uitm.com.my</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 pt-5">
                        <h2 class="h2 text-light border-bottom pb-3 border-light">Operation Hours</h2>
                        <ul class="list-unstyled text-light footer-link-list">
                            <li><a class="text-decoration-none">Monday – Friday</a></li>
                            <li><a class="text-decoration-none">4pm - 10pm</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="w-100 bg-black py-3 text-end">
                <div class="container">
                    <div class="row pt-2">
                        <div class="col-12">
                            <p class="text-left text-light">
                                Copyright &copy; 2023</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    {{-- Scripts --}}
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    @yield('scripts')
</body>

</html>
