$(document).ready(function() {
	// hilangkan tombol cari
	$('#tombolcari').hide();

	//event ketika keyword ditulis
	$('#keyword').on('keyup', function() {

		// munculkan icon loading
		$('.loader').show();

		// ajax menggunakan load
		// fungsi load hanya bisa dipakai untuk fungsi get
		// $('#container').load('ajax/buku.php?keyword=' + $('#keyword').val());

		// ajax menggunakan $.get()
		$.get('ajax/buku.php?keyword=' + $('#keyword').val(), function(data) {

			$('#container').html(data);
			$('.loader').hide();
		});

	});
});