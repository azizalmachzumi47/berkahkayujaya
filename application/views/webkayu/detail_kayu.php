<!DOCTYPE html>
<html>

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title><?= $title; ?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assetskayu/'); ?>css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assetskayu/'); ?>css/stylekayu.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="<?= base_url('assetskayu/'); ?>css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="<?= base_url('assets/'); ?>logo/logoberkahkayu.png" type="image/gif" />
    <!-- font css -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
</head>

<body>
    <div class="header_section">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="<?= base_url('webkayu'); ?>">
                    <img src="<?= base_url('assetskayu/'); ?>images/logoberkahkayu.png" width="80" height="auto"
                        alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= base_url('webkayu'); ?>">Home</a>
                        </li>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- banner section start -->
        <div class="banner_section layout_padding">
            <div class="container">
                <div id="banner_slider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="banner_img"><img
                                            src="<?= base_url('assetskayu/'); ?>images/tukangkayu.png"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="banner_taital_main">
                                        <h1 class="banner_taital">BKJ</h1>
                                        <h5 class="tasty_text">Terima Jasa Bongkar Kayu</h5>
                                        <div class="btn_main">
                                            <div class="callnow_bt active">
                                                <a href="https://wa.me/6281xxxxxx" target="_blank">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png"
                                                        alt="WhatsApp Icon"
                                                        style="width: 24px; height: 24px; margin-right: 8px;">
                                                    Hubungi Kami
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="banner_img"><img
                                            src="<?= base_url('assetskayu/'); ?>images/gambaricon_kayu.png"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="banner_taital_main">
                                        <h1 class="banner_taital">BKJ</h1>
                                        <h5 class="tasty_text">Jual Beli Kayu</h5>
                                        <div class="btn_main">
                                            <div class="callnow_bt active">
                                                <a href="https://wa.me/6281xxxxxx" target="_blank">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png"
                                                        alt="WhatsApp Icon"
                                                        style="width: 24px; height: 24px; margin-right: 8px;">
                                                    Hubungi Kami
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#banner_slider" role="button" data-slide="prev">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                    <a class="carousel-control-next" href="#banner_slider" role="button" data-slide="next">
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- banner section end -->
    </div>
    <!-- header section end -->
    <div class="blog_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="about_taital">Detail Jenis Kayu</h1>
                </div>
            </div>
            <div class="blog_section_2">

                <div class="row">
                    <!-- Gambar Default -->
                    <div class="col-md-12">
                        <div class="blog_box">
                            <form action="<?= base_url('gambarkayu/add_gambarkayu/' . $kayu->id_kayu); ?>" method="post"
                                class="form-horizontal" enctype="multipart/form-data">
                                <br>
                                <center>
                                    <div class="blog_img">
                                        <!-- Gambar Default -->
                                        <img src="<?= base_url('assets/gambarkayu/' . $kayu->foto_kayu) ?>"
                                            id="gambar_default" style="width: 60%; object-fit: cover;">
                                    </div>
                                    <h4 class="prep_text" id="jenis_default"><?= $kayu->jenis_kayu ?></h4>
                                    <p class="lorem_text" id="keterangan_default"><?= $kayu->keterangan_kayu ?></p>
                                </center>
                            </form>
                        </div>
                        <br><br><br>
                    </div>

                    <!-- Galeri Gambar -->
                    <div class="row">
                        <div class="featured-cars-img" style="display: flex; flex-wrap: wrap; gap: 15px;">
                            <?php foreach ($gambar_kayu as $key => $value) { ?>
                            <div class="col-md-4" style="margin-bottom: 15px;">
                                <div class="blog_box">
                                    <br>
                                    <div style="width: 100%; text-align: center;">
                                        <!-- Gambar Galeri -->
                                        <img src="<?= base_url('assets/gambarkayu/' . $value->gambar_berkahkayu) ?>"
                                            class="gambar-galeri"
                                            style="width: 90%; height: 150px; object-fit: cover; cursor: pointer;">
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- footer section start -->
    <div class="footer_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="address_text">Alamat</h1>
                    <p class="footer_text">Jl. Pagarsih Barat No.347, Sukahaji, Kec. Babakan Ciparay, Kota Bandung, Jawa
                        Barat 40221</p>
                    <div class="location_text">
                        <ul>
                            <li>
                                <a href="#">
                                    <!-- <i class="fa fa-phone" aria-hidden="true"></i><span class="padding_left_10">+01
                                        1234567890</span> -->
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <!-- <i class="fa fa-envelope" aria-hidden="true"></i><span
                                        class="padding_left_10">demo@gmail.com</span> -->
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="form-group">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer section end -->
    <!-- copyright section start -->
    <div class="copyright_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <p class="copyright_text">Design by <a href="https://pstechno.cyou/">
                            <img src="<?= base_url('assets/'); ?>logo/logopstechno_.png" alt="Logo PSTECHNO"
                                style="width: 150px; height: auto;" class="light-logo" />
                        </a>
                        PSTECHNO | ᮕᮥᮒᮁᮃ ᮞᮤᮜᮤᮝᮃᮍᮤ ᮒᮨᮎ᮪ᮂᮔᮧᮜᮧᮌ᮪ᮚ᮪ | <?= date('Y'); ?>.</p>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="footer_social_icon">
                        <!-- <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- copyright section end -->
    <!-- Javascript files-->
    <script src="<?= base_url('assetskayu/'); ?>js/jquery.min.js"></script>
    <script src="<?= base_url('assetskayu/'); ?>js/popper.min.js"></script>
    <script src="<?= base_url('assetskayu/'); ?>js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assetskayu/'); ?>js/jquery-3.0.0.min.js"></script>
    <script src="<?= base_url('assetskayu/'); ?>js/plugin.js"></script>
    <!-- sidebar -->
    <script src="<?= base_url('assetskayu/'); ?>js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?= base_url('assetskayu/'); ?>js/custom.js"></script>


    <script>
    // Menangkap elemen gambar default dan teks default
    const gambarDefault = document.getElementById('gambar_default');
    const jenisDefault = document.getElementById('jenis_default');
    const keteranganDefault = document.getElementById('keterangan_default');

    // Menangkap semua elemen gambar galeri
    const gambarGaleri = document.querySelectorAll('.gambar-galeri');

    // Menambahkan event listener untuk setiap gambar galeri
    gambarGaleri.forEach(gambar => {
        gambar.addEventListener('click', () => {
            // Menyimpan data gambar default saat ini
            const defaultSrc = gambarDefault.src;
            const defaultJenis = jenisDefault.textContent;
            const defaultKeterangan = keteranganDefault.textContent;

            // Menukar data gambar default dengan data gambar yang diklik
            gambarDefault.src = gambar.src;
            jenisDefault.textContent = gambar.getAttribute('data-jenis');
            keteranganDefault.textContent = gambar.getAttribute('data-keterangan');

            // Mengubah gambar yang diklik menjadi gambar default sebelumnya
            gambar.src = defaultSrc;
            gambar.setAttribute('data-jenis', defaultJenis);
            gambar.setAttribute('data-keterangan', defaultKeterangan);
        });
    });
    </script>
</body>

</html>