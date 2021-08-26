<script src="<?php echo base_url('AdminLTE/jss'); ?>/sweetalert2.all.min.js">
</script>
<script src="<?php echo base_url('AdminLTE/jss'); ?>/myscript.js">
</script>

<script>
    $('.hapus-tahun-pelajaran').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        console.log('sa');
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Tahun Pelajaran Akan Dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus Data!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        })
    });
</script>

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
        <label>Titimangsa Siswa Baru</label>
        <input type='date' name='titimangsa_siswa_baru' class='form-control' required placeholder="" value="<?= $tahunPelajaran['titimangsa_siswa_baru']; ?>">
    </div>
    <div class='form-group'>
        <label>Titimangsa Semester Ganjil</label>
        <input type='date' name='titimangsa_semester_ganjil' class='form-control' required placeholder="" value="<?= $tahunPelajaran['titimangsa_semester_ganjil']; ?>">
    </div>
    <div class='form-group'>
        <label>Titimangsa Semester Genap</label>
        <input type='date' name='titimangsa_semester_genap' class='form-control' required placeholder="" value="<?= $tahunPelajaran['titimangsa_semester_genap']; ?>">
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
                    <a href="<?= base_url('TahunPelajaran/hapus/' . $tahunPelajaran['id']); ?>" class='btn btn-block btn-danger hapus-tahun-pelajaran'>
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