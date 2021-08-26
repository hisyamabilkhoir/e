<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="../../index3.html" class="brand-link">
        <img src="<?= base_url('img/profile.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
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
                        <?php if (session()->get('level') == 1 || session()->get('level') == 2 || session()->get('level') == 3) : ?>
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
                        <li class="nav-item">
                            <a href="<?php echo base_url('Siswa'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-user-graduate text-white"></i>
                                <p>Siswa</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url('WaliKelas'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-chalkboard-teacher text-white"></i>
                                <p>Wali Kelas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('/matapelajaran'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-chalkboard-teacher text-white"></i>
                                <p>Mata Pelajaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('BarangKeluar'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-user-tie text-white"></i>
                                <p>Waka Akademik</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('BarangKeluar'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-users text-white"></i>
                                <p>Guru Mapel</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Operator'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-user-cog text-white"></i>
                                <p>Operator</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (session()->get('level') == 4) : ?>
                        <?php if (session()->get('is_walas')) : ?>
                        <li class="nav-item">
                            <a href="<?php echo base_url('WaliKelas'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-chalkboard-teacher text-white"></i>
                                <p>Wali Kelas</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a href="<?php echo base_url('BarangKeluar'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-users text-white"></i>
                                <p>Guru Mapel</p>
                            </a>
                        </li>
                        <?php endif; ?>
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
                    <a class="nav-link" data-toggle="modal" data-target="#logoutModal">
                        <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                        <p class="text">Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>