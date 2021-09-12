<form method="post" action="">
    <input type="hidden" name='kode' value="<?= $DetailPegawai['kode']; ?>">
    <div class="row">
        <div class='col-md-12'>

            <div class="form-row">
                <div class='form-group col-md-4'>
                    <label>Kode</label>
                    <p><?= $DetailPegawai['kode']; ?></p>
                </div>
                <div class='form-group col-md-4'>
                    <label>Nama</label>
                    <p><?= $DetailPegawai['nama']; ?></p>
                </div>
                <div class='form-group col-md-4'>
                    <label>Email</label>
                    <p><?= $DetailPegawai['akun_email']; ?></p>
                </div>
            </div>

            <div class="form-row">
                <div class='form-group col-md-4'>
                    <label>NIP</label>
                    <p><?= $DetailPegawai['nip']; ?></p>
                </div>
                <div class='form-group col-md-4'>
                    <label>Jenis Kelamin</label>
                    <?php if ($DetailPegawai['jk'] = "L") : ?>
                        <p>Laki-laki</p>
                    <?php else : ?>
                        <p>Perempuan</p>
                    <?php endif; ?>
                </div>
                <div class='form-group col-md-4'>
                    <label>Nomor Handphone</label>
                    <p><?= $DetailPegawai['no_hp']; ?></p>
                </div>
            </div>

            <div class="form-row">
                <div class='form-group col-md-4'>
                    <label>NIK</label>
                    <p><?= $DetailPegawai['nik']; ?></p>
                </div>
                <div class='form-group col-md-8'>
                    <label>Alamat</label>
                    <p><?= $DetailPegawai['alamat']; ?></p>
                </div>
            </div>

            <div class='form-group'>
                <label>Level</label>
                <?php if ($DetailPegawai['level'] = 1) : ?>
                    <p>Operator</p>
                <?php else : ?>
                    <p>Guru</p>
                <?php endif; ?>
            </div>


        </div>
    </div>

</form>