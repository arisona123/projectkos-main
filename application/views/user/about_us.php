<!DOCTYPE html>
<html lang="en">

<head>
    <title>SevenKos | Solusi cari kost!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../asset/css/animate.css">

    <link rel="stylesheet" href="../asset/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../asset/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../asset/css/magnific-popup.css">


    <link rel="stylesheet" href="../asset/css/flaticon.css">
    <link rel="stylesheet" href="../asset/css/style.css">
</head>

<body>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('../asset/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate pb-0 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url() ?>Main_Front_User">Home <i class="fa fa-chevron-right"></i></a></span> <span>About Us<i class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-3 bread">About Us</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pb ftco-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-md-7 order-md-last d-flex align-items-stretch">
                    <div class="img w-100 img-2 mr-md-2" style="background-image: url(../asset/images/rumah1.jpg);"></div>
                    <div class="img w-100 img-2 ml-md-2" style="background-image: url(../asset/images/rumah2.jpg);"></div>
                </div>
                <div class="col-md-5 wrap-about py-md-5 ftco-animate">
                    <div class="heading-section pr-md-5">
                        <h2 class="mb-4">SevenKos</h2>

                        <p>Kami menyediakan website informasi kost untuk kamu yang sedang mencari kost sesuai dengan area yang dituju dengan menyertakan harga, fasilitas, nomor pemilik kost, dan juga informasi detail lainnya.</p>
                        <p>Tentunya website kami akan mempermudah kamu untuk mencari kost sesuai dengan area yang kamu tuju dan juga keinginan kamu. Kami juga menyediakan beberapa fitur yang akan mempermudah dalam proses pencarian, tentunya kamu dapat menggunakan fitur-fitur ini dengan mudah. Awal mula SevenKos dibuat dikarenakan keluhan yang dialami pelajar, mahasiswa, atau bahkan kami sendiri dalam mencari informasi kost pada daerah tujuan kami.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-counter img" id="section-counter">
        <div class="container">
            <div class="row pt-md-5">
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 py-5 mb-4">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number"><?= $jumlahkos ?></strong>
                            <span>Kos <br>Terdaftar</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 py-5 mb-4">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number"><?= $jumlahuser ?></strong>
                            <span>User <br>Terdaftar</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 py-5 mb-4">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number"><?= $jumlahsewa ?></strong>
                            <span>Sewa <br>Berlangsung</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 py-5 mb-4">
                        <div class="text d-flex align-items-center">
                            <strong class="number"><?= $jumlahrequest ?></strong>
                            <span>Request <br>Berlangsung</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- loader -->
    <!-- <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div> -->

    <script src="../asset/js/jquery.min.js"></script>
    <script src="../asset/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="../asset/js/popper.min.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
    <script src="../asset/js/jquery.easing.1.3.js"></script>
    <script src="../asset/js/jquery.waypoints.min.js"></script>
    <script src="../asset/js/jquery.stellar.min.js"></script>
    <script src="../asset/js/owl.carousel.min.js"></script>
    <script src="../asset/js/jquery.magnific-popup.min.js"></script>
    <script src="../asset/js/jquery.animateNumber.min.js"></script>
    <script src="../asset/js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="../asset/js/google-map.js"></script>
    <script src="../asset/js/main.js"></script>

</body>

</html>