<?php echo view('template/header'); ?>
<?php echo view('template/sidebar'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 mt-3">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Data Seluruh Siswa
                    </h1>
                </div>
            </div>
            <div class="row mb-2 mt-4">
                <div class="col-12">
                    <a href="<?= base_url(); ?>/siswa/tambah">
                        <button type="submit" class='btn btn-info'>
                            <i class='fa fa-plus'></i> Tambah Siswa
                        </button>
                    </a>
                    <a href="<?= base_url(); ?>/siswa/tambah">
                        <button type="submit" class='btn btn-success float-right'>
                            <i class="fa fa-file-excel pr-2" aria-hidden="true"></i>Import Data
                        </button>
                    </a>
                    <a href="<?= base_url(); ?>/siswa/download">
                        <button type="submit" class='btn btn-warning float-right mr-4'>
                            <i class='fa fa-download'></i> Download Format
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


            <div class="modal fade" id="modal-form-edit-student">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Siswa</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="form-edit-student">
                        </div>
                        <div class="modal-footer justify-content-between">
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <div class='row'>
                <div class='col-md-12'>
                    <div class='card card-info'>
                        <div class='card-header'>
                            <h3 class='card-title'>Data Siswa</h3>
                            <div class="card-tools">
                                <form action="" method="POST">
                                    <div class="input-group input-group-sm mt-1" style="width: 190px;">
                                        <input type="text" name="keyword" class="form-control float-right" placeholder="Cari Siswa ....">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-info">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class='card-body'>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>NISN</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>L/P</th>
                                        <th>Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($siswa as $s) : ?>

                                        <tr>
                                            <td class='text-center'><?= $i++ ?></td>
                                            <td class='text-center'><?= $s['nomor_induk']; ?></td>
                                            <td class='text-center'><?= $s['nisn']; ?></td>
                                            <td class='text-center'><?= $s['nik']; ?></td>
                                            <td><?= $s['nama_lengkap']; ?></td>
                                            <td class='text-center'>
                                                <?= $s['jk']; ?>
                                            </td>
                                            <td class='text-center'>
                                                <!-- <a href="javascript:void(0)" data-toggle="modal"
                                                data-target="#modal-form-edit-student" onclick="edit_student(11)"
                                                class='badge badge-primary'>detail
                                            </a> -->
                                                <a href="<?= base_url(); ?>/siswa/ubah/<?= $s['kode']; ?>" class="badge badge-success">Telusuri</a>
                                                <a href="<?= base_url(); ?>/siswa/hapus/<?= $s['kode']; ?>" class="badge badge-danger hapus-siswa">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <br>
                            <?= $pager->links('siswa', 'siswa_pagination'); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<?php echo view('template/footer'); ?>