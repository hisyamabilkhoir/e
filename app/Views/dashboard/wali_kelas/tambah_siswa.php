<?php echo view('template/header'); ?>
<?php echo view('template/sidebar'); ?>


<div class="position-fixed toast-top-right right-0 p-3" style="z-index: 99; right: 0; top: 0;">
    <div id="toast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
        <div class="toast-header">
            <img src="..." class="rounded mr-2" alt="...">
            <strong class="mr-auto">Bootstrap</strong>
            <small>11 mins ago</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            Hello, world! This is a toast message.
        </div>
    </div>
</div>

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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $ii = 1; ?>
                                            <?php foreach ($siswa as $s) : ?>
                                                <tr draggable="true" ondragstart="drag(event)" id="<?php echo $s['kode'] ?>">
                                                    <td class='text-center'><?= $ii++; ?></td>
                                                    <td class='text-center'><?= $s['nomor_induk'] ?></td>
                                                    <td><?= $s['nama_lengkap']; ?></td>
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
                                    <table id="example1" class="table table-bordered table-striped">
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
                                                <tr ondrop=" drop(event)" ondragover="allowDrop(event)">
                                                    <td class='text-center'><?= $i++ ?></td>
                                                    <td class='text-center'><?= $sk['nomor_induk'] ?></td>
                                                    <td><?= $sk['nama_lengkap'] ?></td>
                                                    <td>
                                                        <a href="<?= base_url('/WaliKelas/hapus_siswa/') . $sk['id'] ?>" class="badge badge-danger hapus-sekolah">Hapus</a>
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
        console.log(<?= $idKelas; ?>);
        $.ajax({
            url: "<?= base_url('/WaliKelas/KelasSiswa'); ?>",
            method: "POST",
            data: {
                kode: kode,
                idKelas: <?= $idKelas; ?>,
            },
            success: function(data) {
                // console.log(data);
                $(function() {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        iconColor: '#fff',
                        background: '#33ff33',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    // $('.swalDefaultSuccess').click(function() {
                    Toast.fire({
                        icon: 'success',
                        title: data,
                    })
                    // });
                });
                // toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
                // console.log(kode);
                // $('#toast').toast('show');
                // alert(data);
                // location.reload()
            }
        });
        // location.reload();
        // window.location.reload();
        // 	ev.target.appendChild(document.getElementById(data));
    }
</script>