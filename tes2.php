<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tes Pemrograman PT. Medika Digital Nusantara untuk seleksi pada posisi Programmer PHP Native ">
    <meta name="author" content="Sabar" >
    <meta name="keyword" content="tes, pemrograman, pt, medika, digital, nusantara, programmer, php, native">

	<title>tes</title>

	<style type="text/css">
		body {
			background-color: silver;
			margin-top: 20px;
			margin-left: 15px;
		}
	</style>
</head>
<body>
	<h3>Selamat Datang di Sistem Parkir</h3>
	<p>Silahkan isi data dibawah</p>
	<form action="" method="POST" onsubmit="return validasi(this)">
		<label>Jam Masuk</label>
		<select name="jamMasuk" id="jamMasuk">
			<option value="0"></option>
			<?php for ($i=1; $i < 25 ; $i++) { 
				echo '<option>' . $i . '</option>';
			}
			?>
		</select>
		<label>Jam Keluar</label>
		<select name="jamKeluar" id="jamKeluar">
			<option value="0"></option>
			<?php for ($i=1; $i < 25 ; $i++) { 
				echo '<option>' . $i . '</option>';
			}
			?>
		</select>
		<button type="submit" name="proses" id="proses">Proses</button>
		<a href="">Bersihkan</a>
	</form>
	
<script type="text/javascript">

	// membuat fungsi validasi
    function validasi(form){

    	// menerapkan kondisi jika jam masuk dengan value kosong
        if (form.jamMasuk.value=="0") {
            alert("Mohon mengisikan jam masuk");
            form.jamMasuk.focus();
            return(false);
        }

    	// menerapkan kondisi jika jam keluar dengan value kosong
        if (form.jamKeluar.value=="0") {
            alert("Mohon mengisikan jam keluar");
            form.jamKeluar.focus();
            return(false);
            
        }

    	// menerapkan kondisi jika jam keluar dengan value lebih kecil nilainya dari jam masuk
        if (form.jamKeluar.value <= form.jamMasuk.value) {
            alert("Jam keluar tidak boleh sebelum dibawah jam masuk");
            form.jamKeluar.focus();
            return(false);
            
        }

        return(true);
    }
</script>
</body>
</html>


<?php 
if (isset($_POST['proses'])) {

	// menampung kiriman data dari form
	$jamMasuk = $_POST['jamMasuk'];
	$jamKeluar = $_POST['jamKeluar'];

	// mendefinisikan biaya parkir
	$biayaPerjam = 2000 ;
	$biayaTambahan = 500 ;

	// menghitung jumlah jam parkir
	$parkir = $jamKeluar - $jamMasuk ;
	$biaya = $parkir * $biayaPerjam ;

	// menghitung sisa jam jika lebih dari 2 jam
	$_parkir = $parkir - 2 ;
	$_biaya = $_parkir * $biayaTambahan ;

	// menjumlahkan biaya parkir jika lebih dari 2 jam
	$biayaParkir = 2 * $biayaPerjam + $_biaya;

	// membuat fungsi rupiah
	function buatRp($angka) {
		$rupiah = "Rp " . number_format ($angka,0,',','.').".00";
		return $rupiah;
	}

	// menerapkan kondisi

	if ($parkir <= 1 ) {
		// code...
		echo "Biaya Parkir : " . buatRp($biayaPerjam) ;
	}
	else if ($parkir <= 2 ) {
		// code...
		echo "Biaya Parkir : " . buatRp($biaya) ;
	}
	else {
		echo "Biaya Parkir : " . buatRp($biayaParkir) ;
	}

}
 ?>