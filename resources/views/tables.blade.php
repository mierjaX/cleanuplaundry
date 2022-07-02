<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clean Up Laundry - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="{{ asset("vendor/fontawesome-free/css/all.min.css") }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset("css/sb-admin-2.min.css") }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ asset("vendor/datatables/dataTables.bootstrap4.min.css") }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard/tables">
        
                <div class="sidebar-brand-text mx-3">Clean Up Laundry</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="http://cleanuplaundry.test/dashboard/tables">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Pesanan</span></a>
            </li>

            <!-- Nav Item - Tablestesti -->
            <li class="nav-item">
                <a class="nav-link" href="http://cleanuplaundry.test/dashboard/testi">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Testimoni</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Begin Page Content -->
                <div class="container-fluid mt-3">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel Data Pesanan</h1>
                    <p class="mb-4">Ini merupakan tabel data pesanan yang masuk dan tabel ini hanya bisa dilihat oleh admin saja.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Kontak</th>
                                            <th>Jenis Layanan</th>
                                            <th>Berat (Kg)</th>
                                            <th>Tanggal Pesan</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pesanan as $item)                          
                                        <tr>
                                            <form action="{{ url('/dashboard/tables', $item->id) }}" method="post">
                                            @csrf
                                            @method('put')    
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->kontak }}</td>
                                            <td>{{ $item->jenisLayanan }}</td>
                                            <td>
                                                @if($item->berat==null)
                                                <div class="form-group col-sm-12">
                                                    <input type="text" name="berat" class="form-control" id="exampleFormControlInput1" placeholder="Berat...(Kg)">
                                                </div>
                                                @else
                                                {{ $item->berat }}
                                                @endif
                                            </td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                @if($item->harga==null)
                                                <div class="input-group mb-3">
                                                    <input type="text" name="harga" class="form-control" placeholder="Harga...(Rp)">
                                                </div>
                                                @else
                                                {{ $item->harga }}
                                                @endif
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                <select class="form-control" name="status" id="exampleFormControlSelect1">
                                                  @if ($item->status == null)
                                                  <option>Dipesan</option>
                                                  @else
                                                  <option value="" disabled selected>{{$item->status}}</option>
                                                  @endif
                                                  <option>Diambil</option>
                                                  <option>Diproses</option>
                                                  <option>Dikirim</option>
                                                  <option>Selesai</option>
                                                </select>
                                              </div>
                                            </td>
                                            <td>
                                                <form action="/dashboard/tables/{{ $item->id }}" method="post">
                                                    @method('put')
                                                    @csrf
                                                    <button class="btn btn-info" onclick="return confirm('Pesanan ini akan diupdate, apakah anda yakin ?')">Save</button>
                                                </form>
                                                <form action="/dashboard/tables/{{ $item->id }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger" onclick="return confirm('Pesanan ini akan dihapus, apakah anda yakin ?')">Delete</button>
                                                </form>
                                            </td>
                                        </form>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset("vendor/jquery/jquery.min.js") }}"></script>
    <script src="{{ asset("vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset("vendor/jquery-easing/jquery.easing.min.js") }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset("js/sb-admin-2.min.js") }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset("vendor/datatables/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset("vendor/datatables/dataTables.bootstrap4.min.js") }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset("js/demo/datatables-demo.js") }}"></script>

</body>

</html>
