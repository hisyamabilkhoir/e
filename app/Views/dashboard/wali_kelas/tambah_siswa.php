<?php echo view('template/header'); ?>
<?php echo view('template/sidebar'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 mt-3">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Data Siswa
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">


            <div class='row'>
                <div class='col-md-12'>
                    <div class='card card-warning'>
                        <div class='card-header'>
                            <h3 class='card-title'>
                                <h4 class="text-center"><i> Seret dan Lepaskan Data Yang Ingin di Pindahkan</i></h4>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class='card-body'>
                    <div class='row justify-content-center'>
                        <div class='col-md-4'>
                            <div class='card card-info'>
                                <div class='card-header'>
                                    <h3 class='card-title'>Data Siswa Belum Punya Kelas</h3>
                                </div>
                                <div class='card-body'>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIS</th>
                                                <th>Nama</th>
                                                <th>pilihan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $ii = 1; ?>
                                            <?php foreach ($siswa as $s) : ?>
                                                <tr draggable="true" ondragstart="drag(event)" id="<?php echo $s['kode'] ?>">
                                                    <td class='text-center'><?= $ii++; ?></td>
                                                    <td class='text-center'><?= $s['nomor_induk'] ?></td>
                                                    <td><?= $s['nama_lengkap']; ?></td>
                                                    <td>
                                                        <a href="<?= base_url('/WaliKelas/detailSiswa/' . $s['kode']) ?>" class="badge badge-info hapus-sekolah">Telusuri</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-4 ml-5'>
                            <div class='card card-success'>
                                <div class='card-header'>
                                    <h3 class='card-title'>Data Kelas <?= $walas[0]['kelas'] ?></h3>
                                </div>
                                <div class='card-body'>
                                    <table ondrop=" drop(event)" ondragover="allowDrop(event)" id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIS</th>
                                                <th>Nama</th>
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
                                                    <td>
                                                        <a href="<?= base_url('/WaliKelas/detailSiswa/' . $sk['kode']) ?>" class="badge badge-info hapus-sekolah">Telusuri</a>
                                                        <a href="javascript:void(0)" data-id="<?= $sk['id'] ?>" data-kode="<?= $sk['kode'] ?>" class="delete badge badge-danger hapus-sekolah">Keluarkan</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<?php echo view('template/footer'); ?>
<script>
    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev) {
        // console.log(ev);
        // console.log(ev.target.id);
        ev.dataTransfer.setData("id", ev.target.id);
    }

    function drop(ev) {
        ev.preventDefault();
        // console.log(ev);
        const kode = ev.dataTransfer.getData("id");
        // let id = ev.target.id;
        console.log(kode);
        // console.log(<?= $idKelas; ?>);
        $.ajax({
            url: "<?= base_url('/WaliKelas/KelasSiswa'); ?>",
            method: "POST",
            data: {
                kode: kode,
                idKelas: <?= $idKelas; ?>,
            },
            success: function(data) {
                // console.log(data);
                location.reload();
                $(function() {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        iconColor: '#fff',
                        background: '#33ff33',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    Toast.fire({
                        icon: 'success',
                        title: data,
                    })
                });
            }
        });
    }

    let del = document.querySelectorAll('.delete');
    let delItems = [].slice.call(del);
    delItems.forEach(function(item, idx) {
        item.addEventListener('click', function(e) {
            const idAnggota = this.getAttribute('data-id');
            const kodeSiswa = this.getAttribute('data-kode');
            $.ajax({
                url: "<?= base_url('/WaliKelas/deleteAnggota'); ?>",
                method: "GET",
                data: {
                    idAnggota: idAnggota,
                    kodeSiswa: kodeSiswa,
                },
                success: function(data) {
                    location.reload();
                    $(function() {
                        var Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            iconColor: '#fff',
                            background: '#33ff33',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        Toast.fire({
                            icon: 'success',
                            title: data,
                        })
                    });
                }
            });
        });
    });
    // del.forEach(item, function(e) {
    //     e.addEventListener("click", function(e) {
    //         console.log(e);
    //     });
    // });

    function cancel(idAnggota, kodeSiswa) {

    }
</script>