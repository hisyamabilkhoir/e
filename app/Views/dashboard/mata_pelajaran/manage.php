<?php echo view('template/header'); ?>
<?php echo view('template/sidebar'); ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 mt-3">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Kelompok Mapel : <?= $kelompokById['nama_kelompok']; ?>
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
                <div class='col-md-12'>
                    <div class='card card-info'>
                        <div class='card-header'>
                            <h3 class='card-title'>Tambah Mata Pelajaran</h3>
                        </div>
                        <div class='card-body'>
                            <form method="post" action="<?= base_url('/matapelajaran/proses_manage') ?>">
                                <?= csrf_field(); ?>

                                <input type="hidden" name="id_kelas" value="<?= $kelompokById['id_kelas']; ?>">
                                <input type="hidden" name="id_kelompok_mapel_kelas" value="<?= $kelompokById['id']; ?>">
                                <input type="hidden" name="id_tahun" value="<?= $tahunActive['id']; ?>">

                                <div class="form-row">
                                    <div class='form-group col-md-6'>
                                        <label>Mata Pelajaran</label>
                                        <input required value="<?= old('nama_mapel'); ?>" type='text' name='nama_mapel'
                                            placeholder="Mata Pelajaran"
                                            class='form-control <?= ($validation->hasError('nama_mapel')) ? 'is-invalid' : ''; ?>'>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_mapel'); ?>
                                        </div>
                                    </div>
                                    <div class='form-group col-md-6'>
                                        <label>Guru</label>
                                        <select name='kode_guru' class='form-control' required>
                                            <option value=''>Pilih Guru</option>
                                            <?php foreach ($walas as $w) : ?>
                                            <option value='<?= $w["kode"]; ?>'><?= $w['nama']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-row mt-4">
                                    <div class='form-group col-md-2'>
                                        <label>Bobot Nilai Harian Pengetahuan </label>
                                        <input required value="<?= old('bobot_nilai_harian_pengetahuan'); ?>"
                                            type='text' name='bobot_nilai_harian_pengetahuan' placeholder="Nilai"
                                            class='form-control <?= ($validation->hasError('bobot_nilai_harian_pengetahuan')) ? 'is-invalid' : ''; ?>'>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('bobot_nilai_harian_pengetahuan'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                    </div>

                                    <div class='form-group col-md-2'>
                                        <label>Bobot Nilai Harian Keterampilan </label>
                                        <input required value="<?= old('bobot_nilai_harian_keterampilan'); ?>"
                                            type='text' name='bobot_nilai_harian_keterampilan' placeholder="Nilai"
                                            class='form-control <?= ($validation->hasError('bobot_nilai_harian_keterampilan')) ? 'is-invalid' : ''; ?>'>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('bobot_nilai_harian_keterampilan'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                    </div>

                                    <div class='form-group col-md-2'>
                                        <label>Interval Pengetahuan</label>
                                        <input required value="<?= old('interval_pengetahuan'); ?>" type='text'
                                            name='interval_pengetahuan' placeholder="Nilai"
                                            class='form-control <?= ($validation->hasError('interval_pengetahuan')) ? 'is-invalid' : ''; ?>'>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('interval_pengetahuan'); ?>
                                        </div>
                                    </div>


                                </div>

                                <div class="form-row">

                                    <div class='form-group col-md-2'>
                                        <label>Bobot Nilai Akhir Pengtahuan </label>
                                        <input required value="<?= old('bobot_nilai_akhir_pengetahuan'); ?>" type='text'
                                            name='bobot_nilai_akhir_pengetahuan' placeholder="Nilai"
                                            class='form-control <?= ($validation->hasError('bobot_nilai_akhir_pengetahuan')) ? 'is-invalid' : ''; ?>'>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('bobot_nilai_akhir_pengetahuan'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-1"></div>

                                    <div class='form-group col-md-2'>
                                        <label>Bobot Nilai Akhir Keterampilan </label>
                                        <input required value="<?= old('bobot_nilai_akhir_keterampilan'); ?>"
                                            type='text' name='bobot_nilai_akhir_keterampilan' placeholder="Nilai"
                                            class='form-control <?= ($validation->hasError('bobot_nilai_akhir_keterampilan')) ? 'is-invalid' : ''; ?>'>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('bobot_nilai_akhir_keterampilan'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-1">
                                    </div>

                                    <div class='form-group col-md-2'>
                                        <label>Interval Kompetensi</label>
                                        <input required value="<?= old('interval_kompetensi'); ?>" type='text'
                                            name='interval_kompetensi' placeholder="Nilai"
                                            class='form-control <?= ($validation->hasError('interval_kompetensi')) ? 'is-invalid' : ''; ?>'>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('interval_kompetensi'); ?>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row mt-4">
                                    <div class='form-group col-md-6'>
                                        <label>Kalimat Kurang Pengetahuan</label>
                                        <textarea type='text' name='kalimat_kurang_pengetahuan' rows="3"
                                            class="form-control <?= ($validation->hasError('kalimat_kurang_pengetahuan')) ? 'is-invalid' : ''; ?>"
                                            value="<?= old('kalimat_kurang_pengetahuan'); ?>"
                                            placeholder="Kalimat......"
                                            required><?= old('kalimat_kurang_pengetahuan'); ?></textarea>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('kalimat_kurang_pengetahuan'); ?>
                                        </div>
                                    </div>
                                    <div class='form-group col-md-6'>
                                        <label>Kalimat Kurang Keterampilan</label>
                                        <textarea type='text' name='kalimat_kurang_keterampilan' rows="3"
                                            class="form-control <?= ($validation->hasError('kalimat_kurang_keterampilan')) ? 'is-invalid' : ''; ?>"
                                            value="<?= old('kalimat_kurang_keterampilan'); ?>"
                                            placeholder="Kalimat....."
                                            required><?= old('kalimat_kurang_keterampilan'); ?></textarea>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('kalimat_kurang_keterampilan'); ?>
                                        </div>
                                    </div>
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
                            <h3 class='card-title'>Mata Pelajaran <?= $kelompokById['nama_kelompok']; ?></h3>
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