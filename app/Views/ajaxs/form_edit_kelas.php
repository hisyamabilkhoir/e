<form method="post" action="<?= base_url('/Kelas/update') ?>">
    <?= csrf_field(); ?>
    <input type="hidden" name='id' value="<?= $kelas['id']; ?>">
    <div class='form-group'>
        <label>Tingkat</label>
        <select name='update_tingkat' class='form-control' required>
            <option value="10" <?= ($kelas['tingkat'] == '10') ? 'selected' : ''; ?>>10</option>
            <option value="11" <?= ($kelas['tingkat'] == '11') ? 'selected' : ''; ?>>11</option>
            <option value="12" <?= ($kelas['tingkat'] == '12') ? 'selected' : ''; ?>>12</option>
        </select>
    </div>
    <div class='form-group'>
        <label>Kelas</label>
        <input type='text' name='update_kelas' placeholder="kelas" class='form-control' value="<?= $kelas['kelas']; ?>" required>
    </div>
    <div class='form-group'>
        <label>Wali Kelas</label>
        <select name='update_wali_kelas' class='form-control' required>
            <option value=''>Pilih Guru</option>
            <?php foreach ($walas as $w) : ?>
                <option value='<?= $w["kode"]; ?>' <?= ($w['kode'] == $kelas['kode_walas']) ? 'selected' : ''; ?>><?= $w['nama']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class='form-group'>
        <button type="submit" class='btn btn-block btn-info'>
            <i class='fa fa-plus'></i> Update
        </button>

        <a href="<?= base_url('Kelas/hapus/' . $kelas['id']); ?>" class='btn btn-block btn-danger' onclick="return confirm('Yakin Hapus Kelas <?= $kelas['kelas']; ?>')">
            <i class='fa fa-trash'></i> Hapus
        </a>
    </div>
</form>