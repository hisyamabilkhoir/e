<?php echo view('template/header'); ?>
<?php echo view('template/sidebar'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Operator
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">




            <div class='row'>
                <div class='col-md-7'>
                    <div class='card card-info'>
                        <div class='card-header'>
                            <h3 class='card-title'>Ubah Pegawai</h3>
                        </div>
                        <div class='card-body'>
                            <form method="post" action="<?= base_url("/operator/proses_ubah") ?>">
                                <?= csrf_field(); ?>
                                <input type="hidden" value="<?= $pegawai['kode'] ?>" type='text' name='kode'
                                    class="form-control">
                                <div class='form-group'>
                                    <label>Kode Pegawai</label>
                                    <input type="text" value="<?= $pegawai['kode'] ?>" type='text' name=''
                                        class="form-control" required disabled>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">NIP</label>
                                        <input type="text"
                                            class="form-control <?= ($validation->hasError('nip')) ? 'is-invalid' : ''; ?>"
                                            id="" name="nip" value="<?= (old('nip')) ? old('nip') : $pegawai['nip'] ?>"
                                            required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nip'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">NIK</label>
                                        <input type="text"
                                            class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>"
                                            id="" name="nik" value="<?= (old('nik')) ? old('nik') : $pegawai['nik'] ?>"
                                            required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nik'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label>Nama</label>
                                    <input type='text' name='nama'
                                        class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>"
                                        value="<?= (old('nama')) ? old('nama') : $pegawai['nama'] ?>" required>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class='form-group col-md-6'>
                                        <label>Email</label>
                                        <input type='email' name='email'
                                            class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>"
                                            value="<?= (old('email')) ? old('email') : $pegawai['akun_email'] ?>"
                                            required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('email'); ?>
                                        </div>
                                    </div>
                                    <div class='form-group col-md-6'>
                                        <label>Level</label>
                                        <select name='level' class='form-control'>
                                            <option <?php echo $pegawai["level"] == 1 ? "selected" : ""; ?> value="1">
                                                Operator</option>
                                            <option <?php echo $pegawai["level"] == 2 ? "selected" : ""; ?> value="2">
                                                Kepala Sekolah</option>
                                            <option <?php echo $pegawai["level"] == 3 ? "selected" : ""; ?> value="3">
                                                Waka Akademin</option>
                                            <option <?php echo $pegawai["level"] == 4 ? "selected" : ""; ?> value="4">
                                                Guru</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class='form-group col-md-6'>
                                        <label>Password</label>
                                        <input type='password' name='password'
                                            class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>"
                                            value="<?= (old('password')) ? old('password') : $pegawai['akun_password'] ?>"
                                            required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password'); ?>
                                        </div>
                                    </div>
                                    <div class='form-group col-md-6'>
                                        <label>Konfirmasi Password</label>
                                        <input type='password' name='Confirmpassword'
                                            class="form-control <?= ($validation->hasError('Confirmpassword')) ? 'is-invalid' : ''; ?>"
                                            required
                                            value="<?= (old('Confirmpassword')) ? old('Confirmpassword') : $pegawai['akun_password'] ?>"
                                            required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('Confirmpassword'); ?>
                                        </div>
                                    </div>
                                </div>

                                <a href="<?= base_url(); ?>/operator" class="btn btn-danger float-left">Kembali</a>

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