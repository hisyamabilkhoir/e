<?php echo view('template/header'); ?>
<?php echo view('template/sidebar'); ?>

<script type="text/javascript">
function detail_kelas(id) {
    console.log(id);
    $.ajax({
        url: "<?= base_url('/Kelas/detail') ?>",
        type: "GET",
        data: {
            id: id,
        },
        success: function(data) {
            console.log(data);
            $("#detail_kelas").html(data)
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
                    <h1 class="m-0 text-dark">Wali Kelas
                        <br>
                        <small>Tahun Pelajaran
                            <?= $tahunActive['tahun_awal'] . ' / ' . $tahunActive['tahun_akhir'] ?></small>
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <?php if (!session()->get('is_walas')) : ?>
            <div class="row">
                <div class="col-md-4">
                    <div class='form-group'>
                        <label>Detail Kelas</label>
                        <select name='level' class='form-control'>
                            <option value="">Pilih Kelas</option>
                            <?php foreach ($kelas as $k) : ?>
                            <option onclick="console.log(1)"><?= $k['kelas'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

            </div>
            <div class="row" id="detail_kelas">

            </div>
            <?php endif; ?>



            <?php if (session()->get('is_walas')) : ?>
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
                                            placeholder="Muhammad Hafizh">
                                    </fieldset>
                                </div>
                                <div class='form-group'>
                                    <fieldset disabled>
                                        <label>Kelas</label>
                                        <input type='text' name='class' placeholder="XII RPL" placeholder="Kelas"
                                            class='form-control' required>
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
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class='text-center'>1</td>
                                        <td class='text-center'>11</td>
                                        <td>aa</td>
                                        <td class='text-center'>
                                            L
                                        </td>
                                        <td class='text-center'>
                                            <a href="javascript:void(0)" data-toggle="modal"
                                                data-target="#modal-form-edit-student" onclick="edit_student(11)"
                                                class='btn btn-xs btn-success'>
                                                <i class='fa fa-edit'></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>15</td>
                                        <td class='text-center'>17181034</td>
                                        <td>Fatimah Azzahra</td>
                                        <td class='text-center'>
                                            P
                                        </td>
                                        <td class='text-center'>
                                            <a href="javascript:void(0)" data-toggle="modal"
                                                data-target="#modal-form-edit-student" onclick="edit_student(17181034)"
                                                class='btn btn-xs btn-success'>
                                                <i class='fa fa-edit'></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

<?php echo view('template/footer'); ?>