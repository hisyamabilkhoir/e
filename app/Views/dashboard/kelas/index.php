<?php echo view('template/header'); ?>
<?php echo view('template/sidebar'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Data Kelas
                        <br>
                        <small>Tahun Pelajaran 2017 / 2018</small>
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <?php
            if (!empty(session()->getFlashdata('success'))) { ?>
                <div class="alert p-4 alert-success">
                    <h4><i class="icon fas fa-check"></i> Selamat!</h4>
                    <h6><?php echo session()->getFlashdata('success'); ?></h6>
                </div>
            <?php } ?>

            <?php if (!empty(session()->getFlashdata('danger'))) { ?>
                <div class="alert alert-danger">
                    <h4><i class="icon fas fa-remove"></i> Maaf!</h4>
                    <?php echo session()->getFlashdata('danger'); ?>
                </div>
            <?php } ?>
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class='row'>
                <div class='col-md-4'>
                    <div class='card card-info'>
                        <div class='card-header'>
                            <h3 class='card-title'>Tambah Kelas</h3>
                        </div>
                        <div class='card-body'>
                            <form method="post" action="<?= base_url('/Kelas/tambah') ?>">
                                <?= csrf_field(); ?>
                                <div class='form-group'>
                                    <label>Tingkat</label>
                                    <select name='tingkat' class='form-control' required>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="11">12</option>
                                    </select>
                                </div>
                                <div class='form-group'>
                                    <label>Kelas</label>
                                    <input type='text' name='kelas' placeholder="kelas" class='form-control' required>
                                </div>
                                <div class='form-group'>
                                    <label>Wali Kelas</label>
                                    <select name='wali_kelas' class='form-control' required>
                                        <option value=''>Pilih Guru</option>
                                        <?php foreach ($walas as $w) : ?>
                                            <option value='<?= $w["kode"]; ?>'><?= $w['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class='form-group'>
                                    <button type="submit" class='btn btn-block btn-info'>
                                        <i class='fa fa-plus'></i> Tambah Kelas
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='col-md-8'>
                    <div class='card card-info'>
                        <div class='card-header'>
                            <h3 class='card-title'>Data Kelas</h3>
                        </div>
                        <div class='card-body'>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tingkat</th>
                                        <th>Kelas</th>
                                        <th>Wali Kelas</th>
                                        <th>Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($kelas as $k) : ?>
                                        <tr>
                                            <td class='text-center'><?= $i++; ?></td>
                                            <td class='text-center'><?= $k['tingkat']; ?></td>
                                            <td class='text-center'><?= $k['kelas'] ?></td>
                                            <td><?= $k['nama'] ?></td>
                                            <td class='text-center'>
                                                <a href="" class='btn btn-xs btn-success' title="Kelola Kelas">
                                                    <i class='fa fa-cog'></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

<?php echo view('template/footer'); ?>