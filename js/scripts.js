// var golek = document.getElementById('golek');
var loader = document.getElementsByClassName('loader');

$(document).ready(function() {

    // hilangkan tombol cari
    // $('#golek').hide();
    

    // event ketika kewyord ditulis
    $('#keyword').on('keyup', function() {
        // munculkan icon loading
        // $('.loader').show(); 

        // ajax menggunakan load
        // $('#containers').load('dosen/dosen.php?keywordz=' + $('#keywordz').val());

        // $.get()
        $.get('../dosen/dosen.php?keyword=' + $('#keyword').val(), function(data) {
            $('#container').html(data);
            $('.loader').hide();
        });
        
    });
});