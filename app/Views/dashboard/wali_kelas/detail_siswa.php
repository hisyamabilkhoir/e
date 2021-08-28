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
                    <div class='card card-info'>
                        <div class='card-header'>
                            <h3 class='card-title'>Form Tambah Siswa</h3>
                        </div>
                        <div class='card-body'>
                            <form method="post" action="<?= base_url("/siswa/proses_tambah") ?>">
                                <?= csrf_field(); ?>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">NIS</label>
                                        <input type="text" class="form-control" id="" name="nis" value="<?= $siswa['nomor_induk'] ?>" placeholder="nis" required disabled>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>NISN</label>
                                        <input type="text" class="form-control" id="" name="nisn" value="<?= $siswa['nisn'] ?>" placeholder="nisn" required disabled>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">NIK</label>
                                        <input type="text" class="form-control" id="" name="nik" value="<?= $siswa['nik'] ?>" placeholder="nik" required disabled>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class='form-group col-md-6'>
                                        <label>Nama Lengkap</label>
                                        <input type='text' name='nama' class="form-control" value="<?= $siswa['nama_lengkap'] ?>" placeholder="nama lengkap" required disabled>
                                    </div>
                                    <div class='form-group col-md-3'>
                                        <label>Tempat Lahir</label>
                                        <input type='text' name='tempat_lahir' class="form-control" value="<?= $siswa['tempat_lahir'] ?>" placeholder="tempat lahir" required disabled>
                                    </div>
                                    <div class='form-group col-md-3'>
                                        <label>Tanggal Lahir</label>
                                        <input type='date' name='tanggal_lahir' class="form-control" value="<?= $siswa['tgl_lahir'] ?>" placeholder="tanggal diterima" required disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class='form-group mt-2 col-md-3'>
                                        <label>Jenis Kelamin</label>
                                        <br>
                                        <label>
                                            <input type='radio' name='jk' value="L" <?php echo $siswa["jk"] == "L" ? "checked" : ""; ?>>
                                            Laki - laki
                                        </label>
                                        <label>
                                            <input type='radio' name='jk' value="P" <?php echo $siswa["jk"] == "P" ? "checked" : ""; ?>>
                                            Perempuan
                                        </label>
                                    </div>
                                    <div class='form-group mt-2 col-md-2'>
                                        <label>Agama</label>
                                        <input type='text' name='agama' class="form-control" value="<?= $siswa['agama'] ?>" placeholder="agama" required disabled>
                                    </div>
                                    <div class='form-group mt-2 col-md-5'>
                                        <label>Status Dalam Keluarga</label>
                                        <input type='text' name='status_dalam_keluarga' class="form-control" value="<?= $siswa['status_dalam_keluarga'] ?>" placeholder="status dalam keluarga" required disabled>
                                    </div>
                                    <div class='form-group mt-2 col-md-2'>
                                        <label>Anak ke</label>
                                        <input type='text' name='anak_ke' class="form-control" value="<?= $siswa['anak_ke'] ?>" placeholder="anak ke" required disabled>
                                    </div>
                                </div>

                                <div class='form-group'>
                                    <label>Alamat Siswa</label>
                                    <textarea type='text' name='alamat_siswa' rows="3" class="form-control" placeholder="alamat siswa" required disabled><?= $siswa['alamat_siswa'] ?></textarea>
                                </div>

                                <div class="form-row">
                                    <div class='form-group col-md-3'>
                                        <label>No Handphone Siswa</label>
                                        <input type='text' name='no_hp_siswa' class="form-control" value="<?= $siswa['nomor_handphone_peserta_didik'] ?>" placeholder="no handphone siswa" required disabled>
                                    </div>
                                    <div class='form-group col-md-3'>
                                        <label>Asal Sekolah</label>
                                        <input type='text' name='asal_sekolah' class="form-control" value="<?= $siswa['sekolah_asal'] ?>" placeholder="asal sekolah" required disabled>
                                    </div>
                                    <div class='form-group col-md-3'>
                                        <label>Kelas Diterima</label>
                                        <input type='text' name='kelas_diterima' class="form-control" value="<?= $siswa['kelas_diterima'] ?>" placeholder="kelas diterima" required disabled>
                                    </div>
                                    <div class='form-group col-md-3'>
                                        <label>Tanggal Diterima</label>
                                        <input type='date' name='tanggal_diterima' class="form-control" value="<?= $siswa['tgl_diterima'] ?>" placeholder="tanggal diterima" required disabled>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class='form-group col-md-6'>
                                        <label>Nama Ayah</label>
                                        <input type='text' name='nama_ayah' class="form-control" value="<?= $siswa['nama_ayah'] ?>" placeholder="nama ayah" required disabled>
                                    </div>
                                    <div class='form-group col-md-6'>
                                        <label>Nama Ibu</label>
                                        <input type='text' name='nama_ibu' class="form-control" value="<?= $siswa['nama_ibu'] ?>" placeholder="nama ibu" required disabled>
                                    </div>

                                </div>

                                <div class='form-group'>
                                    <label>Alamat Orang Tua</label>
                                    <textarea type='text' name='alamat_ortu' rows="3" class="form-control" placeholder="alamat orang tua" required disabled><?= $siswa['alamat_ortu'] ?></textarea>
                                </div>

                                <div class="form-row">
                                    <div class='form-group col-md-4'>
                                        <label>Pekerjaan Ayah</label>
                                        <input type='text' name='pekerjaan_ayah' class="form-control" value="<?= $siswa['pekerjaan_ayah'] ?>" placeholder="pekerjaan ayah" required disabled>
                                    </div>
                                    <div class='form-group col-md-4'>
                                        <label>Pekerjaan Ibu</label>
                                        <input type='text' name='pekerjaan_ibu' class="form-control" value="<?= $siswa['pekerjaan_ibu'] ?>" placeholder="pekerjaan ibu" required disabled>
                                    </div>
                                    <div class='form-group col-md-4'>
                                        <label>No Telepon Orang Tua</label>
                                        <input type='text' name='no_telepon_ortu' class="form-control" value="<?= $siswa['nomor_telpon_ortu'] ?>" placeholder="no telepon orang tua" required disabled>
                                    </div>
                                </div>

                                <div class='form-group'>
                                    <label>Nama Wali</label>
                                    <input type='text' name='nama_wali' class="form-control" value="<?= $siswa['nama_wali'] ?>" placeholder="nama wali" required disabled>
                                </div>

                                <div class='form-group'>
                                    <label>Alamat Wali</label>
                                    <textarea type='text' name='alamat_wali' rows="3" class="form-control" placeholder="alamat wali" required disabled><?= $siswa['alamat_wali'] ?></textarea>
                                </div>

                                <div class="form-row">
                                    <div class='form-group col-md-3'>
                                        <label>No Telepon Wali</label>
                                        <input type='text' name='no_telepon_wali' class="form-control" value="<?= $siswa['nomor_telpon_wali'] ?>" placeholder="no telepon wali" required disabled>
                                    </div>
                                    <div class='form-group col-md-3'>
                                        <label>Pekerjaan Wali</label>
                                        <input type='text' name='pekerjaan_wali' class="form-control" value="<?= $siswa['pekerjaan_wali'] ?>" placeholder="pekerjaan wali" required disabled>
                                    </div>
                                </div>


                                <a href="javascript:void(0)" onclick="window.history.go(-1); return false;" class="btn btn-danger float-left">Kembali</a>

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