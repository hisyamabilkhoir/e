<?php echo view('template/header'); ?>
<?php echo view('template/sidebar'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tahun Pelajaran</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
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
                            <form method="post" action="http://localhost/aklas/years/add">
                                <input type="hidden" name="_token" value="KYUtK07gJNCRNSxU2pOGprYaKdAYNrnhIg8t7lwt">
                                <div class='form-group'>
                                    <label>Tahun Pelajaran</label>
                                    <input type='text' name='year' class='form-control' required placeholder="Tahun Pelajaran">
                                    <small>Contoh : 2020 / 2021</small>
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
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class='text-center'>1</td>
                                        <td class='text-center'>2017 / 2018</td>
                                        <td class='text-center'>
                                            Aktif
                                        </td>
                                        <td class='text-center'>
                                            <a href="javascript:void(0)" title="Edit" data-toggle="modal" data-target="#modal-form-edit-year" onclick="edit_year(1)" class='btn btn-xs btn-success'>
                                                <i class='fa fa-edit'></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>2</td>
                                        <td class='text-center'>2018 / 2019</td>
                                        <td class='text-center'>
                                            Tidak Aktif
                                        </td>
                                        <td class='text-center'>
                                            <a href="javascript:void(0)" title="Edit" data-toggle="modal" data-target="#modal-form-edit-year" onclick="edit_year(2)" class='btn btn-xs btn-success'>
                                                <i class='fa fa-edit'></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>3</td>
                                        <td class='text-center'>2019 / 2020</td>
                                        <td class='text-center'>
                                            Tidak Aktif
                                        </td>
                                        <td class='text-center'>
                                            <a href="javascript:void(0)" title="Edit" data-toggle="modal" data-target="#modal-form-edit-year" onclick="edit_year(3)" class='btn btn-xs btn-success'>
                                                <i class='fa fa-edit'></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>4</td>
                                        <td class='text-center'>2020/2021</td>
                                        <td class='text-center'>
                                            Tidak Aktif
                                        </td>
                                        <td class='text-center'>
                                            <a href="javascript:void(0)" title="Edit" data-toggle="modal" data-target="#modal-form-edit-year" onclick="edit_year(4)" class='btn btn-xs btn-success'>
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

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

<?php echo view('template/footer'); ?>