<?php echo view('template/header'); ?>
<?php echo view('template/sidebar'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Operator
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
                            <h3 class='card-title'>Tambah Pegawai</h3>
                        </div>
                        <div class='card-body'>
                            <form method="post" action="http://localhost/aklas/classes/add">
                                <div class='form-group'>
                                    <label>Nama</label>
                                    <input type='text' name='nama' placeholder="Nama" class='form-control' required>
                                </div>
                                <div class='form-group'>
                                    <label>Email</label>
                                    <input type='email' name='email' placeholder="Email" class='form-control' required>
                                </div>
                                <div class='form-group'>
                                    <label>Tingkat</label>
                                    <select name='tingkat' class='form-control'>
                                        <option value="guru">Guru</option>
                                        <option value="waka_akademik">Waka Akademik</option>
                                        <option value="kepala_sekolah">Kepala Sekolah</option>
                                        <option value="operator">Operator</option>
                                    </select>
                                </div>
                                <div class='form-group'>
                                    <label>Password</label>
                                    <input type='password' name='password' placeholder="Password" class='form-control' required>
                                </div>
                                <div class='form-group'>
                                    <label>Konfirmasi Password</label>
                                    <input type='password' name='password' placeholder="Password" class='form-control' required>
                                </div>
                                <div class='form-group'>
                                    <button type="submit" class='btn btn-block btn-info'>
                                        <i class='fa fa-plus'></i> Tambah Pegawai
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='col-md-8'>
                    <div class='card card-info'>
                        <div class='card-header'>
                            <h3 class='card-title'>Data Pegawai</h3>
                        </div>
                        <div class='card-body'>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
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
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-form-edit-student" onclick="edit_student(11)" class='btn btn-xs btn-success'>
                                                <i class='fa fa-edit'></i>
                                            </a>
                                            <!-- <a href="http://localhost/aklas/student/11/manage" class='btn btn-xs btn-success' title="Kelola Data Siswa">
                                    <i class='fa fa-cog'></i>
                                </a> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>2</td>
                                        <td class='text-center'>17181004</td>
                                        <td>Achmad Wildan Alfarizky</td>
                                        <td class='text-center'>
                                            L
                                        </td>
                                        <td class='text-center'>
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-form-edit-student" onclick="edit_student(17181004)" class='btn btn-xs btn-success'>
                                                <i class='fa fa-edit'></i>
                                            </a>
                                            <!-- <a href="http://localhost/aklas/student/17181004/manage" class='btn btn-xs btn-success' title="Kelola Data Siswa">
                                    <i class='fa fa-cog'></i>
                                </a> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>3</td>
                                        <td class='text-center'>17181007</td>
                                        <td>Adjie Bintang Wicaksono</td>
                                        <td class='text-center'>
                                            L
                                        </td>
                                        <td class='text-center'>
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-form-edit-student" onclick="edit_student(17181007)" class='btn btn-xs btn-success'>
                                                <i class='fa fa-edit'></i>
                                            </a>
                                            <!-- <a href="http://localhost/aklas/student/17181007/manage" class='btn btn-xs btn-success' title="Kelola Data Siswa">
                                    <i class='fa fa-cog'></i>
                                </a> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>4</td>
                                        <td class='text-center'>17181010</td>
                                        <td>Ahmad Fauzi</td>
                                        <td class='text-center'>
                                            L
                                        </td>
                                        <td class='text-center'>
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-form-edit-student" onclick="edit_student(17181010)" class='btn btn-xs btn-success'>
                                                <i class='fa fa-edit'></i>
                                            </a>
                                            <!-- <a href="http://localhost/aklas/student/17181010/manage" class='btn btn-xs btn-success' title="Kelola Data Siswa">
                                    <i class='fa fa-cog'></i>
                                </a> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>5</td>
                                        <td class='text-center'>17181012</td>
                                        <td>Ahmad Zakaria</td>
                                        <td class='text-center'>
                                            L
                                        </td>
                                        <td class='text-center'>
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-form-edit-student" onclick="edit_student(17181012)" class='btn btn-xs btn-success'>
                                                <i class='fa fa-edit'></i>
                                            </a>
                                            <!-- <a href="http://localhost/aklas/student/17181012/manage" class='btn btn-xs btn-success' title="Kelola Data Siswa">
                                    <i class='fa fa-cog'></i>
                                </a> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>6</td>
                                        <td class='text-center'>17181013</td>
                                        <td>Aina Salsabila</td>
                                        <td class='text-center'>
                                            P
                                        </td>
                                        <td class='text-center'>
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-form-edit-student" onclick="edit_student(17181013)" class='btn btn-xs btn-success'>
                                                <i class='fa fa-edit'></i>
                                            </a>
                                            <!-- <a href="http://localhost/aklas/student/17181013/manage" class='btn btn-xs btn-success' title="Kelola Data Siswa">
                                    <i class='fa fa-cog'></i>
                                </a> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>7</td>
                                        <td class='text-center'>17181014</td>
                                        <td>Alfarrel Rizki Setiawan</td>
                                        <td class='text-center'>
                                            L
                                        </td>
                                        <td class='text-center'>
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-form-edit-student" onclick="edit_student(17181014)" class='btn btn-xs btn-success'>
                                                <i class='fa fa-edit'></i>
                                            </a>
                                            <!-- <a href="http://localhost/aklas/student/17181014/manage" class='btn btn-xs btn-success' title="Kelola Data Siswa">
                                    <i class='fa fa-cog'></i>
                                </a> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>8</td>
                                        <td class='text-center'>17181020</td>
                                        <td>Aria Pratama</td>
                                        <td class='text-center'>
                                            L
                                        </td>
                                        <td class='text-center'>
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-form-edit-student" onclick="edit_student(17181020)" class='btn btn-xs btn-success'>
                                                <i class='fa fa-edit'></i>
                                            </a>
                                            <!-- <a href="http://localhost/aklas/student/17181020/manage" class='btn btn-xs btn-success' title="Kelola Data Siswa">
                                    <i class='fa fa-cog'></i>
                                </a> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>9</td>
                                        <td class='text-center'>17181025</td>
                                        <td>Chandra Maulana Khalim</td>
                                        <td class='text-center'>
                                            L
                                        </td>
                                        <td class='text-center'>
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-form-edit-student" onclick="edit_student(17181025)" class='btn btn-xs btn-success'>
                                                <i class='fa fa-edit'></i>
                                            </a>
                                            <!-- <a href="http://localhost/aklas/student/17181025/manage" class='btn btn-xs btn-success' title="Kelola Data Siswa">
                                    <i class='fa fa-cog'></i>
                                </a> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>10</td>
                                        <td class='text-center'>17181113</td>
                                        <td>Denvin Adhi Syahputra</td>
                                        <td class='text-center'>
                                            L
                                        </td>
                                        <td class='text-center'>
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-form-edit-student" onclick="edit_student(17181113)" class='btn btn-xs btn-success'>
                                                <i class='fa fa-edit'></i>
                                            </a>
                                            <!-- <a href="http://localhost/aklas/student/17181113/manage" class='btn btn-xs btn-success' title="Kelola Data Siswa">
                                    <i class='fa fa-cog'></i>
                                </a> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>11</td>
                                        <td class='text-center'>17181028</td>
                                        <td>Dheby Silvia Andryani Putri</td>
                                        <td class='text-center'>
                                            P
                                        </td>
                                        <td class='text-center'>
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-form-edit-student" onclick="edit_student(17181028)" class='btn btn-xs btn-success'>
                                                <i class='fa fa-edit'></i>
                                            </a>
                                            <!-- <a href="http://localhost/aklas/student/17181028/manage" class='btn btn-xs btn-success' title="Kelola Data Siswa">
                                    <i class='fa fa-cog'></i>
                                </a> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>12</td>
                                        <td class='text-center'>17181029</td>
                                        <td>Dinar Nurjaman</td>
                                        <td class='text-center'>
                                            L
                                        </td>
                                        <td class='text-center'>
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-form-edit-student" onclick="edit_student(17181029)" class='btn btn-xs btn-success'>
                                                <i class='fa fa-edit'></i>
                                            </a>
                                            <!-- <a href="http://localhost/aklas/student/17181029/manage" class='btn btn-xs btn-success' title="Kelola Data Siswa">
                                    <i class='fa fa-cog'></i>
                                </a> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>13</td>
                                        <td class='text-center'>17181101</td>
                                        <td>Elang Luthfi Noveladzani</td>
                                        <td class='text-center'>
                                            L
                                        </td>
                                        <td class='text-center'>
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-form-edit-student" onclick="edit_student(17181101)" class='btn btn-xs btn-success'>
                                                <i class='fa fa-edit'></i>
                                            </a>
                                            <!-- <a href="http://localhost/aklas/student/17181101/manage" class='btn btn-xs btn-success' title="Kelola Data Siswa">
                                    <i class='fa fa-cog'></i>
                                </a> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='text-center'>14</td>
                                        <td class='text-center'>17181032</td>
                                        <td>Fadel Muhammad</td>
                                        <td class='text-center'>
                                            L
                                        </td>
                                        <td class='text-center'>
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-form-edit-student" onclick="edit_student(17181032)" class='btn btn-xs btn-success'>
                                                <i class='fa fa-edit'></i>
                                            </a>
                                            <!-- <a href="http://localhost/aklas/student/17181032/manage" class='btn btn-xs btn-success' title="Kelola Data Siswa">
                                    <i class='fa fa-cog'></i>
                                </a> -->
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
                                            <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-form-edit-student" onclick="edit_student(17181034)" class='btn btn-xs btn-success'>
                                                <i class='fa fa-edit'></i>
                                            </a>
                                            <!-- <a href="http://localhost/aklas/student/17181034/manage" class='btn btn-xs btn-success' title="Kelola Data Siswa">
                                    <i class='fa fa-cog'></i>
                                </a> -->
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