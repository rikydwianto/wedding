<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FAME - Find Artists, Makeup Excellence</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/css/style.css?v=<?= time() ?>">
</head>

<body>
    <header class="py-2 border-bottom" style="background-color: #CFA597;position: sticky;">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <!-- Teks dengan font baru -->
            <div class="text-left">
                <a href="#"
                    class="d-flex flex-column align-items-start ps-5 pt-2 mb-lg-0 link-body-emphasis text-decoration-none text-white text-light"
                    style="font-family: 'Italianno', cursive; font-weight: 400; font-style: normal;">
                    <h1 style="font-size: 3rem; margin: 0;">FAME</h1> <!-- Set margin to 0 -->
                    <h4 style="margin: 0;">Find Artists, Makeup Excellence</h4> <!-- Set margin to 0 -->
                </a>
            </div>

            <!-- Logo di sebelah kanan -->
            <div class="d-flex align-items-center p-2">
                <!-- <a href="#" class="d-block link-body-emphasis text-decoration-none pr-3">
                    <img src="assets/img/list.png" alt="List" width="36" height="36" class="rounded-circle">
                </a> -->
                <a href="#" class="d-block link-body-emphasis text-decoration-none pr-3">
                    <img src="assets/img/search.png" alt="Search" width="36" height="36" class="rounded-circle">
                </a>
                <a href="#" class="d-block link-body-emphasis text-decoration-none pr-3">
                    <img src="assets/img/cart.png" alt="Cart" width="36" height="36" class="rounded-circle"
                        data-bs-toggle="offcanvas" data-bs-target="#shoppingCart" aria-controls="shoppingCart">
                </a>
                <a href="#" class="d-block link-body-emphasis text-decoration-none pr-3">
                    <img src="assets/img/user-circle-light.png" alt="User" width="36" height="36"
                        class="rounded-circle">
                </a>
            </div>
        </div>

    </header>



    <section id='home' class="carousel">
        <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                    aria-label="Slide 1" aria-current="true"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <img src="assets/img/slide/1.png" class="d-block w-100 img-fluid" alt="Slide 1">
                    <div class="container">
                        <div class="carousel-caption text-center">
                            <h1>Cinta Sejati Dimulai di Sini</h1>
                            <p class="opacity-75">Momen-momen indah yang akan dikenang selamanya, kami hadir untuk
                                merangkai
                                hari bahagia Anda dengan sempurna.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Lihat Paket Pernikahan</a></p>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <img src="assets/img/slide/2.png" class="d-block w-100 img-fluid" alt="Slide 2">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Pernikahan yang Tak Terlupakan</h1>
                            <p>Setiap detail pernikahan Anda dirancang dengan keindahan dan ketulusan, untuk
                                menghadirkan
                                kenangan yang takkan terlupakan.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Pelajari Lebih Lanjut</a></p>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">
                    <img src="assets/img/slide/3.png" class="d-block w-100 img-fluid" alt="Slide 3">
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1>Momen Bahagia, Bersama Selamanya</h1>
                            <p>Rangkaian momen spesial yang akan selalu diingat, kami hadir untuk mewujudkan hari impian
                                Anda.</p>
                            <p><a class="btn btn-lg btn-primary" href="#">Jelajahi Galeri Kami</a></p>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <section id='mua' class="header-profile">
        <div style="background-color: #FFF3EF;">
            <div class="px-4 py-5 text-center">
                <div class="container">
                    <div class="row align-items-start justify-content-center">
                        <!-- Gambar Bulat di Kiri -->
                        <div class="col-md-3 text-center text-md-start mb-4 mb-md-0">
                            <img class="rounded-circle" src="assets/img/profilebulat.png" alt="Profile Picture"
                                width="200" height="200">
                        </div>

                        <!-- Teks di Kanan -->
                        <div class="col-md-6 ps-4">
                            <div class="text-start">
                                <h4 class="fw-bold mb-4" style="color: #AB7665; font-size: 24px;">Apa itu Makeup Artist
                                    (MUA)?</h4>
                                <p class="lead mb-4 mt-2" style="text-align: justify; color: #AB7665; font-size: 16px;">
                                    Makeup Artist (MUA) adalah seorang profesional yang ahli dalam mengaplikasikan
                                    kosmetik
                                    dan produk kecantikan untuk meningkatkan penampilan seseorang. Mereka sering bekerja
                                    di
                                    berbagai acara seperti pernikahan, pemotretan, acara televisi, dan film, serta dapat
                                    menciptakan berbagai gaya mulai dari tampilan natural hingga glamor.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="rekomendasi" class="team section">
        <!-- Section Title -->
        <div class="container section-title">
            <h2 class="text-center text-header mt-3">Rekomendasi</h2>
            <hr style="border: none; height: 5px; background-color: #AB7665; margin: 20px auto; width: 8%;">
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row" style="display: flex; flex-wrap: wrap; gap: 0px;">
                <!-- Using Flexbox with gap -->
                <div class="col-lg-2 col-md-4 col-sm-6 d-flex">
                    <div class="team-member text-center w-100">
                        <img src="assets/img/kategori/akad.png" class="img-fluid" alt="Makeup Akad">
                        <div class="member-info">
                            <a href="#" class="link">Makeup Akad</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6 d-flex">
                    <div class="team-member text-center w-100">
                        <img src="assets/img/kategori/party.png" class="img-fluid" alt="Makeup Party">
                        <div class="member-info">
                            <a href="#" class="link">Makeup Party</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6 d-flex">
                    <div class="team-member text-center w-100">
                        <img src="assets/img/kategori/resepsi.png" class="img-fluid" alt="Makeup Resepsi">
                        <div class="member-info">
                            <a href="#" class="link">Makeup Resepsi</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6 d-flex">
                    <div class="team-member text-center w-100">
                        <img src="assets/img/kategori/tunangan.png" class="img-fluid" alt="Makeup Tunangan">
                        <div class="member-info">
                            <a href="#" class="link">Makeup Tunangan</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6 d-flex">
                    <div class="team-member text-center w-100">
                        <img src="assets/img/kategori/wedding.png" class="img-fluid" alt="Makeup Wedding">
                        <div class="member-info">
                            <a href="#" class="link">Makeup Wedding</a>
                        </div>
                    </div>
                </div>

                <!-- Additional Item for Testing -->
                <div class="col-lg-2 col-md-4 col-sm-6 d-flex">
                    <div class="team-member text-center w-100">
                        <img src="assets/img/kategori/wisuda.png" class="img-fluid" alt="Makeup wisuda">
                        <div class="member-info">
                            <a href="#" class="link">Makeup wisuda</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id='deal' class="cta-section mt-3 mb-3 p-3" style="background-color: #FFEDF5;">
        <div class="container mt-3 mb-3">
            <div class="row align-items-center">
                <!-- Text on the Left -->
                <div class="col-md-6 text-end">
                    <!-- Align text to the end (right) -->
                    <h2 class="cta-title"
                        style="color: #C94F84; font-weight: 400; font-family: 'Italianno', cursive; font-size: 6rem;">
                        Week Deal!
                    </h2>
                    <a href="#" style="color: #C94F84;" class="link fs-5 ">Booking Now <i
                            class="fa fa-2xl fa-calendar-o "></i></a>
                </div>

                <!-- Circular Photo on the Right -->
                <div class="col-md-6 text-center">
                    <img src="assets/img/cta.png" alt="Makeup" class="rounded-circle" width="300" height="200">
                </div>
            </div>
        </div>
    </section>

    <section id="kategori" class="team section mb-5">
        <!-- Section Title -->
        <div class="container section-title">
            <h2 class="text-center text-header mt-3">Makeup by Categories</h2>
            <hr style="border: none; height: 5px; background-color: #AB7665; margin: 20px auto; width: 8%;">
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row" style="display: flex; flex-wrap: wrap; gap: 50px;">
                <!-- Using Flexbox with gap -->
                <div class="col-lg-2 col-md-4 col-sm-6 d-flex">
                    <div class="team-member text-center w-100">
                        <img src="assets/img/kategori/akad.png" class="img-fluid" alt="Makeup Akad">
                        <div class="member-info">
                            <a href="#" class="link">Makeup Akad</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6 d-flex">
                    <div class="team-member text-center w-100">
                        <img src="assets/img/kategori/party.png" class="img-fluid" alt="Makeup Party">
                        <div class="member-info">
                            <a href="#" class="link">Makeup Party</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6 d-flex">
                    <div class="team-member text-center w-100">
                        <img src="assets/img/kategori/resepsi.png" class="img-fluid" alt="Makeup Resepsi">
                        <div class="member-info">
                            <a href="#" class="link">Makeup Resepsi</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6 d-flex">
                    <div class="team-member text-center w-100">
                        <img src="assets/img/kategori/tunangan.png" class="img-fluid" alt="Makeup Tunangan">
                        <div class="member-info">
                            <a href="#" class="link">Makeup Tunangan</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6 d-flex">
                    <div class="team-member text-center w-100">
                        <img src="assets/img/kategori/wedding.png" class="img-fluid" alt="Makeup Wedding">
                        <div class="member-info">
                            <a href="#" class="link">Makeup Wedding</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 d-flex">
                    <div class="team-member text-center w-100">
                        <img src="assets/img/kategori/akad.png" class="img-fluid" alt="Makeup Akad">
                        <div class="member-info">
                            <a href="#" class="link">Makeup Akad</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6 d-flex">
                    <div class="team-member text-center w-100">
                        <img src="assets/img/kategori/party.png" class="img-fluid" alt="Makeup Party">
                        <div class="member-info">
                            <a href="#" class="link">Makeup Party</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6 d-flex">
                    <div class="team-member text-center w-100">
                        <img src="assets/img/kategori/resepsi.png" class="img-fluid" alt="Makeup Resepsi">
                        <div class="member-info">
                            <a href="#" class="link">Makeup Resepsi</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6 d-flex">
                    <div class="team-member text-center w-100">
                        <img src="assets/img/kategori/tunangan.png" class="img-fluid" alt="Makeup Tunangan">
                        <div class="member-info">
                            <a href="#" class="link">Makeup Tunangan</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-6 d-flex">
                    <div class="team-member text-center w-100">
                        <img src="assets/img/kategori/wedding.png" class="img-fluid" alt="Makeup Wedding">
                        <div class="member-info">
                            <a href="#" class="link">Makeup Wedding</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <div class="floating-nav">
        <a href="#" class="nav-item" data-tooltip="Home">
            <i class="fa fa-home"></i>
        </a>
        <a href="#mua" class="nav-item" data-tooltip="Apa itu MUA?">
            <i class="fa fa-info-circle"></i>
        </a>
        <a href="#rekomendasi" class="nav-item" data-tooltip="Rekomendasi">
            <i class="fa fa-heart"></i>
        </a>
        <a href="#deal" class="nav-item" data-tooltip="Promo">
            <i class="fa fa-money"></i>
        </a>
        <a href="#footer" class="nav-item" data-tooltip="Contact">
            <i class="fa fa-envelope"></i>
        </a>
    </div>
    <div id='footer' class="container-fluid mt-6" style="background-color: #CFA597; margin-top: 200px;">
        <footer class="py-3 ">
            <h2 class="text-center"
                style="color: #fff; font-weight: 400; font-family: 'Italianno', cursive; font-size: 6rem;">FAME</h2>
            <h3 style="color: #fff; font-weight: 100; font-family: 'Italianno', cursive; font-size: 2rem;"
                class="text-center">
                Find Artists, Makeup Excellence</h3>
            <hr style="border: none; height: 5px; background-color: #fff; margin: 20px auto; width: 80%;">
            <!-- <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class=""><a href="#" class="nav-link text-white text-light link px-2 text-body-secondary">Home</a>
                </li>
                <li class=""><a href="#"
                        class="nav-link text-white text-light link px-2 text-body-secondary">Features</a></li>
                <li class=""><a href="#"
                        class="nav-link text-white text-light link px-2 text-body-secondary">Pricing</a></li>
                <li class=""><a href="#" class="nav-link text-white text-light link px-2 text-body-secondary">FAQs</a>
                </li>
                <li class=""><a href="#" class="nav-link text-white text-light link px-2 text-body-secondary">About</a>
                </li>
            </ul> -->
            <p class="text-center text-body-secondary">© <?= date("Y") ?> @Fame</p>
        </footer>
    </div>



    <!-- Offcanvas Shopping Cart -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="shoppingCart" aria-labelledby="shoppingCartLabel">
        <div class="offcanvas-header">
            <i class="fa fa-shopping-cart fa-lg"></i> &nbsp;
            <h5 class="offcanvas-title" id="shoppingCartLabel">Daftar Keranjang</h5>
            <hr>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <!-- Shopping Cart Items -->
            <div class="cart-item d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h6>Product 1</h6>
                    <p>$25.00</p>
                </div>
                <input type="number" class="form-control w-25" value="1" min="1">
            </div>

            <div class="cart-item d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h6>Product 2</h6>
                    <p>$50.00</p>
                </div>
                <input type="number" class="form-control w-25" value="2" min="1">
            </div>

            <div class="cart-item d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h6>Product 3</h6>
                    <p>$10.00</p>
                </div>
                <input type="number" class="form-control w-25" value="3" min="1">
            </div>

            <hr>

            <!-- Total Price -->
            <div class="d-flex justify-content-between">
                <h6>Total:</h6>
                <h6>$85.00</h6>
            </div>

            <!-- Checkout Button -->
            <div class="d-grid gap-2 mt-3">
                <button class="btn btn-success" type="button">Proceed to Checkout</button>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="assets/js/app.js"></script>
</body>


</html>