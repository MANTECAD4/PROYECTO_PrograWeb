<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>VendiMarket</title>
        <!-- Favicons -->
        <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
        <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
        <!--No quitar-->
        @livewireScripts
    </head>

    <body>
        <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top d-flex align-items-center">

            <div class="d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{asset('assets/img/logo.png')}}" alt="">
                <span class="d-none d-lg-block">VendiMarket</span>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div><!-- End Logo -->


            <nav class="header-nav ms-auto">
                <ul class="d-flex align-items-center">
                <a class="nav-link nav-icon" href="https://facebook.com/" target="_blank">
                    <i class="bi bi-facebook"></i>
                </a><!-- End Notification Icon -->
                <a class="nav-link nav-icon" href="https://twitter.com/" target="_blank">
                    <i class="bi bi-twitter"></i>
                </a><!-- End Notification Icon -->
                <a class="nav-link nav-icon" href="https://www.instagram.com/" target="_blank">
                    <i class="bi bi-instagram"></i>
                </a><!-- End Notification Icon -->
                <a class="nav-link nav-icon" href="https://github.com/MANTECAD4" target="_blank">
                    <i class="bi bi-github"></i>
                </a><!-- End Notification Icon -->
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{asset('assets/img/gato.jpg')}}" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ auth()->user()->name }}</h6>
                        <span>Web Designer</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/perfil">
                        <i class="bi bi-gear"></i>
                        <span>Ajustes de cuenta</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                        <i class="bi bi-question-circle"></i>
                        <span>Ayuda</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>
                                    Cerrar sesión
                                </span>
                            </a>
                        </form>
                    </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

                </ul>
            </nav><!-- End Icons Navigation -->

        </header><!-- End Header -->

        <!-- ======= Sidebar ======= -->
        <aside id="sidebar" class="sidebar">
            <ul class="sidebar-nav" id="sidebar-nav">

                <li class="nav-item">
                    <a class="nav-link collapsed" href="/inicio">
                        <i class="bi bi-house"></i>
                        <span>Inicio</span>
                    </a>
                </li><!-- End Profile Page Nav -->

                <li class="nav-heading">Gestión</li>
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#productos-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-bag"></i><span>Productos</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="productos-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                        <a href="{{route('producto.index')}}">
                            <i class="bi bi-circle"></i><span>Ver productos</span>
                        </a>
                        </li>
                        <li>
                        <a href="{{route('producto.create')}}">
                            <i class="bi bi-circle"></i><span>Dar de alta productos</span>
                        </a>
                        </li>
                    </ul>
                </li><!-- End Productos Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#categorias-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-tag"></i><span>Categorías</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="categorias-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                        <a href="{{route('categoria.index')}}">
                            <i class="bi bi-circle"></i><span>Ver categorías</span>
                        </a>
                        </li>
                        <li>
                        <a href="{{route('categoria.create')}}">
                            <i class="bi bi-circle"></i><span>Dar de alta categorías</span>
                        </a>
                        </li>
                    </ul>
                </li><!-- End categorias Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#logs-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-card-list"></i><span>Logs</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="logs-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                        <a href="/logproducto">
                            <i class="bi bi-circle"></i><span>Historial gestión de productos</span>
                        </a>
                        </li>
                    </ul>
                </li><!-- End logs Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#ventas-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-cart"></i><span>Ventas</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="ventas-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                        <a href="/shop">
                            <i class="bi bi-circle"></i><span>Ver productos</span>
                        </a>
                        </li>
                        <li>
                        <a href="/cart">
                            <i class="bi bi-circle"></i><span>Ver carrito</span>
                        </a>
                        <a href="/ventas">
                            <i class="bi bi-circle"></i><span>Ver historial de ventas</span>
                        </a>
                        </li>
                    </ul>
                </li><!-- End categorias Nav -->

                <li class="nav-heading">Páginas</li>

                <li class="nav-item">
                <a class="nav-link collapsed" href="/perfil">
                    <i class="bi bi-gear"></i>
                    <span>Ajustes de cuenta</span>
                </a>
            </ul>
        </aside><!-- End Sidebar-->
        <main id="main" class="main">
            <!--Esto representa el contenido de la pagina que cambia, lo que no es la barra de navegacion-->
            {{$slot}}
        </main>
        <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
        <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
        <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>

        <!-- Template Main JS File -->
        <script src="{{ asset('assets/js/main.js') }}"></script>

    </body>
</html>