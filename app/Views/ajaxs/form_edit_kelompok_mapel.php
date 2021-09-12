<form method="post" action="<?= base_url('/matapelajaran/updateKelompokMapel') ?>">
    <?= csrf_field(); ?>
    <div class="row">
        <input type="hidden" name="id_kelas" value="<?= $idKelas; ?>">
        <input type="hidden" name="id_kelompok" value="<?= $idKelompok; ?>">
        <input type="hidden" name="tahunActive" value="<?= $tahunActive['id']; ?>">

        <div class="col-md-10">
            <div class='form-group'>
                <label>Tambah Kelompok</label>
                <input required value="<?= $kelompokMapel['nama_kelompok']; ?>" type='text' name='nama_kelompok' placeholder="Nama Kelompok" class='form-control'>
            </div>
        </div>
        <div class="col-md-2">
            <div class='form-group'>
                <label>&nbsp;</label>
                <button type="submit" class='btn btn-block btn-info'>
                    <i class='fa fa-plus'></i> Tambah
                </button>
            </div>
        </div>
    </div>
</form>