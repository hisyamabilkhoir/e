<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?php echo base_url('/'); ?>" class="brand-link">
        <span class="brand-text fw-bold">InventarisApp</span>
        <img src="<?= base_url('img/profile.png'); ?>" alt="Logo" class="img-circle elevation-2 user-panel" width="42" height="40">
    </a>

    <div class="sidebar">
        <div class="mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url('uploads/' . session()->get('admin_profile')); ?>" class="img-circle elevation-2 user-panel d-block" width="50" height="50" alt="User Image">
            </div>
            <div class="lh-lg ms-3 fw-bold">
                <a href="#" class="d-block text-decoration-none"><?= session()->get('admin_name'); ?></a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo base_url('Home'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-th text-white-50"></i>
                        <p>Beranda</p>
                    </a>
                </li>

                <?php if (session()->get('level') == 'administrator') : ?>
                    <li class="nav-header">USERS</li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('users'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-users text-info"></i>
                            <p>Manajement Users</p>
                        </a>
                    </li>
                <?php endif; ?>

                <li class="nav-header">BARANG</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            Barang
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('barang'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-cart-plus text-teal"></i>
                                <p>Data Barang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('BarangMasuk'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-arrow-right text-lime"></i>
                                <p>Barang Masuk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('BarangKeluar'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-arrow-left text-warning"></i>
                                <p>Barang Keluar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">LAPORAN</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-archive"></i>
                        <p>
                            Laporan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('laporanmasuk'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-file-alt text-lime"></i>
                                <p>Barang Masuk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('laporankeluar'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-file-alt text-danger"></i>
                                <p>Barang Keluar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">ACCOUNT</li>
                <li class="nav-item">
                    <a href="<?php echo base_url('/login/logout'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                        <p class="text">Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>