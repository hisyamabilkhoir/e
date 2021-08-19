<?php echo view('template/header'); ?>
<?php echo view('template/sidebar'); ?>

<script type="text/javascript">
    function edit_pegawai(kode) {
        console.log(kode);
        $.ajax({
            url: "<?= base_url('/Operator/detail') ?>",
            type: "GET",
            data: {
                kode: kode,
            },
            success: function(data) {
                $("#form-edit-pegawai").html(data)
            }
        });
    }
</script>

<div class="modal fade" id="editPegawai">
    <div class="modal-dialog">
        <div class="modal-content border-bottom-primary bg-gray-300">
            <div class="modal-header text-gray-100" style="background-color: #17a2b8; color: white;">
                <h5 class="modal-title" id="exampleModalLabel">Detail Pegawai</h5>
                <button class="close text-gray-100" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-gray-100">×</span>
                </button>
            </div>
            <div class="modal-body" id="form-edit-pegawai">

            </div>
        </div>
    </div>
</div>

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
                <div class='col-md-4'>
                    <div class='card card-info'>
                        <div class='card-header'>
                            <h3 class='card-title'>Tambah Pegawai</h3>
                        </div>
                        <div class='card-body'>
                            <form method="post" action="<?= base_url("/Operator/tambah") ?>">
                                <?= csrf_field(); ?>
                                <div class='form-group'>
                                    <label>Nama</label>
                                    <input type='text' name='nama' placeholder="Nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" required value="<?= old('nama'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>

                                <div class='form-group'>
                                    <label>Email</label>
                                    <input type='email' name='email' placeholder="Email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" required value="<?= old('email'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label>Level</label>
                                    <select name='level' class='form-control'>
                                        <option value="1">Operator</option>
                                        <option value="2">Kepala Sekolah</option>
                                        <option value="3">Waka Akademik</option>
                                        <option value="4">Wali Kelas</option>
                                        <option value="5">Guru Mapel</option>
                                    </select>
                                </div>
                                <div class='form-group'>
                                    <label>Password</label>
                                    <input type='password' name='password' placeholder="Password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" required value="<?= old('password'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password'); ?>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label>Konfirmasi Password</label>
                                    <input type='password' name='Confirmpassword' placeholder="Confirm Password" class="form-control <?= ($validation->hasError('Confirmpassword')) ? 'is-invalid' : ''; ?>" required value="<?= old('Confirmpassword'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('Confirmpassword'); ?>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <button type="submit" class='btn btn-block btn-info'>
                                        <i class='fa fa-plus'></i> Tambah Pegawai
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='col-md-8'>
                    <div class='card card-info'>
                        <div class='card-header'>
                            <h3 class='card-title'>Data Pegawai</h3>
                        </div>
                        <div class='card-body'>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pegawai as $p) : ?>

                                        <tr>
                                            <td class='text-center'><?= $i++ ?></td>
                                            <td class='text-center'><?= $p["nama"]; ?></td>
                                            <td><?= $p["akun_email"]; ?></td>
                                            <td class='text-center'>
                                                <?php if ($p['level'] == 1) : ?>
                                                    Operator
                                                <?php endif; ?>
                                                <?php if ($p['level'] == 2) : ?>
                                                    Kepala Sekolah
                                                <?php endif; ?>
                                                <?php if ($p['level'] == 3) : ?>
                                                    Waka Akademik
                                                <?php endif; ?>
                                                <?php if ($p['level'] == 4) : ?>
                                                    Guru
                                                <?php endif; ?>
                                            </td>
                                            <td class='text-center'>
                                                <a href="javascript:void(0)" title="Edit-pegawai" data-toggle="modal" data-target="#editPegawai" onclick="edit_pegawai('<?php echo $p['kode'] ?>')" class='badge badge-warning'>
                                                    detail
                                                </a>

                                                <a href="<?= base_url(); ?>/operator/ubah/<?= $p['kode']; ?>" class="badge badge-success">ubah</a>
                                                <a href="<?= base_url(); ?>/operator/hapus/<?= $p['kode']; ?>" class="badge badge-danger hapus-sekolah">Hapus</a>

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