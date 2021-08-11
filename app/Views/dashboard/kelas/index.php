<?php echo view('template/header'); ?>
<?php echo view('template/sidebar'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Data Kelas
                        <br>
                        <small>Tahun Pelajaran 2017 / 2018</small>
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
                            <h3 class='card-title'>Tambah Kelas</h3>
                        </div>
                        <div class='card-body'>
                            <form method="post" action="http://localhost/aklas/classes/add">
                                <input type="hidden" name="_token" value="KYUtK07gJNCRNSxU2pOGprYaKdAYNrnhIg8t7lwt"> <input type='hidden' name="year" value="1">
                                <div class='form-group'>
                                    <label>Tingkat</label>
                                    <select name='level' class='form-control'>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="11">12</option>
                                    </select>
                                </div>
                                <div class='form-group'>
                                    <label>Kelas</label>
                                    <input type='text' name='class' placeholder="Kelas" class='form-control' required>
                                </div>
                                <div class='form-group'>
                                    <label>Wali Kelas</label>
                                    <input type='text' name='teacher' placeholder="Wali Kelas" class='form-control' required>
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
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class='text-center'>1</td>
                                        <td class='text-center'>10</td>
                                        <td class='text-center'>X.1</td>
                                        <td>Imah Nurhalimah, S.Pd</td>
                                        <td class='text-center'>
                                            <a href="http://localhost/aklas/class/1/manage" class='btn btn-xs btn-success' title="Kelola Kelas">
                                                <i class='fa fa-cog'></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>2</td>
                                        <td class='text-center'>10</td>
                                        <td class='text-center'>X.2</td>
                                        <td>Raditya Nuzul Pradana, S.Pd</td>
                                        <td class='text-center'>
                                            <a href="http://localhost/aklas/class/2/manage" class='btn btn-xs btn-success' title="Kelola Kelas">
                                                <i class='fa fa-cog'></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>3</td>
                                        <td class='text-center'>10</td>
                                        <td class='text-center'>X.3</td>
                                        <td>Faqih Fadlullah, S.T</td>
                                        <td class='text-center'>
                                            <a href="http://localhost/aklas/class/3/manage" class='btn btn-xs btn-success' title="Kelola Kelas">
                                                <i class='fa fa-cog'></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>4</td>
                                        <td class='text-center'>11</td>
                                        <td class='text-center'>XI MM</td>
                                        <td>Iffan Ramadhan, S.Kom</td>
                                        <td class='text-center'>
                                            <a href="http://localhost/aklas/class/6/manage" class='btn btn-xs btn-success' title="Kelola Kelas">
                                                <i class='fa fa-cog'></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>5</td>
                                        <td class='text-center'>11</td>
                                        <td class='text-center'>XI RPL</td>
                                        <td>Pak Tedi</td>
                                        <td class='text-center'>
                                            <a href="http://localhost/aklas/class/4/manage" class='btn btn-xs btn-success' title="Kelola Kelas">
                                                <i class='fa fa-cog'></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>6</td>
                                        <td class='text-center'>11</td>
                                        <td class='text-center'>XI TKJ</td>
                                        <td>Nita Putriana, S.Pd</td>
                                        <td class='text-center'>
                                            <a href="http://localhost/aklas/class/5/manage" class='btn btn-xs btn-success' title="Kelola Kelas">
                                                <i class='fa fa-cog'></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>7</td>
                                        <td class='text-center'>12</td>
                                        <td class='text-center'>XII MM</td>
                                        <td>Dikdik Nurul Zanatul Awwaliyah, S.Pd</td>
                                        <td class='text-center'>
                                            <a href="http://localhost/aklas/class/9/manage" class='btn btn-xs btn-success' title="Kelola Kelas">
                                                <i class='fa fa-cog'></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>8</td>
                                        <td class='text-center'>12</td>
                                        <td class='text-center'>XII RPL</td>
                                        <td>Sri Wahyuni, S.Pd</td>
                                        <td class='text-center'>
                                            <a href="http://localhost/aklas/class/7/manage" class='btn btn-xs btn-success' title="Kelola Kelas">
                                                <i class='fa fa-cog'></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>9</td>
                                        <td class='text-center'>12</td>
                                        <td class='text-center'>XII TKJ</td>
                                        <td>Surayah, S.Pd</td>
                                        <td class='text-center'>
                                            <a href="http://localhost/aklas/class/8/manage" class='btn btn-xs btn-success' title="Kelola Kelas">
                                                <i class='fa fa-cog'></i>
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