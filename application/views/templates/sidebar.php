<!-- ============================================================== -->
<!-- left sidebar -->
<!-- ============================================================== -->
<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>

                    <!-- QUERY MENU --->
                    <?php
                    $role_id = $this->session->userdata('role_id');
                    $queryMenu = "SELECT `user_menu`.`id`, `menu`, `target_menu`, `idtarget_menu`, `icon_menu`
                                    FROM `user_menu` JOIN `user_access_menu`
                                    ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                                    WHERE `user_access_menu`.`role_id` = $role_id
                                    ORDER BY `user_access_menu`.`menu_id` ASC"; // Ubah ORDER BY sesuai dengan kolom yang ingin diurutkan
                    $menu = $this->db->query($queryMenu)->result_array();

                    // var_dump($menu);
                    // die;
                    ?>

                    <!-- Looping Menu -->
                    <?php foreach ($menu as $m) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="<?= $m['target_menu']; ?>"><i
                                class="<?= $m['icon_menu']; ?>"></i><?= $m['menu']; ?></a>
                        <div id="<?= $m['idtarget_menu']; ?>" class="collapse submenu" style="">
                            <ul class="nav flex-column">

                                <?php
                                $menuId = $m['id'];
                                $querySubMenu = "SELECT * FROM `user_sub_menu`
                                            WHERE `menu_id` = $menuId
                                            AND `is_active` = 1
                                            ORDER BY `title` ASC"; // Ubah ORDER BY sesuai dengan kolom yang ingin diurutkan
                                $subMenu = $this->db->query($querySubMenu)->result_array();
                                ?>

                                <?php foreach ($subMenu as $sm) : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                                        <i class="<?= $sm['icon']; ?>"></i> <?= $sm['title']; ?>
                                    </a>
                                </li>
                                <?php endforeach; ?>

                            </ul>
                        </div>
                    </li>
                    <?php endforeach; ?>

                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- ============================================================== -->
<!-- end left sidebar -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->