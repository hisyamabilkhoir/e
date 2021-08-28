<?php echo view('template/header'); ?>
<?php echo view('template/sidebar'); ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 mt-3">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Kelola Kelompok Mata Pelajaran
                        <br>
                        <small>Tahun Pelajaran
                            <?= $tahunActive['tahun_awal'] . ' / ' . $tahunActive['tahun_akhir'] ?></small>
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
                <div class='col-md-4'>
                    <div class='card card-info'>
                        <div class='card-header'>
                            <h3 class='card-title'>Tambah Kelompok Mapel</h3>
                        </div>
                        <div class='card-body'>
                            <form method="post" action="<?= base_url('/matapelajaran/proses_tambah_kelompok') ?>">
                                <?= csrf_field(); ?>

                                <div class='form-group'>
                                    <label>Nama Kelompok</label>
                                    <input required value="<?= old('nama_kelompok'); ?>" type='text'
                                        name='nama_kelompok' placeholder="Nama Kelompok"
                                        class='form-control <?= ($validation->hasError('nama_kelompok')) ? 'is-invalid' : ''; ?>'>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_kelompok'); ?>
                                    </div>
                                </div>

                                <div class='form-group'>
                                    <label>Untuk Kelas : </label>
                                    <select required name='id_kelas'
                                        class='form-control <?= ($validation->hasError('id_kelas')) ? 'is-invalid' : ''; ?>'>
                                        <option value=''>Pilih kelas</option>
                                        <?php foreach ($kelas as $k) : ?>
                                        <option value='<?= $k["id"]; ?>'><?= $k['tingkat']; ?>
                                            <?= $k['kelas']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('id_kelas'); ?>
                                    </div>
                                </div>


                                <div class='form-group'>
                                    <button type="submit" class='btn btn-block btn-info'>
                                        <i class='fa fa-plus'></i> Tambah Kelompok
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
                                        <th>Nama Kelompok</th>
                                        <th>Kelas</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $i = 1; ?>
                                    <?php foreach ($nama_kelompok as $k) : ?>
                                    <tr>
                                        <td class='text-center'><?= $i++; ?></td>
                                        <td class='text-center'><?= $k['nama_kelompok']; ?></td>
                                        <td class='text-center'>

                                            <?= $k['tingkat'] ?> <?= $k['kelas'] ?>

                                        </td>
                                        <td class='text-center'>
                                            <a href="<?= base_url(); ?>/matapelajaran/manage/<?= $k['id']; ?>"
                                                class='btn btn-xs btn-success'>
                                                <i class='fa fa-cog'></i>
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



        </div>
    </div>
</div>




<?php echo view('template/footer'); ?>