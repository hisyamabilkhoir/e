<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?php echo base_url('/'); ?>" class="brand-link">
        <span class="brand-text fw-bold">E-Raport</span>
        <img src="<?= base_url('img/profile.png'); ?>" alt="Logo" class="img-circle elevation-2 user-panel" width="42" height="40">
    </a>

    <div class="sidebar">
        <nav class="mt-2 pb-3 mb-3">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo base_url('Home'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt text-white"></i>
                        <p>Beranda</p>
                    </a>
                </li>

                <li class="nav-header">Data</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('barang'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-calendar text-white"></i>
                                <p>Tahun Pelajaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('BarangMasuk'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-home text-white"></i>
                                <p>Kelas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('BarangKeluar'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-user-graduate text-white"></i>
                                <p>Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('BarangKeluar'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-chalkboard-teacher text-white"></i>
                                <p>Wali Kelas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('BarangKeluar'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-user text-white"></i>
                                <p>Waka Akademik</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('BarangKeluar'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-users text-white"></i>
                                <p>Guru Mapel</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Akun</li>
                <li class="nav-item">
                    <a href="<?php echo base_url('/login/logout'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-user-alt text-white"></i>
                        <p class="text">Akun</p>
                    </a>
                </li>
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