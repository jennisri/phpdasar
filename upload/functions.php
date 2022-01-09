<?php 
//koneksi ke database
$conn =mysqli_connect("localhost", "root", "", "dasarphp");


//function query
function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)){
		$rows[] =$row;
	}
	return $rows;
}

function tambah ($book){
	global $conn;

	$judul = htmlspecialchars($book["judul"]);
	$penulis = htmlspecialchars($book["penulis"]);
	$tahunterbit = htmlspecialchars($book["tahunterbit"]);
	$hargabuku = htmlspecialchars($book["hargabuku"]);
	
	// upload gambar cover
	$cover = upload();
	if(!$cover){
		return false;
	}
	// query insert data

	$query= "INSERT INTO buku
				VALUES
				('','$judul','$penulis','$tahunterbit','$hargabuku','$cover')

				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function upload(){
	
	// mengambil $_FILES
	$namafile = $_FILES['cover']['name'];
	$ukuranfile = $_FILES['cover']['size'];
	$error = $_FILES['cover']['error'];
	$tmpName = $_FILES['cover']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload

	if ($error === 4 ){
		echo " <script>
			alert('Pilih gambar terlebih dahulu ');
		</script>";

		return false;
	}

	// cek apakah yang diupload adalah gambar atau bukan
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namafile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
		echo " <script>
			alert('Bukan Gambar');
		</script>";

		return false;
	}

	// cek jika ukurannya terlalu besar

	if ($ukuranfile > 1000000){
		echo " <script>
			alert('Ukuran Gambar Terlalu Besar');
		</script>";

		return false;
	}

	// Gambar siap diupload
	// generate nama gambar baru
	$namafilebaru = uniqid();
	$namafilebaru .= '.';
	$namafilebaru .=$ekstensiGambar;

	move_uploaded_file($tmpName, 'img/'.$namafilebaru);

	return $namafilebaru;

}

// function tambah ($book){
// 	global $conn;
// 	// tidak menggunakan $_POST karena data akan di kirim ke $book
// 	$judul =htmlspecialchars($book["judul"]);
// 	$penulis =htmlspecialchars($book["penulis"]);
// 	$tahunterbit =htmlspecialchars($book["tahunterbit"]);
// 	$hargabuku =htmlspecialchars($book["hargabuku"]);
// 	$cover =htmlspecialchars($book["cover"]);



// 	$query = "INSERT INTO buku
// 				VALUES 
// 				('','$judul','$penulis','$tahunterbit','$hargabuku','$cover')
// 				";
// 	mysqli_query($conn, $query);

// 	return mysqli_affected_rows($conn);
// }


function hapus($id) {
	global $conn ;
	$query = "DELETE FROM buku WHERE id = $id";

	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}

function ubah($book) {
	global $conn;
	$id = $book["id"];
	$judul = htmlspecialchars($book["judul"]);
	$penulis = htmlspecialchars($book["penulis"]);
	$tahunterbit = htmlspecialchars($book["tahunterbit"]);
	$hargabuku = htmlspecialchars($book["hargabuku"]);
	$coverlama = htmlspecialchars($book["coverlama"]);

	// cek apakah user pilih gambar baru atau tidak
	if($_FILES['cover']['error'] === 4){
		$cover= $coverlama;
	}else {
		$cover = upload();
	}





	// query insert data

	$query= " UPDATE buku SET 
				judul ='$judul', 
				penulis='$penulis',
				tahunterbit='$tahunterbit', 
				hargabuku='$hargabuku', 
				cover='$cover'
				WHERE id =$id
				";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);


}

// mengambil $keyword dari index.php
function cari($keyword){

	$query = "SELECT * FROM buku 
				WHERE 

			-- menggunakan LIKE karena pada saat pencarian biarpun nama yang dituliskan hanya nama depan
			-- tetapi tampilan yang muncul akan menampilkan nama yang mengandung data yang telah user inputkan
			-- penggunaan keyword merupakan data apa yang dimasukkan dalam input keyword
			-- menggunakan % pada depan dan belakang
			-- agar ketika dicari nama belakang juga ttp dieksekusi
			judul LIKE '%$keyword%' OR
			penulis LIKE '%$keyword%' OR
			tahunterbit LIKE '%$keyword%' OR
			hargabuku LIKE '%$keyword%'

	";

	return query ($query);
}






 ?>