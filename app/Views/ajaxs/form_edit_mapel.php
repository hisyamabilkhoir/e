<form method="post" action="<?= base_url('/MataPelajaran/edit_mapel') ?>">
    <?= csrf_field(); ?>
    <input type="hidden" name="idKelas" value="<?= $idKelas; ?>">
    <input type="hidden" name="idKelompok" value="<?= $idKelompok; ?>">
    <input type="hidden" name="idMapel" value="<?= $mapel['id']; ?>">
    <input type="hidden" name="id_tahun" value="<?= $tahunActive['id']; ?>">

    <div class='form-group'>
        <label>Mata Pelajaran</label>
        <input required type='text' name='nama_mapel' placeholder="Mata Pelajaran" class='form-control' value="<?= $mapel['nama_mapel']; ?>">
    </div>
    <div class='form-group'>
        <label>Guru</label>
        <select name='kode_guru' class='form-control' required>
            <option value=''>Pilih Guru</option>
            <?php foreach ($walas as $w) : ?>
                <option value='<?= $w["kode"]; ?>' <?= ($w['kode'] == $mapel['kode_guru']) ? 'selected' : ''; ?>><?= $w['nama']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class='form-group'>
        <button type="submit" class='btn btn-block btn-info'> Ubah
        </button>
    </div>
</form>