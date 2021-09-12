<?php echo view('template/header'); ?>
<?php echo view('template/sidebar'); ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 mt-3">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Tambah Siswa
                    </h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">


            <form method="post" action="<?= base_url("/siswa/proses_tambah") ?>">
                <?= csrf_field(); ?>
                <div class='row'>
                    <div class='col-md-12'>

                        <div class='card card-info'>
                            <div class='card-header'>
                                <h3 class='card-title'>Data Siswa</h3>
                            </div>
                            <div class='card-body'>



                                <div class="form-group col-4">
                                    <label for="inputEmail4">NIS</label>

                                    <input type="text" class="form-control <?= ($validation->hasError('nis')) ? 'is-invalid' : ''; ?>" id="" name="nis" value="<?= old('nis'); ?>" placeholder="nis" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nis'); ?>
                                    </div>

                                </div>
                                <div class="form-group col-4">
                                    <label>NISN</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nisn')) ? 'is-invalid' : ''; ?>" id="" name="nisn" value="<?= old('nisn'); ?>" placeholder="nisn" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nisn'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <label for="inputPassword4">NIK</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" id="" name="nik" value="<?= old('nik'); ?>" placeholder="nik" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nik'); ?>
                                    </div>
                                </div>



                                <div class='form-group col-6'>
                                    <label>Nama Lengkap</label>
                                    <input type='text' name='nama' class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" value="<?= old('nama'); ?>" placeholder="nama lengkap" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>


                                <div class='form-group col-4'>
                                    <label>Tempat Lahir</label>
                                    <input type='text' name='tempat_lahir' class="form-control <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : ''; ?>" value="<?= old('tempat_lahir'); ?>" placeholder="tempat lahir" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tempat_lahir'); ?>
                                    </div>
                                </div>
                                <div class='form-group col-3'>
                                    <label>Tanggal Lahir</label>
                                    <input type='date' name='tanggal_lahir' class="form-control <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : ''; ?>" value="<?= old('tanggal_lahir'); ?>" placeholder="tanggal diterima" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tanggal_lahir'); ?>
                                    </div>
                                </div>



                                <div class='form-group mt-3 col-4'>
                                    <label>Jenis Kelamin</label>
                                    <br>
                                    <label>
                                        <input type='radio' name='jk' value="L" checked>
                                        Laki - laki
                                    </label>
                                    <label>
                                        <input type='radio' name='jk' value="P">
                                        Perempuan
                                    </label>
                                </div>
                                <div class='form-group col-2'>
                                    <label>Agama</label>
                                    <input type='text' name='agama' class="form-control <?= ($validation->hasError('agama')) ? 'is-invalid' : ''; ?>" value="<?= old('agama'); ?>" placeholder="agama" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('agama'); ?>
                                    </div>
                                </div>
                                <div class='form-group col-3'>
                                    <label>Status Dalam Keluarga</label>
                                    <input type='text' name='status_dalam_keluarga' class="form-control <?= ($validation->hasError('status_dalam_keluarga')) ? 'is-invalid' : ''; ?>" value="<?= old('status_dalam_keluarga'); ?>" placeholder="status dalam keluarga" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('status_dalam_keluarga'); ?>
                                    </div>
                                </div>
                                <div class='form-group col-2'>
                                    <label>Anak ke</label>
                                    <input type='text' name='anak_ke' class="form-control <?= ($validation->hasError('anak_ke')) ? 'is-invalid' : ''; ?>" value="<?= old('anak_ke'); ?>" placeholder="anak ke" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('anak_ke'); ?>
                                    </div>
                                </div>


                                <div class='form-group col-7'>
                                    <label>Alamat Siswa</label>
                                    <textarea type='text' name='alamat_siswa' rows="3" class="form-control <?= ($validation->hasError('alamat_siswa')) ? 'is-invalid' : ''; ?>" value="<?= old('alamat_siswa'); ?>" placeholder="alamat siswa" required><?= old('alamat_siswa'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat_siswa'); ?>
                                    </div>
                                </div>


                                <div class='form-group col-4'>
                                    <label>No Handphone Siswa</label>
                                    <input type='text' name='no_hp_siswa' class="form-control <?= ($validation->hasError('no_hp_siswa')) ? 'is-invalid' : ''; ?>" value="<?= old('no_hp_siswa'); ?>" placeholder="no handphone siswa" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_hp_siswa'); ?>
                                    </div>
                                </div>
                                <div class='form-group col-4'>
                                    <label>Asal Sekolah</label>
                                    <input type='text' name='asal_sekolah' class="form-control <?= ($validation->hasError('asal_sekolah')) ? 'is-invalid' : ''; ?>" value="<?= old('asal_sekolah'); ?>" placeholder="asal sekolah" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('asal_sekolah'); ?>
                                    </div>
                                </div>
                                <div class='form-group col-4'>
                                    <label>Kelas Diterima</label>
                                    <input type='text' name='kelas_diterima' class="form-control <?= ($validation->hasError('kelas_diterima')) ? 'is-invalid' : ''; ?>" value="<?= old('kelas_diterima'); ?>" placeholder="kelas diterima" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('kelas_diterima'); ?>
                                    </div>
                                </div>
                                <div class='form-group col-3'>
                                    <label>Tanggal Diterima</label>
                                    <input type='date' name='tanggal_diterima' class="form-control <?= ($validation->hasError('tanggal_diterima')) ? 'is-invalid' : ''; ?>" value="<?= old('tanggal_diterima'); ?>" placeholder="tanggal diterima" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tanggal_diterima'); ?>
                                    </div>
                                </div>




                            </div>
                        </div>
                        <div class='card card-success'>
                            <div class='card-header'>
                                <h3 class='card-title'>Data Orang Tua</h3>
                            </div>
                            <div class='card-body'>


                                <div class='form-group col-6'>
                                    <label>Nama Ayah</label>
                                    <input type='text' name='nama_ayah' class="form-control <?= ($validation->hasError('nama_ayah')) ? 'is-invalid' : ''; ?>" value="<?= old('nama_ayah'); ?>" placeholder="nama ayah" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_ayah'); ?>
                                    </div>
                                </div>
                                <div class='form-group col-6'>
                                    <label>Nama Ibu</label>
                                    <input type='text' name='nama_ibu' class="form-control <?= ($validation->hasError('nama_ibu')) ? 'is-invalid' : ''; ?>" value="<?= old('nama_ibu'); ?>" placeholder="nama ibu" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_ibu'); ?>
                                    </div>
                                </div>



                                <div class='form-group col-7'>
                                    <label>Alamat Orang Tua</label>
                                    <textarea type='text' name='alamat_ortu' rows="3" class="form-control <?= ($validation->hasError('alamat_ortu')) ? 'is-invalid' : ''; ?>" value="<?= old('alamat_ortu'); ?>" placeholder="alamat orang tua" required><?= old('alamat_ortu'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat_ortu'); ?>
                                    </div>
                                </div>


                                <div class='form-group col-4'>
                                    <label>Pekerjaan Ayah</label>
                                    <input type='text' name='pekerjaan_ayah' class="form-control <?= ($validation->hasError('pekerjaan_ayah')) ? 'is-invalid' : ''; ?>" value="<?= old('pekerjaan_ayah'); ?>" placeholder="pekerjaan ayah" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('pekerjaan_ayah'); ?>
                                    </div>
                                </div>
                                <div class='form-group col-4'>
                                    <label>Pekerjaan Ibu</label>
                                    <input type='text' name='pekerjaan_ibu' class="form-control <?= ($validation->hasError('pekerjaan_ibu')) ? 'is-invalid' : ''; ?>" value="<?= old('pekerjaan_ibu'); ?>" placeholder="pekerjaan ibu" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('pekerjaan_ibu'); ?>
                                    </div>
                                </div>
                                <div class='form-group col-4'>
                                    <label>No Telepon Orang Tua</label>
                                    <input type='text' name='no_telepon_ortu' class="form-control <?= ($validation->hasError('no_telepon_ortu')) ? 'is-invalid' : ''; ?>" value="<?= old('no_telepon_ortu'); ?>" placeholder="no telepon orang tua" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_telepon_ortu'); ?>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class='card card-primary'>
                            <div class='card-header'>
                                <h3 class='card-title'>Data wali</h3>
                            </div>
                            <div class='card-body'>

                                <div class='form-group col-6'>
                                    <label>Nama Wali</label>
                                    <input type='text' name='nama_wali' class="form-control <?= ($validation->hasError('nama_wali')) ? 'is-invalid' : ''; ?>" value="<?= old('nama_wali'); ?>" placeholder="nama wali" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_wali'); ?>
                                    </div>
                                </div>

                                <div class='form-group col-7'>
                                    <label>Alamat Wali</label>
                                    <textarea type='text' name='alamat_wali' rows="3" class="form-control <?= ($validation->hasError('alamat_wali')) ? 'is-invalid' : ''; ?>" value="<?= old('alamat_wali'); ?>" placeholder="alamat wali" required><?= old('alamat_wali'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat_wali'); ?>
                                    </div>
                                </div>


                                <div class='form-group col-4'>
                                    <label>No Telepon Wali</label>
                                    <input type='text' name='no_telepon_wali' class="form-control <?= ($validation->hasError('no_telepon_wali')) ? 'is-invalid' : ''; ?>" value="<?= old('no_telepon_wali'); ?>" placeholder="no telepon wali" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_telepon_wali'); ?>
                                    </div>
                                </div>
                                <div class='form-group col-4'>
                                    <label>Pekerjaan Wali</label>
                                    <input type='text' name='pekerjaan_wali' class="form-control <?= ($validation->hasError('pekerjaan_wali')) ? 'is-invalid' : ''; ?>" value="<?= old('pekerjaan_wali'); ?>" placeholder="pekerjaan wali" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('pekerjaan_wali'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="<?= base_url(); ?>/siswa" class="btn btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-success float-right">Tambah Siswa</button>
                    </div>
                </div>
                <br><br>
            </form>
        </div>

    </div>

</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>




<?php echo view('template/footer'); ?>