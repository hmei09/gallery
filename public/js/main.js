// load BUG image
window.onload = function() {
    // Inisialisasi Masonry setelah semua gambar dimuat
    var grid = document.querySelector('.masonry');
    var masonry = new Masonry(grid, {
        // opsi Masonry
        itemSelector: '.imaged',
        percentPosition: true
    });
};

// preview image POST-Page
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#hop').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

// delete photo



