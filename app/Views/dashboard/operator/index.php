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
    <div class="modal-dialog modal-lg">
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
            <div class="row mb-2 mt-3">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Data Seluruh Pegawai
                    </h1>
                </div>
            </div>
            <div class="row mb-2 mt-4">
                <div class="col-sm-4">
                    <a href="<?= base_url(); ?>/operator/tambah">
                        <button type="submit" class='btn btn-info'>
                            <i class='fa fa-plus'></i> Tambah Pegawai
                        </button>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <?php
            if (!empty(session()->getFlashdata('msg'))) { ?>
                <div class="alert p-4 alert-success">
                    <h4><i class="icon fas fa-check"></i> Selamat!</h4>
                    <h6><?php echo session()->getFlashdata('msg'); ?></h6>
                </div>
            <?php } ?>


            <div class='row'>

                <div class='col-md-12'>
                    <div class='card card-info'>
                        <div class='card-header'>
                            <h2 class='card-title mt-2'>Data Pegawai</h2>
                            <div class="card-tools">
                                <form action="" method="POST">
                                    <div class="input-group input-group-sm mt-1" style="width: 190px;">
                                        <input type="text" name="keyword" class="form-control float-right" placeholder="Cari Pegawai ....">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-info">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
                                    <?php $i = 1 + (7 * ($currentPage - 1)); ?>
                                    <?php foreach ($pegawai as $p) : ?>

                                        <tr>
                                            <td class='text-center'><?= $i++ ?></td>
                                            <td class='text-center'><?= $p["nama"]; ?></td>
                                            <td><?= $p["akun_email"]; ?></td>
                                            <td class='text-center'>
                                                <?php if ($p['level'] == 1) : ?>
                                                    Operator
                                                <?php else : ?>
                                                    Guru
                                                <?php endif; ?>
                                            </td>
                                            <td class='text-center'>
                                                <a href="javascript:void(0)" title="Edit-pegawai" data-toggle="modal" data-target="#editPegawai" onclick="edit_pegawai('<?php echo $p['kode'] ?>')" class='badge badge-warning'>
                                                    detail
                                                </a>

                                                <a href="<?= base_url(); ?>/operator/ubah/<?= $p['kode']; ?>" class="badge badge-success">ubah</a>
                                                <a href="<?= base_url(); ?>/operator/hapus/<?= $p['kode']; ?>" class="badge badge-danger hapus-pegawai">Hapus</a>

                                            </td>




                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <br>
                            <?= $pager->links('pegawai', 'pegawai_pagination'); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>




<?php echo view('template/footer'); ?>