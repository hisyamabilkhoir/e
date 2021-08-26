const peringatan = $('.peringatan').data('flashdata');
if (peringatan) {
    Swal.fire({
        icon: 'error',
        title: 'Tahun pelajaran harus ada yang aktif',
        text: peringatan,
        footer: ''
    });
};

$('.hapus-pegawai').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Data Pegawai Akan Dihapus!",
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

$(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.swalDefaultSuccess').click(function() {
        Toast.fire({
          icon: 'success',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
});