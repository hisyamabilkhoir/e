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
        </div><!-- /.container-fluid -->
    </div>

    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
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
                        <a class="nav-link <?= $header_tab1 ?>" id="custom-content-below-home-tab" data-toggle="pill"
                            href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home"
                            aria-selected="true">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $header_tab2 ?>" id="custom-content-below-profile-tab" data-toggle="pill"
                            href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile"
                            aria-selected="false">Kelompok Mapel</a>
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
                    <div class="<?= $class_siswa_tab ?>" id="custom-content-below-home" role="tabpanel"
                        aria-labelledby="custom-content-below-home-tab">
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
                                    <div class='col-md-4'>
                                        <div class='card card-info'>
                                            <div class='card-header'>
                                                <h3 class='card-title'>Data Siswa Belum Punya Kelas</h3>
                                            </div>
                                            <div class='card-body'>
                                                <table id="example1" class="my-3 table table-bordered table-striped">
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
                                                        <tr draggable="true" ondragstart="drag(event)"
                                                            id="<?php echo $s['kode'] ?>">
                                                            <td class='text-center'><?= $ii++; ?></td>
                                                            <td class='text-center'><?= $s['nomor_induk'] ?></td>
                                                            <td><?= $s['nama_lengkap']; ?></td>
                                                            <td>
                                                                <a href="<?= base_url('/WaliKelas/detailSiswa/' . $s['kode']) ?>"
                                                                    class="badge badge-info hapus-sekolah">Telusuri</a>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <?= $pager1->links('siswa', 'template_pagination') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-md-4 ml-5'>
                                        <div class='card card-success'>
                                            <div class='card-header'>
                                                <h3 class='card-title'>Data Kelas <?= $walas[0]['kelas'] ?></h3>
                                            </div>
                                            <div class='card-body'>
                                                <table ondrop=" drop(event)" ondragover="allowDrop(event)" id="example1"
                                                    class="my-3 table table-bordered table-striped">
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
                                                                <a href="<?= base_url('/WaliKelas/detailSiswa/' . $sk['kode']) ?>"
                                                                    class="badge badge-info hapus-sekolah">Telusuri</a>
                                                                <a href="javascript:void(0)" data-id="<?= $sk['id'] ?>"
                                                                    data-kode="<?= $sk['kode'] ?>"
                                                                    class="delete badge badge-danger hapus-sekolah">Keluarkan</a>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <?= $pager2->links('anggota_kelas', 'template_pagination') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <script>
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
                    <div class="<?= $class_kelompok_kelas_tab ?>" id="custom-content-below-profile" role="tabpanel"
                        aria-labelledby="custom-content-below-profile-tab">
                        <div class="row">
                            <div class='col-md-4'>
                                <div class='card card-info'>
                                    <div class='card-header'>
                                        <h3 class='card-title'>Tambah Kelompok Mapel</h3>
                                    </div>
                                    <div class='card-body'>
                                        <form method="post"
                                            action="<?= base_url('/matapelajaran/proses_tambah_kelompok') ?>">
                                            <?= csrf_field(); ?>

                                            <input type="hidden" name="id_kelas" value="<?= $idKelas; ?>">

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
                                        <div class="card-tools">
                                            <a href="<?= base_url(); ?>/matapelajaran/print/<?= $idKelas; ?>"
                                                class="btn btn-warning" target="_blank">
                                                <i class="fa fa-print"></i> Cetak
                                            </a>
                                        </div>
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
                                                <?php foreach ($kelas as $k) : ?>
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

        </div>
        <!-- /.card -->


    </div>
</div>
</div>


<?php echo view('template/footer'); ?>