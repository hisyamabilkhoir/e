<?php echo view('template/header'); ?>
<?php echo view('template/sidebar'); ?>

<script type="text/javascript">
function edit_kelas(id) {
    // console.log(id);
    $.ajax({
        url: "<?= base_url('/Kelas/edit') ?>",
        type: "GET",
        data: {
            id: id,
        },
        success: function(data) {
            // console.log(data);
            $("#form-edit-kelas").html(data)
        }
    });
}
</script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Data Kelas
                        <br>
                        <small>Tahun Pelajaran
                            <?= $tahunActive['tahun_awal'] . ' / ' . $tahunActive['tahun_akhir'] ?></small>
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <?php if ($validation->hasError('update_tingkat')) { ?>
            <div class="alert alert-danger">
                <h4><i class="icon fas fa-exclamation-triangle"></i>Update data tingkat Error!</h4>
                <?php echo $validation->getError('update_tingkat'); ?>
            </div>
            <?php } ?>

            <?php if ($validation->hasError('update_kelas')) { ?>
            <div class="alert alert-danger">
                <h4><i class="icon fas fa-exclamation-triangle"></i>Update data kelas Error!</h4>
                <?php echo $validation->getError('update_kelas'); ?>
            </div>
            <?php } ?>

            <?php if ($validation->hasError('update_wali_kelas')) { ?>
            <div class="alert alert-danger">
                <h4><i class="icon fas fa-exclamation-triangle"></i>Update data wali kelas Error!</h4>
                <?php echo $validation->getError('update_wali_kelas'); ?>
            </div>
            <?php } ?>

            <?php if ($validation->hasError('wali_kelas')) { ?>
            <div class="alert alert-danger">
                <h4><i class="icon fas fa-exclamation-triangle"></i>Tambah data wali kelas Error!</h4>
                <?php echo $validation->getError('wali_kelas'); ?>
            </div>
            <?php } ?>

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

    <div class="modal fade" id="modal-form-edit-kelas">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Kelas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="form-edit-kelas">
                </div>
                <div class="modal-footer justify-content-between">
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
                                            <a href="javascript:void(0)" title="Edit Kelas" data-toggle="modal"
                                                data-target="#modal-form-edit-kelas"
                                                onclick="edit_kelas(<?php echo $k['id'] ?>)"
                                                class='btn btn-xs btn-success'>
                                                <i class='fa fa-edit'></i> Edit Kelas
                                            </a>
                                            <a href="<?= base_url('/WaliKelas/tambahSiswa') . '/' . $k['id'] ?>"
                                                title="Kelola Kelas" class="btn btn-xs btn-success">
                                                <i class='fa fa-user-graduate'></i> Kelola
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