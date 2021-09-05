<?php echo view('template/header'); ?>
<?php echo view('template/sidebar'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Wali Kelas
                        <br>
                        <small>Tahun Pelajaran</small>
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
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
                            <div class='col-md-4'>
                                <div class='card card-info'>
                                    <div class='card-header'>
                                        <h3 class='card-title'>Wali Kelas</h3>
                                    </div>
                                    <div class='card-body'>
                                        <form method=" post" action="">
                                            <div class='form-group'>
                                                <fieldset disabled>
                                                    <label for="walikelas" class="form-label">Wali Kelas</label>
                                                    <input type="text" id="walikelas" class="form-control"
                                                        placeholder="<?= $walas[0]['nama']; ?>">
                                                </fieldset>
                                            </div>
                                            <div class='form-group'>
                                                <fieldset disabled>
                                                    <label>Kelas</label>
                                                    <input type='text' name='class'
                                                        placeholder="<?= $walas[0]['kelas']; ?>" class='form-control'>
                                                </fieldset>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                            <div class='col-md-8'>
                                <div class='card card-info'>
                                    <div class='card-header'>
                                        <h3 class='card-title'>Data Siswa</h3>
                                    </div>
                                    <div class='card-body'>
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIS</th>
                                                    <th>Nama</th>
                                                    <th>L/P</th>
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
                                                    <td class='text-center'>
                                                        <?= $sk['jk'] ?>
                                                    </td>
                                                    <td class='text-center'>
                                                        <a href="" data-toggle="modal"
                                                            data-target="#modal-form-edit-student"
                                                            class='btn btn-xs btn-info'>
                                                            Telusuri
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
                            <div class='col-md-12'>
                                <div class='card card-info'>
                                    <div class='card-header'>
                                        <h3 class='card-title'>Tambah Kelompok Mapel</h3>
                                    </div>
                                    <div class='card-body'>
                                        <table class="table table-bordered" style="font-size:11px">
                                            <thead>
                                                <tr>
                                                    <th class='text-center' rowspan='3'>No</th>
                                                    <th class='text-center' rowspan='3'>NIS</th>
                                                    <th class='text-center' rowspan='3'>Nama</th>
                                                    <th class='text-center' rowspan='3'></th>
                                                    <th class='text-center' colspan='3'>Ketuntasan Nilai</th>
                                                    <th class='text-center' colspan='5'>Penilaian Sikap</th>
                                                    <th class='text-center' colspan='5'>Penilaian Keseharian</th>
                                                    <th class='text-center' rowspan='3'>Total<br>Bobot Evaluasi</th>
                                                    <th class='text-center' rowspan='3'></th>
                                                </tr>
                                                <tr>
                                                    <th class='text-center'>Rata<sup>2</sup> Rapor</th>
                                                    <th class='text-center'>Pramuka</th>
                                                    <th class='text-center'>Prakerin</th>
                                                    <th class='text-center'>Walas</th>
                                                    <th class='text-center'>BK</th>
                                                    <th class='text-center'>PAI</th>
                                                    <th class='text-center'>PKN</th>
                                                    <th class='text-center'>Mapel</th>
                                                    <th class='text-center'>Walas</th>
                                                    <th class='text-center'>BK</th>
                                                    <th class='text-center'>PAI</th>
                                                    <th class='text-center'>PKN</th>
                                                    <th class='text-center'>Mapel</th>
                                                </tr>
                                                <tr>
                                                    <th class='text-center'></th>
                                                    <th class='text-center'></th>
                                                    <th class='text-center'></th>
                                                    <th class='text-center'></th>
                                                    <th class='text-center'></th>
                                                    <th class='text-center'></th>
                                                    <th class='text-center'></th>
                                                    <th class='text-center'></th>
                                                    <th class='text-center'></th>
                                                    <th class='text-center'></th>
                                                    <th class='text-center'></th>
                                                    <th class='text-center'></th>
                                                    <th class='text-center'></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $m = 0; ?>


                                                <?php $m++ ?>

                                                <tr>
                                                    <td class='text-center' rowspan='2'></td>
                                                    <td class='text-center' rowspan='2'></td>
                                                    <td rowspan='2'></td>
                                                    <td>Evaluasi Faktor</td>
                                                    <td class='text-center'></td>
                                                    <td class='text-center'></td>
                                                    <td class='text-center'></td>
                                                    <td class='text-center'></td>
                                                    <td class='text-center'></td>
                                                    <td class='text-center'></td>
                                                    <td class='text-center'></td>
                                                    <td class='text-center'></td>
                                                    <td class='text-center'></td>
                                                    <td class='text-center'></td>
                                                    <td class='text-center'></td>
                                                    <td class='text-center'></td>
                                                    <td class='text-center'></td>
                                                    <td class='text-center'></td>
                                                    <td class='text-center' rowspan='2'>
                                                        <a href="javascript:void(0)" data-toggle="modal"
                                                            data-target="#modal-form-edit-member" onclick=""
                                                            class='btn btn-xs btn-success' title="Edit Anggota Kelas">
                                                            <i class='fa fa-edit'></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Bobot Evaluasi</td>
                                                    <td class='text-center'></td>
                                                    <td class='text-center'></td>
                                                    <td class='text-center'></td>
                                                    <td class='text-center'></td>
                                                    <td class='text-center'></td>
                                                    <td class='text-center'></td>
                                                    <td class='text-center'></td>
                                                    <td class='text-center'></td>
                                                    <td class='text-center'></td>
                                                    <td class='text-center'></td>
                                                    <td class='text-center'></td>
                                                    <td class='text-center'></td>
                                                    <td class='text-center'></td>
                                                    <td class='text-center'></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

<?php echo view('template/footer'); ?>