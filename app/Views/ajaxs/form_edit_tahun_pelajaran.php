<form method="post" action="<?= base_url('/TahunPelajaran/update'); ?>">
    <input type="hidden" name='id' value="<?= $tahunPelajaran['id']; ?>">
    <div class='form-group'>
        <label>Tahun Awal</label>
        <input type='text' name='update_awal' value="<?= $tahunPelajaran['tahun_awal'] ?>" class='form-control' required placeholder="Tahun Awal">
    </div>
    <div class='form-group'>
        <label>Tahun Akhir</label>
        <input type='text' name='update_akhir' value="<?= $tahunPelajaran['tahun_akhir']; ?>" class='form-control' required placeholder="Tahun Akhir">
    </div>
    <div class='form-group'>
        <label>
            <?php if ($tahunPelajaran["status"] == 1) : ?>
                <input checked type='checkbox' name='active' value="1">
            <?php else :  ?>
                <input type='checkbox' name='active' value="1">
            <?php endif; ?>
            Aktif
        </label>
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
                <?php if ($tahunPelajaran["status"] != 1) : ?>
                    <a href="<?= base_url('TahunPelajaran/hapus/' . $tahunPelajaran['id']); ?>" class='btn btn-block btn-danger' onclick="return confirm('Yakin Hapus Tahun Ajarah <?= $tahunPelajaran['tahun_awal'] . ' / ' . $tahunPelajaran['tahun_akhir']; ?>')">
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