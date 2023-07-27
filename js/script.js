// // ambil elemen yang dibutuhkan
// var keyword = document.getElementById('keyword');
// var tombolCari = document.getElementById('tombolCari');
// var container = document.getElementById('container');

// // tambhakan event ketika keyword ditulis
// keyword.addEventListener('keyup', function() {
//     // console.log(keyword.value);

//     // buat object ajax
//     var xhr = new XMLHttpRequest();

//     // cek kesiapan ajax
//     xhr.onreadystatechange = function() {
//         if( xhr.readyState == 4 && xhr.status == 200 ) {
//             // console.log('Ajax sudah berjalan');
//             // console.log(xhr.responseText);
//             container.innerHTML = xhr.responseText;
//         }
//     }

//     // eksekusi ajax
//     xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);
//     xhr.send();
// });


// ======================== Jquery =======================
var golek = document.getElementById('golek');
var golek = document.getElementById('loader');
// var loader = document.getElementsByClassName('loader');

$(document).ready(function() {

    // hilangkan tombol cari
    $('#golek').hide();
    $('#loader').hide();
    

    // event ketika kewyord ditulis
    $('#keyword').on('keyup', function() {
        // munculkan icon loading
        // $('.loader').show(); 

        // ajax menggunakan load
        // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

        // $.get()
        $.get('../mhs/mahasiswa.php?keyword=' + $('#keyword').val(), function(data) {
            $('#container').html(data);
            $('.loader').hide();
        });
        
    });
});