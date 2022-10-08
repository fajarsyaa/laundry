$('.alert-delete').click(function(el) {
    el.preventDefault();

    var url       = $(this).data('url');
    var content   = $(this).data('content');
    var msg       = $(this).data('msg');
    var deniedMsg = $(this).data('denied');

    if (!msg) {
        msg = 'Apakah anda yakin ingin menghapus ' + content + '?';
    }

    if (!deniedMsg) {
        deniedMsg = 'Gagal menghapus';
    }

    Swal.fire({
        title: msg,
        showDenyButton: true,
        confirmButtonText: 'Hapus',
        denyButtonText: `Batal`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            window.location = url;
        } else if (result.isDenied) {
            Swal.fire(deniedMsg, '', 'info')
        }
    })
});