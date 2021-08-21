<?php echo view('template/header'); ?>
<?php echo view('template/sidebar'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 mt-3">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Data Siswa
                    </h1>
                </div>
            </div>
        </div>
    </div>


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class='row'>
                <div class='col-md-12'>
                    <div class='card card-primary'>
                        <div class='card-header'>
                            <h3 class='card-title'>Form Ubah Siswa</h3>
                        </div>
                        <div class='card-body'>
                            <form method="post" action="<?= base_url("/siswa/proses_ubah") ?>">
                                <?= csrf_field(); ?>
                                <input type="hidden" value="<?= $siswa['kode'] ?>" name='kode' class="form-control">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">NIS</label>
                                        <input type="text"
                                            class="form-control <?= ($validation->hasError('nis')) ? 'is-invalid' : ''; ?>"
                                            id="" name="nis"
                                            value="<?= (old('nis')) ? old('nis') : $siswa['nomor_induk'] ?>"
                                            placeholder="nis" required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nis'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>NISN</label>
                                        <input type="text"
                                            class="form-control <?= ($validation->hasError('nisn')) ? 'is-invalid' : ''; ?>"
                                            id="" name="nisn"
                                            value="<?= (old('nisn')) ? old('nisn') : $siswa['nisn'] ?>"
                                            placeholder="nisn" required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nisn'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">NIK</label>
                                        <input type="text"
                                            class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>"
                                            id="" name="nik" value="<?= (old('nik')) ? old('nik') : $siswa['nik'] ?>"
                                            placeholder="nik" required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nik'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class='form-group col-md-6'>
                                        <label>Nama Lengkap</label>
                                        <input type='text' name='nama'
                                            class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>"
                                            value="<?= (old('nama')) ? old('nama') : $siswa['nama_lengkap'] ?>"
                                            placeholder="nama lengkap" required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama'); ?>
                                        </div>
                                    </div>
                                    <div class='form-group col-md-3'>
                                        <label>Tempat Lahir</label>
                                        <input type='text' name='tempat_lahir'
                                            class="form-control <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : ''; ?>"
                                            value="<?= (old('tempat_lahir')) ? old('tempat_lahir') : $siswa['tempat_lahir'] ?>"
                                            placeholder="tempat lahir" required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tempat_lahir'); ?>
                                        </div>
                                    </div>
                                    <div class='form-group col-md-3'>
                                        <label>Tanggal Lahir</label>
                                        <input type='date' name='tanggal_lahir'
                                            class="form-control <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : ''; ?>"
                                            value="<?= (old('tanggal_lahir')) ? old('tanggal_lahir') : $siswa['tgl_lahir'] ?>"
                                            placeholder="tanggal lahir" required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tanggal_lahir'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class='form-group mt-2 col-md-3'>
                                        <label>Jenis Kelamin</label>
                                        <br>
                                        <label>
                                            <input type='radio' name='jk'
                                                <?php echo $siswa["jk"] == "L" ? "checked" : ""; ?> value="L">
                                            Laki - laki
                                        </label>
                                        <label>
                                            <input type='radio' name='jk'
                                                <?php echo $siswa["jk"] == "P" ? "checked" : ""; ?> value="P">
                                            Perempuan
                                        </label>
                                    </div>
                                    <div class='form-group mt-2 col-md-2'>
                                        <label>Agama</label>
                                        <input type='text' name='agama'
                                            class="form-control <?= ($validation->hasError('agama')) ? 'is-invalid' : ''; ?>"
                                            value="<?= (old('agama')) ? old('agama') : $siswa['agama'] ?>"
                                            placeholder="agama" required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('agama'); ?>
                                        </div>
                                    </div>
                                    <div class='form-group mt-2 col-md-5'>
                                        <label>Status Dalam Keluarga</label>
                                        <input type='text' name='status_dalam_keluarga'
                                            class="form-control <?= ($validation->hasError('status_dalam_keluarga')) ? 'is-invalid' : ''; ?>"
                                            value="<?= (old('status_dalam_keluarga')) ? old('status_dalam_keluarga') : $siswa['status_dalam_keluarga'] ?>"
                                            placeholder="status dalam keluarga" required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('status_dalam_keluarga'); ?>
                                        </div>
                                    </div>
                                    <div class='form-group mt-2 col-md-2'>
                                        <label>Anak ke</label>
                                        <input type='text' name='anak_ke'
                                            class="form-control <?= ($validation->hasError('anak_ke')) ? 'is-invalid' : ''; ?>"
                                            value="<?= (old('anak_ke')) ? old('anak_ke') : $siswa['anak_ke'] ?>"
                                            placeholder="anak ke" required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('anak_ke'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class='form-group'>
                                    <label>Alamat Siswa</label>
                                    <textarea type='text' name='alamat_siswa' rows="3"
                                        class="form-control <?= ($validation->hasError('alamat_siswa')) ? 'is-invalid' : ''; ?>"
                                        value="<?= (old('alamat_siswa')) ? old('alamat_siswa') : $siswa['alamat_siswa'] ?>"
                                        placeholder="alamat siswa"
                                        required><?= (old('alamat_siswa')) ? old('alamat_siswa') : $siswa['alamat_siswa'] ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat_siswa'); ?>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class='form-group col-md-3'>
                                        <label>No Handphone Siswa</label>
                                        <input type='text' name='no_hp_siswa'
                                            class="form-control <?= ($validation->hasError('no_hp_siswa')) ? 'is-invalid' : ''; ?>"
                                            value="<?= (old('no_hp_siswa')) ? old('no_hp_siswa') : $siswa['nomor_handphone_peserta_didik'] ?>"
                                            placeholder="no handphone siswa" required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('no_hp_siswa'); ?>
                                        </div>
                                    </div>
                                    <div class='form-group col-md-3'>
                                        <label>Asal Sekolah</label>
                                        <input type='text' name='asal_sekolah'
                                            class="form-control <?= ($validation->hasError('asal_sekolah')) ? 'is-invalid' : ''; ?>"
                                            value="<?= (old('asal_sekolah')) ? old('asal_sekolah') : $siswa['sekolah_asal'] ?>"
                                            placeholder="asal sekolah" required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('asal_sekolah'); ?>
                                        </div>
                                    </div>
                                    <div class='form-group col-md-3'>
                                        <label>Kelas Diterima</label>
                                        <input type='text' name='kelas_diterima'
                                            class="form-control <?= ($validation->hasError('kelas_diterima')) ? 'is-invalid' : ''; ?>"
                                            value="<?= (old('kelas_diterima')) ? old('kelas_diterima') : $siswa['kelas_diterima'] ?>"
                                            placeholder="kelas diterima" required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('kelas_diterima'); ?>
                                        </div>
                                    </div>
                                    <div class='form-group col-md-3'>
                                        <label>Tanggal Diterima</label>
                                        <input type='date' name='tanggal_diterima'
                                            class="form-control <?= ($validation->hasError('tanggal_diterima')) ? 'is-invalid' : ''; ?>"
                                            value="<?= (old('tanggal_diterima')) ? old('tanggal_diterima') : $siswa['tgl_diterima'] ?>"
                                            placeholder="tanggal diterima" required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('tanggal_diterima'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class='form-group col-md-6'>
                                        <label>Nama Ayah</label>
                                        <input type='text' name='nama_ayah'
                                            class="form-control <?= ($validation->hasError('nama_ayah')) ? 'is-invalid' : ''; ?>"
                                            value="<?= (old('nama_ayah')) ? old('nama_ayah') : $siswa['nama_ayah'] ?>"
                                            placeholder="nama ayah" required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_ayah'); ?>
                                        </div>
                                    </div>
                                    <div class='form-group col-md-6'>
                                        <label>Nama Ibu</label>
                                        <input type='text' name='nama_ibu'
                                            class="form-control <?= ($validation->hasError('nama_ibu')) ? 'is-invalid' : ''; ?>"
                                            value="<?= (old('nama_ibu')) ? old('nama_ibu') : $siswa['nama_ibu'] ?>"
                                            placeholder="nama ibu" required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_ibu'); ?>
                                        </div>
                                    </div>

                                </div>

                                <div class='form-group'>
                                    <label>Alamat Orang Tua</label>
                                    <textarea type='text' name='alamat_ortu' rows="3"
                                        class="form-control <?= ($validation->hasError('alamat_ortu')) ? 'is-invalid' : ''; ?>"
                                        value="<?= (old('alamat_ortu')) ? old('alamat_ortu') : $siswa['alamat_ortu'] ?>"
                                        placeholder="alamat orang tua"
                                        required><?= (old('alamat_ortu')) ? old('alamat_ortu') : $siswa['alamat_ortu'] ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat_ortu'); ?>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class='form-group col-md-4'>
                                        <label>Pekerjaan Ayah</label>
                                        <input type='text' name='pekerjaan_ayah'
                                            class="form-control <?= ($validation->hasError('pekerjaan_ayah')) ? 'is-invalid' : ''; ?>"
                                            value="<?= (old('pekerjaan_ayah')) ? old('pekerjaan_ayah') : $siswa['pekerjaan_ayah'] ?>"
                                            placeholder="pekerjaan ayah" required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('pekerjaan_ayah'); ?>
                                        </div>
                                    </div>
                                    <div class='form-group col-md-4'>
                                        <label>Pekerjaan Ibu</label>
                                        <input type='text' name='pekerjaan_ibu'
                                            class="form-control <?= ($validation->hasError('pekerjaan_ibu')) ? 'is-invalid' : ''; ?>"
                                            value="<?= (old('pekerjaan_ibu')) ? old('pekerjaan_ibu') : $siswa['pekerjaan_ibu'] ?>"
                                            placeholder="pekerjaan ibu" required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('pekerjaan_ibu'); ?>
                                        </div>
                                    </div>
                                    <div class='form-group col-md-4'>
                                        <label>No Telepon Orang Tua</label>
                                        <input type='text' name='no_telepon_ortu'
                                            class="form-control <?= ($validation->hasError('no_telepon_ortu')) ? 'is-invalid' : ''; ?>"
                                            value="<?= (old('no_telepon_ortu')) ? old('no_telepon_ortu') : $siswa['nomor_telpon_ortu'] ?>"
                                            placeholder="no telepon orang tua" required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('no_telepon_ortu'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class='form-group'>
                                    <label>Nama Wali</label>
                                    <input type='text' name='nama_wali'
                                        class="form-control <?= ($validation->hasError('nama_wali')) ? 'is-invalid' : ''; ?>"
                                        value="<?= (old('nama_wali')) ? old('nama_wali') : $siswa['nama_wali'] ?>"
                                        placeholder="nama wali" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_wali'); ?>
                                    </div>
                                </div>

                                <div class='form-group'>
                                    <label>Alamat Wali</label>
                                    <textarea type='text' name='alamat_wali' rows="3"
                                        class="form-control <?= ($validation->hasError('alamat_wali')) ? 'is-invalid' : ''; ?>"
                                        value="<?= (old('alamat_wali')) ? old('alamat_wali') : $siswa['alamat_wali'] ?>"
                                        placeholder="alamat wali"
                                        required><?= (old('alamat_wali')) ? old('alamat_wali') : $siswa['alamat_wali'] ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat_wali'); ?>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class='form-group col-md-3'>
                                        <label>No Telepon Wali</label>
                                        <input type='text' name='no_telepon_wali'
                                            class="form-control <?= ($validation->hasError('no_telepon_wali')) ? 'is-invalid' : ''; ?>"
                                            value="<?= (old('no_telepon_ortu')) ? old('no_telepon_ortu') : $siswa['nomor_telpon_wali'] ?>"
                                            placeholder="no telepon wali" required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('no_telepon_wali'); ?>
                                        </div>
                                    </div>
                                    <div class='form-group col-md-3'>
                                        <label>Pekerjaan Wali</label>
                                        <input type='text' name='pekerjaan_wali'
                                            class="form-control <?= ($validation->hasError('pekerjaan_wali')) ? 'is-invalid' : ''; ?>"
                                            value="<?= (old('pekerjaan_wali')) ? old('pekerjaan_wali') : $siswa['pekerjaan_wali'] ?>"
                                            placeholder="pekerjaan wali" required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('pekerjaan_wali'); ?>
                                        </div>
                                    </div>
                                </div>


                                <a href="<?= base_url(); ?>/siswa" class="btn btn-danger float-left">Kembali</a>

                                <button type="submit" class="btn btn-success float-right">Ubah</button>

                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<?php echo view('template/footer'); ?>