<?php echo view('template/header'); ?>
<?php echo view('template/sidebar'); ?>

<script type="text/javascript">
    function edit_year(id) {
        // console.log(id);
        $.ajax({
            url: "<?= base_url('/TahunPelajaran/edit') ?>",
            type: "GET",
            data: {
                id: id,
            },
            success: function(data) {
                $("#form-edit-year").html(data)
            }
        });
    }
</script>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tahun Pelajaran</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <?php if ($validation->hasError('update_awal')) { ?>
                <div class="alert alert-danger">
                    <h4><i class="icon fas fa-exclamation-triangle"></i>Update data tahun awal Error!</h4>
                    <?php echo $validation->getError('update_awal'); ?>
                </div>
            <?php } ?>
            <?php if ($validation->hasError('update_akhir')) { ?>
                <div class="alert alert-danger">
                    <h4><i class="icon fas fa-exclamation-triangle"></i>Update data tahun akhir Error!</h4>
                    <?php echo $validation->getError('update_awal'); ?>
                </div>
            <?php } ?>

            <?php if (!empty(session()->getFlashdata('warning'))) { ?>
                <div class="alert alert-warning">
                    <h4><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h4>
                    <?php echo session()->getFlashdata('warning'); ?>
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
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="modal fade" id="modal-form-edit-year">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Tahun Pelajaran</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="form-edit-year">
                        </div>
                        <div class="modal-footer justify-content-between">
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            <div class='row'>
                <div class='col-md-3'>
                    <div class='card card-info'>
                        <div class='card-header'>
                            <h3 class='card-title'>Tambah Tahun Pelajaran</h3>
                        </div>
                        <div class='card-body'>
                            <form method="post" action="<?= base_url("/TahunPelajaran/tambah"); ?>">
                                <input type="hidden" name="_token" value="KYUtK07gJNCRNSxU2pOGprYaKdAYNrnhIg8t7lwt">
                                <div class='form-group'>
                                    <label>Tahun Awal</label>
                                    <input type='text' name='awal' class='form-control <?= ($validation->hasError('awal')) ? 'is-invalid' : ''; ?>' required placeholder="Tahun Awal" value="<?= old('awal'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('awal'); ?>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label>Tahun Akhir</label>
                                    <input type='text' name='akhir' class='form-control <?= ($validation->hasError('akhir')) ? 'is-invalid' : ''; ?>' required placeholder="Tahun Akhir" value="<?= old('akhir'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('akhir'); ?>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label>
                                        <input type='checkbox' name='active' value="1">
                                        Aktif
                                    </label>
                                </div>
                                <div class='form-group'>
                                    <button type='submit' class='btn btn-info btn-block'>
                                        <i class='fa fa-plus'></i>
                                        Tambah
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='col-md-9'>
                    <div class='card card-info'>
                        <div class='card-header'>
                            <h3 class='card-title'>Data Tahun Pelajaran</h3>
                        </div>
                        <div class='card-body'>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun</th>
                                        <th>Status</th>
                                        <th>Pilihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($tahunPelajaran as $tp) : ?>
                                        <tr>
                                            <td class='text-center'><?= $i++ ?></td>
                                            <td class='text-center'> <?= $tp["tahun_awal"] . "/" . $tp["tahun_akhir"]; ?></td>
                                            <td class='text-center'>
                                                <?php
                                                echo $tp["status"] == '1' ? 'Aktif' : 'Tidak Aktif';
                                                ?>
                                            </td>
                                            <td class='text-center'>
                                                <a href="javascript:void(0)" title="Edit" data-toggle="modal" data-target="#modal-form-edit-year" onclick="edit_year(<?php echo $tp['id'] ?>)" class='btn btn-xs btn-success'>
                                                    <i class='fa fa-edit'></i>
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