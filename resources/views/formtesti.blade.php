<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Testimoni</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset("css/styles.css") }}" rel="stylesheet" />
        <!-- Custom fonts for this template-->
        <link href="{{ asset("vendor/fontawesome-free/css/all.min.css") }}" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="/">Clean Up Laundry</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#layanan">Layanan</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">About</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#pesan">Pesan</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="testimoni">Testimoni</a></li>
                        @auth
                        <li class="nav-item dropdown mx-0 mx-lg-1">
                            <a class="nav-link dropdown-toggle py-3 px-0 px-lg-3 rounded" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Selamat datang, {{ auth()->user()->name }}!
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form> 
                                </li>
                            </ul>
                        </li>
                        @else
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="login">Login</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

       <!-- Contact Section Form-->
       <div class="row justify-content-center mt-5">
        <div class="col-lg-8 col-xl-7 mt-5">
            <form id="contactForm" method="POST" action="/formtesti" data-sb-form-api-token="API_TOKEN" enctype="multipart/form-data">
                @csrf
                @if(session()->has('success'))
                    <div class="alert alert-success mt-5" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- Nama input-->
                <div class="form-floating mb-3">
                    <input class="form-control" id="name" name='nama' type="text" placeholder="Masukkan nama..." data-sb-validations="required" />
                    <label for="name">Nama</label>
                    <div class="invalid-feedback" data-sb-feedback="name:required">Nama wajib diisi.</div>
                </div>
                <!-- Keterangan input-->
                <div class="form-floating mb-3">
                    <input class="form-control" id="keterangan" name='keterangan' type="text" placeholder="Isi pesan & kesan anda disini..." data-sb-validations="required" />
                    <label for="keterangan">Keterangan</label>
                    <div class="invalid-feedback" data-sb-feedback="keterangan:required">Keterangan wajib diisi..</div>
                </div>
                <!-- Img input-->
                <div class="mb-3">
                    <label for="image" class="form-label">Masukkan foto testimoni dibawah sini</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <!-- Submit Button-->
                <button class="btn btn-primary btn-xl mb-5" type="submit">Kirim</button>
            </form>
        </div>
    </div>
        
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Alamat Laundry</h4>
                        <p class="lead mb-0">
                            CLEAN UP LAUNDRY
                            <br />
                            Jl. Gubeng Kertajaya VII C No.43, Airlangga, Kec. Gubeng, Kota SBY, Jawa Timur 60286
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Social Media</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://www.facebook.com/cleanuplaundrysurabaya/"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://www.instagram.com/clean_up_laundry/?hl=id"><i class="fab fa-fw fa-instagram"></i></a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">Admin Section</h4>
                        <p class="lead mb-0">
                            <a href="/dashboard/tables">Dashboard</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; Clean Up Laundry 2022</small></div>
        </div>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Core theme JS-->
        <script src="{{ asset("js/scripts.js") }}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    
        
    </body>
</html>
