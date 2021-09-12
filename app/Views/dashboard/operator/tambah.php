<?php echo view('template/header'); ?>
<?php echo view('template/sidebar'); ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 mt-3">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Tambah Pegawai
                    </h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class='row'>
                <div class='col-md-12'>
                    <div class='card card-info'>
                        <div class='card-header'>
                            <h3 class='card-title'>Tambah Pegawai</h3>
                        </div>
                        <div class='card-body'>
                            <form method="post" action="<?= base_url("/operator/proses_tambah") ?>">
                                <?= csrf_field(); ?>



                                <div class="form-group col-4">
                                    <label for="inputEmail4">NIP</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nip')) ? 'is-invalid' : ''; ?>" id="" name="nip" value="<?= (old('nip')); ?>" required placeholder="nip">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nip'); ?>
                                    </div>
                                </div>

                                <div class="form-group col-4">
                                    <label for="inputPassword4">NIK</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" id="" name="nik" value="<?= (old('nik')); ?>" required placeholder="nik">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nik'); ?>
                                    </div>
                                </div>


                                <div class='form-group col-5'>
                                    <label>Nama</label>
                                    <input type='text' name='nama' placeholder="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" required value="<?= old('nama'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>


                                <div class='form-group col-6'>
                                    <label>Email</label>
                                    <input type='email' name='email' placeholder="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" required value="<?= old('email'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </div>

                                <div class='form-group col-4'>
                                    <label>Nomor Handphone</label>
                                    <input type='text' name='no_hp' placeholder="nomor handphone" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" required value="<?= old('no_hp'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_hp'); ?>
                                    </div>
                                </div>

                                <div class='form-group mt-4 col-4'>
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

                                <div class='form-group col-7'>
                                    <label>Alamat</label>
                                    <textarea type='text' name='alamat' rows="3" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" value="<?= old('alamat'); ?>" placeholder="alamat" required><?= old('alamat'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>

                                <div class='form-group col-4'>
                                    <label>Level</label>
                                    <select name='level' class='form-control'>
                                        <option value="1">Operator</option>
                                        <option value="2">Guru</option>
                                    </select>
                                </div>



                                <div class='form-group col-5'>
                                    <label>Password</label>
                                    <input type='password' name='password' placeholder="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" required value="<?= old('password'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password'); ?>
                                    </div>
                                </div>
                                <div class='form-group col-5'>
                                    <label>Konfirmasi Password</label>
                                    <input type='password' name='Confirmpassword' placeholder="konfirmasi password" class="form-control <?= ($validation->hasError('Confirmpassword')) ? 'is-invalid' : ''; ?>" required value="<?= old('Confirmpassword'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('Confirmpassword'); ?>
                                    </div>
                                </div>

                                <br>

                                <a href="<?= base_url(); ?>/operator" class="btn btn-danger float-left">Kembali</a>

                                <button type="submit" class="btn btn-info float-right">Tambah Pegawai</button>
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