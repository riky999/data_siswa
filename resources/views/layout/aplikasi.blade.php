<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DATA SISWA - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset("template/vendor/fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset("template/css/sb-admin-2.min.css")}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">DATA SISWA</div>
            </a>




            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>


            </li>
             <!-- Nav Item - Tables -->


            <li class="nav-item">
                <a class="nav-link" href="/siswa">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Dashboard</span></a>
            <li class="nav-item">
    <a class="nav-link" href="{{ route('pengumuman.index') }}">
        <i class="fas fa-fw fa-calendar-alt"></i>
        <span>Pengumuman</span>
    </a>
</li>




            <!-- Nav Item - Charts -->
            @if(auth()->user()->role === 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="/siswa/create">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Tambah data</span></a>
                </li>
            @endif

            





            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="d-flex justify-content-center d-none d-md-flex">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>




        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form method="GET" action="/siswa"
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" name="cari"
                                value="{{ request('cari') }}" placeholder="Cari nama siswa..." aria-label="Search"
                                aria-describedby="basic-addon2">
                            <select name="kelas" class="form-select form-select-sm me-2" style="
    width: 70px;
    background: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 10px;
    padding: 5px 8px;
    font-size: 11px;
    color: #495057;
    transition: all 0.3s ease;
" onmouseover="this.style.borderColor='#007bff'; this.style.boxShadow='0 0 5px rgba(0,123,255,0.3)'"
                                onmouseout="this.style.borderColor='#dee2e6'; this.style.boxShadow='none'">
                                <option value="">All</option>
                                <option value="RPL" {{ request('kelas') == 'RPL' ? 'selected' : '' }}>RPL</option>
                                <option value="TKJ" {{ request('kelas') == 'TKJ' ? 'selected' : '' }}>TKJ</option>
                                <option value="DKV" {{ request('kelas') == 'DKV' ? 'selected' : '' }}>DKV</option>
                                <option value="TKR" {{ request('kelas') == 'TKR' ? 'selected' : '' }}>TKR</option>
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>




                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">0</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <!--------- ini bisa di isi --------------------------------------------------------------------->
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope fa-fw"></i>
        @if(session('new_user_info'))
            <span class="badge badge-danger badge-counter">1</span>
        @endif
    </a>




<!-- Dropdown - Messages -->
<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
    aria-labelledby="messagesDropdown">
    <h6 class="dropdown-header">
        Message Center
    </h6>

    @php
        $userInfo = session('new_user_info');
    @endphp

    @if ($userInfo)
        <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="dropdown-list-image mr-3">
                <img class="rounded-circle" src="{{ asset('img/undraw_profile.svg') }}" alt="">
            </div>
            <div class="font-weight-bold">
                <div class="text-truncate">{{ $userInfo['message'] }}</div>
                <div class="small text-gray-500">Email: <span class="text-primary">{{ $userInfo['email'] }}</span> | 
                    Password: <span class="text-danger">{{ $userInfo['password'] }}</span></div>
            </div>
        </a>
    @else

    @endif
<!-- <div class="dropdown-item text-center small text-gray-500">Tidak ada pesan baru</div> -->

                                
                                <a class="dropdown-item text-center small text-gray-500" href="#">Tidak ada pesan baru</a>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @auth
                                    <span
                                        class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                @else
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Guest</span>
                                @endauth
                                <img class="img-profile rounded-circle" src="{{ asset('fotot/gabut1.jpeg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>




                            </div>



                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->



                {{-- Hanya tampilkan navbar jika BUKAN di halaman root (/), login (/sesi), atau register
                (/sesi/register) --}}
                @if (!Request::is('/') && !Request::is('sesi') && !Request::is('sesi/register'))




                @endif

                <div class="container pt-1 pb-2">

                    @if (Auth::check())
                        @include('komponen/menu')
                    @endif

                    @include('komponen/pesan')
                    @yield('konten')

                </div>

                <!-- Content Row -->
                <div class="row">

                </div>

                <!-- Content Row -->

                <div class="row">


                    <!-- Card Body -->

                    
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>


            
            


            <footer class="bg-white text-white py-3 mt-auto shadow-sm">
                <div class="container d-flex justify-content-between align-items-center flex-wrap">
                    <div class="mb-2 mb-md-0">
                        <strong>© {{ date('Y') }} Data Siswa Dashboard</strong>
                    </div>
                    <div>
                        <small>Coppy reight MUHAMAD RIKY | 20 juli 2025 </small>
                    </div>
                </div>
            </footer>




            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="sesi/logout">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="{{ asset("template/vendor/jquery/jquery.min.js")}}"></script>
            <script src="{{ asset("template/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

            <!-- Core plugin JavaScript-->
            <script src="{{ asset("template/vendor/jquery-easing/jquery.easing.min.js")}}"></script>

            <!-- Custom scripts for all pages-->
            <script src="{{ asset("template/js/sb-admin-2.min.js")}}"></script>

            <!-- Page level plugins -->
            <script src="{{ asset("template/vendor/chart.js/Chart.min.js")}}"></script>

            <!-- Page level custom scripts -->
            <script src="{{ asset(path: "template/demo/chart-area-demo.js")}}"></script>
            <script src="{{ asset("template/js/demo/chart-pie-demo.js")}}"></script>

</body>

</html>