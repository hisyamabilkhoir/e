<?php echo view('template/header'); ?>
<?php echo view('template/sidebar'); ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 mt-3">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Kelola Mata Pelajaran Tahun Ajaran :
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row mb-2 mt-4">
                <div class="col-sm-2">
                    <a href="<?= base_url(); ?>/matapelajaran/tambah_kelompok">
                        <button type="submit" class='btn btn-info'>
                            <i class='fa fa-plus'></i> Tambah Kelompok Mapel
                        </button>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <?php
            if (!empty(session()->getFlashdata('msg'))) { ?>
            <div class="alert p-4 alert-success">
                <h4><i class="icon fas fa-check"></i> Selamat!</h4>
                <h6><?php echo session()->getFlashdata('msg'); ?></h6>
            </div>
            <?php } ?>





        </div>
    </div>
</div>




<?php echo view('template/footer'); ?>