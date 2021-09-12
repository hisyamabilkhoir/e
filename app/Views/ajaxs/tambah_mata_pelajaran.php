<form method="post" action="<?= base_url('/matapelajaran/proses_manage') ?>">
    <?= csrf_field(); ?>
    <input type="hidden" name="id_kelompok_mapel_kelas" value="<?= $idKelompokMapel; ?>">
    <input type="hidden" name="id_kelas" value="<?= $idKelas ?>">
    <input type="hidden" name="id_tahun" value="<?= $tahunActive['id']; ?>">

    <div class='form-group'>
        <label>Mata Pelajaran</label>
        <input required type='text' name='nama_mapel' placeholder="Mata Pelajaran" class='form-control'>
    </div>
    <div class='form-group'>
        <label>Guru</label>
        <select name='kode_guru' class='form-control' required>
            <option value=''>Pilih Guru</option>
            <?php foreach ($walas as $w) : ?>
                <option value='<?= $w["kode"]; ?>'><?= $w['nama']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class='form-group'>
        <button type="submit" class='btn btn-block btn-info'>
            <i class='fa fa-plus'></i> Tambah
        </button>
    </div>
</form>