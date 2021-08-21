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
                            <input type="text" id="walikelas" class="form-control" placeholder="<?= $walas[0]['nama']; ?>">
                        </fieldset>
                    </div>
                    <div class='form-group'>
                        <fieldset disabled>
                            <label>Kelas</label>
                            <input type='text' name='class' placeholder="XII RPL" placeholder="<?= $walas[0]['kelas']; ?>" class='form-control'>
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
                                    <a href="" data-toggle="modal" data-target="#modal-form-edit-student" class='btn btn-xs btn-success'>
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