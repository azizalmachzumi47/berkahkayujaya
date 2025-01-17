        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="../index.html">BERKAH KAYU JAYA</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">

                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="badge badge-danger" style="font-size: 12px;">
                                    <i class="fas fa-fw fa-bell"></i>
                                    <?= $jumlah_pesanan_belum_dibaca > 0 ? $jumlah_pesanan_belum_dibaca : ''; ?>
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title">
                                        Notification
                                        <span class="badge badge-danger">
                                            <?= $jumlah_pesanan_belum_dibaca > 0 ? $jumlah_pesanan_belum_dibaca : ''; ?>
                                        </span>
                                    </div>

                                    <div class="notification-list">
                                        <div class="list-group">
                                            <?php if (count($pesanan_masuk) > 0): ?>
                                            <?php foreach ($pesanan_masuk as $pesanan): ?>
                                            <a href="<?= base_url('pesanankayu/editpesanan_kayu/' . $pesanan->id_pesanankayu); ?>"
                                                class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img">
                                                        <img src="<?= base_url('assets/'); ?>img/icon.png" alt=""
                                                            class="user-avatar-md rounded-circle">
                                                    </div>
                                                    <div class="notification-list-user-block">
                                                        <span
                                                            class="notification-list-user-name"><?= $pesanan->nama_customer; ?></span>
                                                        <?= $pesanan->keterangan; ?>
                                                        <div class="notification-date">
                                                            <?= date('H:i', strtotime($pesanan->date_created)); ?></div>
                                                    </div>
                                                </div>
                                            </a>
                                            <?php endforeach; ?>
                                            <?php else: ?>
                                            <div class="list-group-item">Tidak ada notifikasi baru</div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="<?= base_url('assets/profile/') . $login['image']; ?>" alt=""
                                    class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                                aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">
                                        <?= $login['nama']; ?></h5>
                                </div>
                                <a class="dropdown-item" href="<?= base_url('user/edit_user') ?>"><i
                                        class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="<?= base_url('auth/logout') ?>"><i
                                        class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->