    <?php echo view('template/header'); ?>
    <?php echo view('template/sidebar'); ?>
    <div class="content-wrapper">
        <div class="content-header">
            <?php if (!empty(session()->getFlashdata('msg2'))) : ?>
                <div class="alert alert-warning shadow mt-2">
                    <?php echo session()->getFlashdata('msg2'); ?>
                </div>
            <?php endif; ?>
            <?php if (!empty(session()->getFlashdata('msg'))) : ?>
                <div class="alert alert-success shadow mt-2">
                    <?php echo session()->getFlashdata('msg'); ?>
                </div>
            <?php endif; ?>
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>50</h3>
                                <p>Siswa</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                            <a href="<?= base_url('/barangmasuk') ?>" class="small-box-footer">
                                info Lanjut <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="small-box bg-gradient-success">
                            <div class="inner">
                                <h3>30</h3>
                                <p>Guru</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="<?= base_url('/users') ?>" class="small-box-footer">
                                info Lanjut <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>9</h3>
                                <p>Kelas</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-home"></i>
                            </div>
                            <a href="<?= base_url('/barangkeluar') ?>" class="small-box-footer">
                                Info Lanjut <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo view('template/footer'); ?>