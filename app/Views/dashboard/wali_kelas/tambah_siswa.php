<?php echo view('template/header'); ?>
<?php echo view('template/sidebar'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 mt-3">
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->


            <?php
            if (!empty(session()->getFlashdata('msg'))) { ?>
                <div class="alert p-4 alert-success">
                    <h4><i class="icon fas fa-check"></i> Selamat!</h4>
                    <h6><?php echo session()->getFlashdata('msg'); ?></h6>
                </div>
            <?php } ?>
            <?php
            if (!empty(session()->getFlashdata('success'))) { ?>
                <div class="alert p-4 alert-success">
                    <h4><i class="icon fas fa-check"></i> Selamat!</h4>
                    <h6><?php echo session()->getFlashdata('success'); ?></h6>
                </div>
            <?php } ?>
            <?php if ($validation->hasError('nama_mapel')) { ?>
                <div class="alert alert-danger">
                    <h4><i class="icon fas fa-exclamation-triangle"></i>Tambah Mata Pelajaran Error!</h4>
                    <?php echo $validation->getError('nama_mapel'); ?>
                </div>
            <?php } ?>
            <?php if ($validation->hasError('nama_kelompok')) { ?>
                <div class="alert alert-danger">
                    <h4><i class="icon fas fa-exclamation-triangle"></i>Kelompok Mata Pelajaran Error!</h4>
                    <?php echo $validation->getError('nama_kelompok'); ?>
                </div>
            <?php } ?>
        </div><!-- /.container-fluid -->
    </div>

    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="modal fade" id="modal-form-mapel">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header text-gray-100" style="background-color: #17a2b8; color: white;">
                            <h4 class="modal-title"></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="form-mapel">
                        </div>
                        <div class="modal-footer justify-content-between">
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            <div class="card-body card">
                <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                    <?php
                    if (isset($_GET['active'])) {
                        if ($_GET['active'] === "custom-content-below-profile") {
                            $header_tab1 = "";
                            $header_tab2 = "active";
                        } else {
                            $header_tab1 = "active";
                            $header_tab2 = "";
                        }
                    } else {
                        $header_tab1 = "active";
                        $header_tab2 = "";
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $header_tab1 ?>" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $header_tab2 ?>" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Mata Pelajaran</a>
                    </li>
                </ul>
                <div class="tab-content mt-4" id="custom-content-below-tabContent">
                    <?php
                    if (isset($_GET['active'])) {
                        if ($_GET['active'] === "custom-content-below-home") {
                            $class_siswa_tab = "tab-pane fade active show";
                        } else {
                            $class_siswa_tab = "tab-pane fade";
                        }
                    } else {
                        $class_siswa_tab = "tab-pane fade active show";
                    }
                    ?>
                    <div class="<?= $class_siswa_tab ?>" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                        <div class='row'>
                            <div class='col-md-12'>
                                <div class='card card-warning'>
                                    <div class='card-header'>
                                        <h3 class='card-title'>
                                            <h4 class="text-center"><i> Seret dan Lepaskan Data Yang Ingin di
                                                    Pindahkan</i></h4>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class='card-body'>
                                <div class='row justify-content-center'>
                                    <div class='col-md-6'>
                                        <div class='card card-info'>
                                            <div class='card-header'>
                                                <h3 class='card-title'>Data Siswa Belum Punya Kelas</h3>
                                            </div>
                                            <div class='card-body'>
                                                <table id="siswa" class="my-3 table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>NIS</th>
                                                            <th>Nama</th>
                                                            <th>pilihan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $ii = 1; ?>
                                                        <?php foreach ($siswa as $s) : ?>
                                                            <tr draggable="true" ondragstart="drag(event)" id="<?php echo $s['kode'] ?>">
                                                                <td class='text-center'><?= $ii++; ?></td>
                                                                <td class='text-center'><?= $s['nomor_induk'] ?></td>
                                                                <td><?= $s['nama_lengkap']; ?></td>
                                                                <td>
                                                                    <a href="<?= base_url('/WaliKelas/detailSiswa/' . $s['kode']) ?>" class="badge badge-info hapus-sekolah">Telusuri</a>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-md-6'>
                                        <div class='card card-success'>
                                            <div class='card-header'>
                                                <h3 class='card-title'>Data Kelas <?= $walas[0]['kelas'] ?></h3>
                                            </div>
                                            <div class='card-body'>
                                                <table ondrop=" drop(event)" ondragover="allowDrop(event)" id="kelas-siswa" class="my-3 table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>NIS</th>
                                                            <th>Nama</th>
                                                            <th>Pilihan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($semua_kelas as $sk) : ?>
                                                            <tr>
                                                                <td class='text-center'><?= $i++ ?></td>
                                                                <td class='text-center'><?= $sk['nomor_induk'] ?></td>
                                                                <td><?= $sk['nama_lengkap'] ?></td>
                                                                <td>
                                                                    <a href="<?= base_url('/WaliKelas/detailSiswa/' . $sk['kode']) ?>" class="badge badge-info hapus-sekolah">Telusuri</a>
                                                                    <a href="javascript:void(0)" data-id="<?= $sk['id'] ?>" data-kode="<?= $sk['kode'] ?>" class="delete badge badge-danger hapus-sekolah">Keluarkan</a>
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

                        <script>
                            function tambah_mapel(id, idKelas) {
                                // console.log(id);
                                $.ajax({
                                    url: "<?= base_url('/mataPelajaran/tambah') ?>",
                                    type: "GET",
                                    data: {
                                        id: id,
                                        idKelas: idKelas,
                                    },
                                    success: function(data) {
                                        $(".modal-title").html("Tambah Mata Pelajaran")
                                        $("#form-mapel").html(data)
                                    }
                                });
                            }

                            function edit_mapel(id, idKelas, idKelompok) {
                                $.ajax({
                                    url: "<?= base_url('/mataPelajaran/edit') ?>",
                                    type: "GET",
                                    data: {
                                        id: id,
                                        idKelas: idKelas,
                                        idKelompok: idKelompok,
                                    },
                                    success: function(data) {
                                        $(".modal-title").html("Edit Mata Pelajaran")
                                        $("#form-mapel").html(data)
                                    }
                                });
                            }

                            function edit_kelompok_mapel(id, idKelas) {
                                $.ajax({
                                    url: "<?= base_url('/kelompokMapel/edit') ?>",
                                    type: "GET",
                                    data: {
                                        id: id,
                                        idKelas: idKelas,
                                    },
                                    success: function(data) {
                                        $(".modal-title").html("Edit Kelompok Mata Pelajaran")
                                        $("#form-mapel").html(data)
                                    }
                                });
                            }

                            function allowDrop(ev) {
                                // console.log(ev);
                                ev.preventDefault();
                            }

                            function drag(ev) {
                                // console.log(ev);
                                // console.log(ev.target.id);
                                ev.dataTransfer.setData("id", ev.target.id);
                            }

                            function drop(ev) {
                                ev.preventDefault();
                                // console.log(ev);
                                const kode = ev.dataTransfer.getData("id");
                                // let id = ev.target.id;
                                // console.log(kode);
                                if (kode) {
                                    $.ajax({
                                        url: "<?= base_url('/WaliKelas/KelasSiswa'); ?>",
                                        method: "POST",
                                        data: {
                                            kode: kode,
                                            idKelas: <?= $idKelas; ?>,
                                        },
                                        success: function(data) {
                                            // console.log(data);
                                            $(function() {
                                                var Toast = Swal.mixin({
                                                    toast: true,
                                                    position: 'top-end',
                                                    iconColor: '#fff',
                                                    background: '#33ff33',
                                                    showConfirmButton: false,
                                                    timer: 3000
                                                });
                                                Toast.fire({
                                                    icon: 'success',
                                                    title: data,
                                                })
                                            });
                                            location.reload();
                                        }
                                    });
                                }

                            }

                            let del = document.querySelectorAll('.delete');
                            let delItems = [].slice.call(del);
                            delItems.forEach(function(item, idx) {
                                item.addEventListener('click', function(e) {
                                    const idAnggota = this.getAttribute('data-id');
                                    const kodeSiswa = this.getAttribute('data-kode');
                                    $.ajax({
                                        url: "<?= base_url('/WaliKelas/deleteAnggota'); ?>",
                                        method: "GET",
                                        data: {
                                            idAnggota: idAnggota,
                                            kodeSiswa: kodeSiswa,
                                        },
                                        success: function(data) {
                                            $(function() {
                                                var Toast = Swal.mixin({
                                                    toast: true,
                                                    position: 'top-end',
                                                    iconColor: '#fff',
                                                    background: '#33ff33',
                                                    showConfirmButton: false,
                                                    timer: 3000
                                                });
                                                Toast.fire({
                                                    icon: 'success',
                                                    title: data,
                                                })
                                            });
                                            location.reload();
                                        }
                                    });
                                });
                            });
                        </script>
                    </div>
                    <?php
                    if (isset($_GET['active'])) {
                        if ($_GET['active'] === "custom-content-below-profile") {
                            $class_kelompok_kelas_tab = "tab-pane fade active show";
                        } else {
                            $class_kelompok_kelas_tab = "tab-pane fade";
                        }
                    } else {
                        $class_kelompok_kelas_tab = "tab-pane fade";
                    }
                    ?>
                    <div class="<?= $class_kelompok_kelas_tab ?>" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                        <form method="post" action="<?= base_url('/matapelajaran/proses_tambah_kelompok') ?>">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <input type="hidden" name="id_kelas" value="<?= $idKelas; ?>">
                                <div class="col-md-10">
                                    <div class='form-group'>
                                        <label>Tambah Kelompok</label>
                                        <input required type='text' name='nama_kelompok' placeholder="Nama Kelompok" class='form-control'>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class='form-group'>
                                        <label>&nbsp;</label>
                                        <button type="submit" class='btn btn-block btn-info'>
                                            <i class='fa fa-plus'></i> Tambah
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <?php foreach ($kelas as $km) : ?>
                                <div class="col-md-12">
                                    <div class='card card-info'>
                                        <div class='card-header'>
                                            <h3 class='card-title'><?= $km['nama_kelompok']; ?></h3>
                                            <a href="javascript:void(0)" title="Edit Kelompok Mata Pelajaran" data-toggle="modal" data-target="#modal-form-mapel" onclick="edit_kelompok_mapel(<?php echo $km['id'] . ',' . $idKelas ?>)" class='btn btn-xs float-right text-black-50 btn-info'>
                                                <i class='fa fa-edit'></i>
                                            </a>
                                            <a href="<?= base_url('MataPelajaran/hapusKelompok/' . $km['id'] . '/' . $idKelas); ?>" class='btn btn-xs btn-info text-red float-right hapus-kelompok-mapel'>
                                                <i class='fa fa-trash'></i>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <a href="javascript:void(0)" title="Tambah Mata Pelajaran" data-toggle="modal" data-target="#modal-form-mapel" onclick="tambah_mapel(<?php echo $km['id'] . ',' . $idKelas ?>)" class='btn mb-3 btn-xs btn-info'>
                                                <i class='fa fa-plus'></i> Tambah Mata Pelajaran
                                            </a>
                                            <table id="" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Mata Pelajaran</th>
                                                        <th>Guru</th>
                                                        <th>Pilihan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($km['pelajaran'] as $m) : ?>
                                                        <tr>
                                                            <td class='text-center'><?= $i++; ?></td>
                                                            <td class='text-center'><?= $m['nama_mapel']; ?></td>
                                                            <td class='text-center'><?= $m['nama']; ?></td>
                                                            <td class='text-center'>
                                                                <a href="javascript:void(0)" title="Edit Mata Pelajaran" data-toggle="modal" data-target="#modal-form-mapel" onclick="edit_mapel(<?php echo $m['id'] . ',' . $idKelas . ',' . $km['id'] ?>)" class='btn btn-xs btn-success'>
                                                                    <i class='fa fa-edit'></i>
                                                                </a>

                                                                <a href="<?= base_url('MataPelajaran/hapus/' . $m['id'] . '/' . $idKelas); ?>" class='btn btn-xs btn-danger hapus-mapel'>
                                                                    <i class='fa fa-trash'></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                            <div class="card-footer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->
</div>
</div>
</div>


<?php echo view('template/footer'); ?>
<script>
    $(document).ready(function() {
        $('#siswa').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        $('#kelas-siswa').DataTable();
    });
</script>