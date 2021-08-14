<form method="post" action="<?= base_url('/operator/detail_pegawai'); ?>">
    <input type="hidden" name='kode' value="<?= $DetailPegawai['kode']; ?>">
    <div class="row">
        <div class='col-md-12'>
            <div class='form-group'>
                <label>kode</label>
                <input type='text' name='Dkode' placeholder="kode" class="form-control" required
                    value="<?= $DetailPegawai['kode']; ?>">
            </div>
            <div class='form-group'>
                <label>Nama</label>
                <input type='text' name='Dnama' placeholder="nama" class="form-control" required
                    value="<?= $DetailPegawai['nama']; ?>">
            </div>
            <div class='form-group'>
                <label>Nip</label>
                <input type='text' name='Dnip' placeholder="nip" class="form-control" required
                    value="<?= $DetailPegawai['nip']; ?>">
            </div>
            <div class='form-group'>
                <label>Nik</label>
                <input type='text' name='Dnik' placeholder="nik" class="form-control" required
                    value="<?= $DetailPegawai['nik']; ?>">
            </div>
            <div class='form-group'>
                <label>Email</label>
                <input type='text' name='Demail' placeholder="email" class="form-control" required
                    value="<?= $DetailPegawai['akun_email']; ?>">
            </div>
            <div class='form-group'>
                <label>Password</label>
                <input type='password' name='Dpassword' placeholder="password" class="form-control" required
                    value="<?= $DetailPegawai['akun_password']; ?>">
            </div>
            <div class='form-group'>
                <label>Level</label>
                <input type='text' name='Dlevel' placeholder="level" class="form-control" required
                    value="<?= $DetailPegawai['level']; ?>">
            </div>
        </div>
    </div>
    <div class='form-group'>
        <div class='row'>
            <div class='col-md-6'>
                <button type='submit' class='btn btn-success btn-block'>
                    <i class='fa fa-save'></i>
                    Simpan
                </button>
            </div>
            <div class='col-md-6'>
                <?php if ($DetailPegawai["status"] != 1) : ?>
                <a href="<?= base_url('TahunPelajaran/hapus/' . $tahunPelajaran['id']); ?>"
                    class='btn btn-block btn-danger'
                    onclick="return confirm('Yakin Hapus Tahun Ajarah <?= $tahunPelajaran['tahun_awal'] . ' / ' . $tahunPelajaran['tahun_akhir']; ?>')">
                    <i class='fa fa-trash'></i> Hapus
                </a>
                <?php else : ?>
                <a href="javascript:void(0)" class='btn btn-block btn-danger disabled' disabled>
                    <i class='fa fa-trash'></i> Hapus
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</form>