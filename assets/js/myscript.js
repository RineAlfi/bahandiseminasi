//sweetalert 2 
var flash = $('#flash').data('flash');
if (flash) {
    Swal.fire({
        icon: 'error',
        title: 'Peminjaman Barang',
        text: flash,
    })
}

var flash2 = $('#flash2').data('flash');
if (flash2) {
    Swal.fire({
        icon: 'success',
        title: 'Sukses!',
        text: flash2,
    })
}

var flash5 = $('#flash5').data('flash');
if (flash5) {
    Swal.fire({
        icon: 'error',
        title: 'Data Barang',
        text: flash5,
    })
}


//sweetalert2 tombol hapus
$(document).on('click', '#hapussatuan', function (e) {

    e.preventDefault();
    var href = $(this).attr('href')

    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Hapus Data Satuan Barang",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus data'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = href
        }
    })
})

$(document).on('click', '#hapusjenis', function (e) {

    e.preventDefault();
    var href = $(this).attr('href')

    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Hapus Data Jenis Barang",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus data'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = href;
        }
    })
})

$(document).on('click', '#hapusbarang', function (e) {

    e.preventDefault();
    var href = $(this).attr('href')

    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Hapus Data Barang",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus data'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = href;
        }
    })
})

$(document).on('click', '#hapusmasuk', function (e) {

    e.preventDefault();
    var href = $(this).attr('href')

    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Hapus Data Barang Masuk",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus data'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = href;
        }
    })
})

$(document).on('click', '#hapuskembali', function (e) {

    e.preventDefault();
    var href = $(this).attr('href')

    Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Hapus Data Barang Kembali",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus data'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = href;
        }
    })
})