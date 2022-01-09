// ambil elemen-elemen yang dibutuhkan
// javascript tolong carikan saya elemen yang mempunyai id keyword yang ada dalam dokuen
var keyword = document.getElementById('keyword');
var tombolcari= document.getElementById('tombolcari');
var container = document.getElementById('container');

// tambahkan event ketika keyword ditulis
keyword.addEventListener('keyup', function(){
	// console.log(keyword.value);

	// buat objek ajax
	// buat variabel
	var xhr= new XMLHttpRequest();

	// cek kesiapan ajax
	xhr.onreadystatechange =function(){
		if (xhr.readyState == 4 && xhr.status == 200){
			container.innerHTML = xhr.responseText;
			
		}
	}


	// eksekusi ajax
	// mengirim ajax ke file buku
	// xhr.open('GET', 'ajax/coba.txt', true);
	xhr.open('GET','ajax/buku.php?keyword='+ keyword.value, true);
	// untuk menjalankan ajax
	xhr.send(); 

});