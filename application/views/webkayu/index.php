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

    <!-- Tambahkan Bootstrap CSS dan JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Tambahkan CSS Khusus -->
    <style>
    .carousel-control-prev,
    .carousel-control-next {
        position: absolute;
        top: 50%;
        /* Membuat tombol berada di tengah secara vertikal */
        transform: translateY(-50%);
        /* Menyeimbangkan posisi tengah */
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.5);
        /* Background semi-transparan */
        border-radius: 50%;
        /* Membuat tombol berbentuk bulat */
        z-index: 10;
    }

    .carousel-control-prev {
        left: -60px;
        /* Mengatur jarak tombol navigasi kiri */
    }

    .carousel-control-next {
        right: -60px;
        /* Mengatur jarak tombol navigasi kanan */
    }

    .carousel-control-prev:hover,
    .carousel-control-next:hover {
        background-color: rgba(0, 0, 0, 0.8);
        /* Background lebih gelap saat hover */
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 20px;
        /* Ukuran ikon panah */
        height: 20px;
        background-size: 100%;
        /* Memastikan ikon memenuhi tombol */
    }
    </style>
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
                            <a class="nav-link" href="#index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#kayu">Kayu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pesan">Pesan Kayu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('auth'); ?>">Login</a>
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
    <!-- coffee section start -->
    <div class="coffee_section layout_padding" id="kayu">
        <div class="container">
            <div class="row">
                <h1 class="coffee_taital">JENIS KAYU</h1>
                <div class="bulit_icon"><img src="<?= base_url('assetskayu/'); ?>images/bulit-icon.png"></div>
            </div>
        </div>
        <div class="coffee_section_2">
            <div id="main_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">

                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php 
                            $chunkedKayu = array_chunk($kayujaya, 4); // Membagi data menjadi 4 item per slide
                            foreach ($chunkedKayu as $index => $chunk) : ?>
                            <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
                                <div class="container-fluid">
                                    <div class="row">
                                        <?php foreach ($chunk as $kayu) : ?>
                                        <div class="col-lg-3 col-md-6">
                                            <!-- Link ke halaman detail -->
                                            <a href="<?= base_url('webkayu/detail_kayu/' . $kayu->id_kayu); ?>"
                                                style="text-decoration: none;">
                                                <div class="coffee_img" style="cursor: pointer;">
                                                    <img src="<?= base_url('assets/gambarkayu/' . $kayu->foto_kayu); ?>"
                                                        alt="Foto Kayu" style="width: 100%; height: auto;">
                                                </div>
                                                <!-- Menampilkan informasi kayu -->
                                                <h3 class="types_text" style="color: #000;">
                                                    <?= htmlspecialchars($kayu->jenis_kayu); ?>
                                                    (<?= htmlspecialchars($kayu->lebar_kayu); ?> x
                                                    <?= htmlspecialchars($kayu->tinggi_kayu); ?> cm)
                                                </h3>
                                                <h4 class="price_text" style="color: #555;">Rp
                                                    <?= number_format($kayu->harga_kayu, 0, ',', '.'); ?>
                                                </h4>
                                                <p class="looking_text" style="color: #777;">
                                                    <?= htmlspecialchars($kayu->keterangan_kayu); ?>
                                                </p>
                                            </a>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>


                        <!-- Tombol navigasi -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- coffee section end -->
    <!-- about section start -->
    <div class="about_section layout_padding" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="about_taital">Tentang Berkah Kayu Jaya</h1>
                    <div class="bulit_icon"><img src="<?= base_url('assetskayu/'); ?>images/bulit-icon.png"></div>
                </div>
            </div>
            <div class="about_section_2 layout_padding">
                <div class="image_iman"><img src="<?= base_url('assetskayu/'); ?>images/kayujaya.png" class="about_img">
                </div>
                <div class="about_taital_box">
                    <h1 class="about_taital_1">Berkah Kayu Jaya</h1>
                    <p class=" about_text">Berkah Kayu Jaya adalah solusi terpercaya untuk kebutuhan kayu Anda. Kami
                        menyediakan berbagai jenis kayu berkualitas, seperti kayu jati, kayu mahoni, dan berbagai
                        jenis
                        kayu lainnya yang cocok untuk berbagai keperluan, mulai dari konstruksi hingga furnitur.

                        Selain itu, kami juga menjual kayu bekas dengan kondisi yang masih sangat baik, sehingga
                        bisa
                        menjadi pilihan ekonomis dan ramah lingkungan. Tidak hanya menjual kayu, Berkah Kayu Jaya
                        juga
                        melayani jasa bongkar kayu secara profesional, membantu Anda menangani pekerjaan
                        pembongkaran
                        dengan efisiensi dan ketelitian.

                        Dengan komitmen terhadap kualitas dan pelayanan terbaik, kami siap menjadi mitra Anda dalam
                        setiap kebutuhan kayu. Kepercayaan Anda adalah prioritas utama kami!</p>
                </div>
            </div>
        </div>
    </div>
    <!-- about section end -->

    <!-- blog section start -->
    <div class="blog_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="about_taital">Jasa Bongkar Kayu dan Bangunan</h1>
                    <div class="bulit_icon"><img src="<?= base_url('assetskayu/'); ?>images/bulit-icon.png"></div>
                </div>
            </div>
            <div class="blog_section_2">
                <div class="row">
                    <?php foreach ($kegiatankayu as $kegiatan): ?>
                    <div class="col-md-6">
                        <div class="blog_box">
                            <div class="blog_img">
                                <!-- Menampilkan gambar dari upload_kegiatan -->
                                <img src="<?= base_url('assets/gambarkegiatan/') . $kegiatan->upload_kegiatan ?>"
                                    alt="Gambar Kegiatan">
                            </div>
                            <!-- Menampilkan tanggal dan bulan dari date_created -->
                            <h4 class="date_text">
                                <?= date('d F', strtotime($kegiatan->date_created)); ?>
                            </h4>
                            <!-- Judul kegiatan -->
                            <h4 class="prep_text">Jasa Bongkar Kayu dan Bangunan</h4>
                            <!-- Menampilkan deskripsi kegiatan -->
                            <p class="lorem_text"><?= $kegiatan->deskripsi_kegiatan; ?></p>
                        </div>
                        <!-- <div class="read_bt"><a href="#">Read More</a></div> -->
                        <br><br>
                    </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>
    <!-- blog section end -->
    <!-- contact section start -->
    <div class="contact_section layout_padding" id="pesan">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="contact_taital">Pesan Kayu</h1>
                    <div class="bulit_icon"><img src="<?= base_url('assetskayu/'); ?>images/bulit-icon.png"></div>
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="contact_section_2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mail_section_1">
                            <form action="<?= base_url(); ?>webkayu/pesananwebkayu_action" method="post"
                                class="form-horizontal" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mail_text">Jenis Kayu</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <select name="id_kayu" id="id_kayu" class="mail_text" required>
                                                <option value="">--Pilih Jenis Kayu--</option>
                                                <?php foreach ($kayujaya as $key => $value) { ?>
                                                <option value="<?= $value->id_kayu ?>"
                                                    data-lebar="<?= $value->lebar_kayu ?>"
                                                    data-tinggi="<?= $value->tinggi_kayu ?>"
                                                    data-harga="<?= $value->harga_kayu ?>"
                                                    data-gambar="<?= base_url('assets/gambarkayu/' . $value->foto_kayu) ?>"
                                                    data-stok="<?= $value->stok_kayu ?>">
                                                    <?= $value->jenis_kayu ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mail_text">Nama Pelanggan</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="nama_customer" id="nama_customer" class="mail_text"
                                                value="<?= isset($login['nama']) ? $login['nama'] : ''; ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mail_text">Gambar Kayu</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <img src="<?= base_url('assets/img/gambarkayu.png') ?>" id="gambar_load"
                                                width="100px" class="mail_text">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mail_text">Lebar</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input type="text" name="lebar_kayu" id="lebar_kayu" class="mail_text"
                                                placeholder="Lebar" readonly>
                                            <label class="mail_text" for="lebar_kayu">Per-M</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mail_text">Tinggi</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input type="text" name="tinggi_kayu" id="tinggi_kayu" class="mail_text"
                                                placeholder="Tinggi" readonly>
                                            <label class="mail_text" for="tinggi_kayu">Per-M</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mail_text">Stok Kayu</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="number" min="0" name="stok_kayu" id="stok_kayu"
                                                class="mail_text" placeholder="Stok Kayu">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mail_text">Harga</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="harga_kayu" id="harga_kayu" class="mail_text"
                                                placeholder="Rp." readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mail_text">Jumlah</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input type="number" min="0" name="jumlah" id="jumlah" class="mail_text"
                                                placeholder="Jumlah">
                                            <label class="mail_text" for="tinggi_kayu">Per-Batang</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mail_text">Total Harga</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="total_harga" id="total_harga" class="mail_text"
                                                placeholder="Rp." readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mail_text">Keterangan</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <textarea name="keterangan" id="keterangan" class="mail_text" rows="5"
                                                placeholder="Keterangan"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mail_text">No Hp / Email</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="text" name="no_hp" id="no_hp" class="mail_text"
                                                placeholder="No Hp / Email">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mail_text">Alamat Pesanan</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <textarea name="alamat_pesanan" id="alamat_pesanan" class="mail_text"
                                                rows="5" placeholder="Alamat Pesanan"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <label class="mail_text">Tanggal Pesanan</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input type="date" name="tanggal_pesankayu" id="tanggal_pesankayu"
                                                class="mail_text" placeholder="tanggal_pesankayu" readonly>
                                        </div>
                                    </div>
                                </div>

                                <center>
                                    <div class="border-top">
                                        <div class="card-body">
                                            <?php if (isset($login) && !empty($login)) : ?>
                                            <!-- Jika pengguna sudah login -->
                                            <button type="submit" class="btn btn-primary">Pesan</button>
                                            <?php else : ?>
                                            <!-- Jika pengguna belum login -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#loginModal">
                                                Pesan
                                            </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </center>
                            </form>
                        </div>
                    </div>
                    <div class="map_main">
                        <div class="map-responsive">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.730660771027!2d107.5823886213866!3d-6.922766189070122!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6046bfb542b%3A0xdb1c3d4779629a1f!2sJl.%20Pagarsih%20Barat%20No.347%2C%20Sukahaji%2C%20Kec.%20Babakan%20Ciparay%2C%20Kota%20Bandung%2C%20Jawa%20Barat%2040221!5e0!3m2!1sid!2sid!4v1737015300602!5m2!1sid!2sid"
                                width="250" height="500" frameborder="0" style="border:0; width: 100%;"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact section end -->
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

    <!-- Modal Popup -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Perhatian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda tidak bisa melakukan pemesanan sebelum login. Silakan login terlebih dahulu.
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('auth'); ?>" class="btn btn-primary">Login</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
    <!-- <script src="<//?= base_url('assetskayu/'); ?>js/custom.js"></script> -->

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const carouselElement = document.querySelector('#carouselExampleControls');
        const carousel = new bootstrap.Carousel(carouselElement, {
            interval: false, // Matikan auto-slide (opsional)
            touch: true // Aktifkan swipe
        });

        // Fitur tambahan untuk geser dengan mouse (desktop)
        let isDragging = false;
        let startX;

        carouselElement.addEventListener('mousedown', (e) => {
            isDragging = true;
            startX = e.clientX;
        });

        carouselElement.addEventListener('mouseup', (e) => {
            isDragging = false;
        });

        carouselElement.addEventListener('mouseleave', (e) => {
            isDragging = false;
        });

        carouselElement.addEventListener('mousemove', (e) => {
            if (isDragging) {
                const x = e.clientX;
                const diff = startX - x;

                if (diff > 50) {
                    // Geser ke slide berikutnya
                    carousel.next();
                    isDragging = false;
                } else if (diff < -50) {
                    // Geser ke slide sebelumnya
                    carousel.prev();
                    isDragging = false;
                }
            }
        });
    });
    </script>



    <script>
    document.getElementById('id_kayu').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];

        var lebarKayu = parseFloat(selectedOption.getAttribute('data-lebar')) || 0;
        var tinggiKayu = parseFloat(selectedOption.getAttribute('data-tinggi')) || 0;
        var hargaKayu = parseFloat(selectedOption.getAttribute('data-harga')) || 0;
        var stokKayu = parseInt(selectedOption.getAttribute('data-stok')) || 0;
        var fotoKayu = selectedOption.getAttribute('data-gambar');

        document.getElementById('lebar_kayu').value = lebarKayu;
        document.getElementById('tinggi_kayu').value = tinggiKayu;
        document.getElementById('harga_kayu').value = hargaKayu;
        document.getElementById('stok_kayu').value = stokKayu;
        document.getElementById('gambar_load').src = fotoKayu || '<?= base_url('assets/img/gambarkayu.png') ?>';

        calculateTotal();
    });

    document.getElementById('jumlah').addEventListener('input', function() {
        var jumlah = parseInt(this.value) || 0;
        var stokAwal = parseInt(document.getElementById('stok_kayu').value) || 0;

        // Kurangi stok dengan jumlah input
        var stokTersisa = stokAwal - jumlah;

        // Validasi stok tidak boleh negatif
        if (stokTersisa < 0) {
            alert('Jumlah kayu melebihi stok yang tersedia!');
            this.value = stokAwal; // Reset ke nilai maksimum yang diizinkan
            stokTersisa = 0;
        }

        document.getElementById('stok_kayu').value = stokTersisa;
        calculateTotal();
    });

    function calculateTotal() {
        var lebar = parseFloat(document.getElementById('lebar_kayu').value) || 0;
        var tinggi = parseFloat(document.getElementById('tinggi_kayu').value) || 0;
        var harga = parseFloat(document.getElementById('harga_kayu').value) || 0;
        var jumlah = parseInt(document.getElementById('jumlah').value) || 0;

        var totalHarga = (lebar + tinggi + harga) * jumlah;

        document.getElementById('total_harga').value = formatRupiah(totalHarga);
    }

    function formatRupiah(angka) {
        return angka.toLocaleString('id-ID', {
            style: 'currency',
            currency: 'IDR'
        });
    }

    document.querySelector('form').addEventListener('submit', function() {
        var totalHarga = document.getElementById('total_harga').value;

        // Hapus semua karakter kecuali angka
        totalHarga = totalHarga.replace(/[^\d]/g, '');
        document.getElementById('total_harga').value = totalHarga;
    });
    </script>


    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var today = new Date(); // Mendapatkan tanggal saat ini
        var day = String(today.getDate()).padStart(2, '0'); // Menambahkan 0 di depan jika hanya 1 digit
        var month = String(today.getMonth() + 1).padStart(2,
            '0'); // Menambahkan 0 di depan jika hanya 1 digit (karena bulan di JavaScript dimulai dari 0)
        var year = today.getFullYear();

        var currentDate = year + '-' + month + '-' + day; // Menggabungkan menjadi format 'YYYY-MM-DD'
        document.getElementById('tanggal_pesankayu').value = currentDate; // Mengisi nilai input tanggal

        // Jika ingin mengizinkan pengguna mengedit, hilangkan atau sesuaikan 'disabled'
        document.getElementById('tanggal_pesankayu').removeAttribute('disabled');
    });
    </script>
</body>

</html>