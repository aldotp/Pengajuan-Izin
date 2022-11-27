<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MPP Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{  asset('assets-admin/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">MPP</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <!-- <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li> -->
                    <li><a class="dropdown-item" href="/sesi/logout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Home</div>
                        <a class="nav-link" href="/admin">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Input Data</div>
                        <a class="nav-link" href="/wilayah">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Wilayah
                        </a>
                        <a class="nav-link collapsed" href="/opd">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            OPD
                        </a>
                        <a class="nav-link collapsed" href="/layanan">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Layanan
                        </a>
                        <!-- <a class="nav-link collapsed" href="/pengajuan">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pengajuan
                        </a> -->
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Halaman Admin</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Riwayat</li>
                    </ol>
                    <div class="container mt-3">
                        <h2 class="mb-4 text-center">Riwayat Permintaan Layanan</h2>
                        <table class="table" style="text-align:center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pengaju</th>
                                    <th>Perihal</th>
                                    <th>Deskripsi</th>
                                    <th>Nama Layanan</th>
                                    <th>Syarat Layanan</th>
                                    <th>Status</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->perihal}}</td>
                                    <td>{{$item->deskripsi}}</td>
                                    <td>{{$item->nama_layanan}}</td>
                                    <td>{{$item->nama}}</td>
                                    @if ($item->status == 0)
                                    <td class="text-primary"><b>Pending</b></td>
                                    @elseif($item->status == 1)
                                    <td style="color: green;"><b>Approve</b></td>
                                    @else
                                    <td class="text-danger"><b>Gagal</b></td>
                                    @endif

                                    <td>
                                        @if ($item->upload)
                                        <a href="{{ url('files').'/'.$item->upload}}">Bukti</a>
                                        @endif
                                    </td>
                                    <td>


                                        <form method="post" action="{{ URL('/admin/'.$item->id)}}">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-secondary btn-sm bg-primary">Approve</button>
                                        </form>



                                        <form action="{{ '/admin/'.$item->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </thead>
                        </table>
                        {{-- {{ $data->links() }} --}}
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; MPP 2022</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{  asset('assets-admin/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{  asset('assets-admin/assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{  asset('assets-admin/assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{  asset('assets-admin/js/datatables-simple-demo.js') }}"></script>
</body>

</html>