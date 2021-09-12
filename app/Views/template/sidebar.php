<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="../../index3.html" class="brand-link">
        <img src="<?= base_url('public/img/profile.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?= session()->get('nama'); ?></span>
    </a>

    <div class="sidebar">
        <nav class="mt-2 pb-3 mb-3">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo base_url('Home'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>



                <li class="nav-header">Management</li>
                <?php if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3) : ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Operator'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-user-cog text-white"></i>
                            <p>Pegawai</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Siswa'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-user-graduate text-white"></i>
                            <p>Siswa</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('TahunPelajaran'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-calendar text-white"></i>
                            <p>Tahun Pelajaran</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('Kelas'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-home text-white"></i>
                            <p>Kelas</p>
                        </a>
                    </li>
                <?php endif; ?>




                <li class="nav-header">Keluar</li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#logoutModal">
                        <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                        <p class="text">Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>