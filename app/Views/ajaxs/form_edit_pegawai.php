<form method="post" action="">
    <input type="hidden" name='kode' value="<?= $DetailPegawai['kode']; ?>">
    <div class="row">
        <div class='col-md-12'>
            <div class='form-group'>
                <label>kode</label>
                <input type='text' name='Dkode' placeholder="kode" class="form-control" required
                    value="<?= $DetailPegawai['kode']; ?>" disabled>
            </div>
            <div class='form-group'>
                <label>Nama</label>
                <input type='text' name='Dnama' placeholder="nama" class="form-control" required
                    value="<?= $DetailPegawai['nama']; ?>" disabled>
            </div>
            <div class='form-group'>
                <label>Nip</label>
                <input type='text' name='Dnip' placeholder="nip" class="form-control" required
                    value="<?= $DetailPegawai['nip']; ?>" disabled>
            </div>
            <div class='form-group'>
                <label>Nik</label>
                <input type='text' name='Dnik' placeholder="nik" class="form-control" required
                    value="<?= $DetailPegawai['nik']; ?>" disabled>
            </div>
            <div class='form-group'>
                <label>Email</label>
                <input type='text' name='Demail' placeholder="email" class="form-control" required
                    value="<?= $DetailPegawai['akun_email']; ?>" disabled>
            </div>
            <div class='form-group'>
                <label>Password</label>
                <input type='password' name='Dpassword' placeholder="password" class="form-control" required
                    value="<?= $DetailPegawai['akun_password']; ?>" disabled>
            </div>
            <div class='form-group'>
                <label>Level</label>
                <select name='level' class='form-control' disabled>
                    <option <?php echo $DetailPegawai["level"] == 1 ? "selected" : ""; ?>
                        value="<?= $DetailPegawai["level"]; ?>">
                        Operator</option>
                    <option <?php echo $DetailPegawai["level"] == 2 ? "selected" : ""; ?>
                        value="<?= $DetailPegawai["level"]; ?>">
                        Kepala Sekolah</option>
                    <option <?php echo $DetailPegawai["level"] == 3 ? "selected" : ""; ?>
                        value="<?= $DetailPegawai["level"]; ?>">
                        Waka Akademin</option>
                    <option <?php echo $DetailPegawai["level"] == 4 ? "selected" : ""; ?>
                        value="<?= $DetailPegawai["level"]; ?>">
                        Wali Kelas</option>
                    <option <?php echo $DetailPegawai["level"] == 5 ? "selected" : ""; ?>
                        value="<?= $DetailPegawai["level"]; ?>">
                        Guru Mapel</option>
                </select>
            </div>
        </div>
    </div>

</form>