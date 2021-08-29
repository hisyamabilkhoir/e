<?php echo view('template/header'); ?>
<?php echo view('template/sidebar'); ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 mt-3">

                <div class="col-sm-6">
                    <a class="btn btn-danger"
                        href="<?= base_url('/walikelas/tambahSiswa/' .  $detail_kelompok['id_kelas']);  ?>">
                        back
                    </a>

                    <h1 class="m-0 text-dark mt-3">Kelompok Mapel :
                        <?= $detail_kelompok['nama_kelompok']; ?>
                        <br>
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->


            <?php
            if (!empty(session()->getFlashdata('msg'))) { ?>
            <div class="alert p-4 alert-success">
                <h4><i class="icon fas fa-check"></i> Selamat!</h4>
                <h6><?php echo session()->getFlashdata('msg'); ?></h6>
            </div>
            <?php } ?>
        </div><!-- /.container-fluid -->
    </div>

    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">




            <div class="row">
                <div class='col-md-4'>

                    <div class='card card-info'>
                        <div class='card-header'>
                            <h3 class='card-title'>Tambah Mata Pelajaran</h3>
                        </div>
                        <div class='card-body'>
                            <form method="post" action="<?= base_url('/matapelajaran/proses_manage') ?>">
                                <?= csrf_field(); ?>



                                <input type="hidden" name="id_kelompok_mapel_kelas"
                                    value="<?= $detail_kelompok['id']; ?>">
                                <input type="hidden" name="id_kelas" value="<?= $detail_kelompok['id_kelas']; ?>">
                                <input type="hidden" name="id_tahun" value="<?= $tahunActive['id']; ?>">

                                <div class='form-group'>
                                    <label>Mata Pelajaran</label>
                                    <input required value="<?= old('nama_mapel'); ?>" type='text' name='nama_mapel'
                                        placeholder="Mata Pelajaran"
                                        class='form-control <?= ($validation->hasError('nama_mapel')) ? 'is-invalid' : ''; ?>'>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_mapel'); ?>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label>Guru</label>
                                    <select name='kode_guru' class='form-control' required>
                                        <option value=''>Pilih Guru</option>
                                        <?php foreach ($walas as $w) : ?>
                                        <option value='<?= $w["kode"]; ?>'><?= $w['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>






                                <div class='form-group'>
                                    <button type="submit" class='btn btn-block btn-info'>
                                        <i class='fa fa-plus'></i> Tambah
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class='card card-primary'>
                        <div class='card-header'>
                            <h3 class='card-title'>Mata Pelajaran
                                <?= $detail_kelompok['nama_kelompok']; ?>
                            </h3>
                        </div>
                        <div class='card-body'>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Guru</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($mata_pelajaran as $m) : ?>
                                    <tr>
                                        <td class='text-center'><?= $i++; ?></td>
                                        <td class='text-center'><?= $m['nama_mapel']; ?></td>
                                        <td class='text-center'><?= $m['nama'] ?></td>
                                        <td class='text-center'>

                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




<?php echo view('template/footer'); ?>