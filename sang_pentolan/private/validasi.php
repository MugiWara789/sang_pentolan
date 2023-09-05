<?php
	session_start();
	require_once("database.php");
	header("Location: ../index?status=success");
	// Atasi Undefined
	$nama = $email = $telpon = $alamat = $pengaduan = $captcha = $is_valid = "";
	$namaError = $emailError = $telponError = $alamatError = $pengaduanError = $captchaError = "";

    if (isset($_POST['submit'])){
        $nomor     = $_POST['nomor'];
        $nama      = $_POST['nama'];
        $telpon    = $_POST['telpon'];
        $alamat    = $_POST['alamat'];
        $tujuan    = $_POST['tujuan'];
        $pengaduan = $_POST['pengaduan'];
        $captcha   = $_POST['captcha'];

        $namafolder="gambar/"; //folder tempat menyimpan file
        if (!file_exists($tempdir))
        mkdir($tempdir,0755); 
        if (!empty($_FILES["foto"]["tmp_name"])){
            $jenis_gambar=$_FILES['foto']['type'];
         //memeriksa format gambar
        if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png"){
            $foto = $namafolder . basename($_FILES['foto']['name']);
        
        //mengupload gambar dan update row table database dengan path folder dan nama image
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $foto)) {

            $sql = "INSERT INTO `laporan` (`id`, `nama`, `telpon`, `alamat`, `tujuan`, `isi`, `tanggal`, `foto`, `lokasi`, `status`) VALUES (:nomor, :nama, :telpon, :alamat, :tujuan, :isi, CURRENT_TIMESTAMP, :foto, :lokasi, :status)";
            $stmt = $db->prepare($sql);
            echo"
            Data berhasil disimpan <br/>
            Nama : $nama <br/>
            Kategori: $tujuan<br/>
            <br/><br/>
            <img src='$foto' height='300'>";

            //Jika gagal upload, tampilkan pesan Gagal
            } else{
            echo "Gambar gagal dikirim";
        }
            } else{
            echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
        }
            } else{
            echo "Anda belum memilih gambar";
            }
        $lokasi   = $_POST['lokasi'];
       
        $is_valid  = true;
        validate_input();
        


        if ($is_valid) {
			$sql = "INSERT INTO `laporan` (`id`, `nama`, `telpon`, `alamat`, `tujuan`, `isi`, `tanggal`, `foto`, `lokasi`, `status`) VALUES (:nomor, :nama, :telpon, :alamat, :tujuan, :isi, CURRENT_TIMESTAMP, :foto, :lokasi, :status)";
			$stmt = $db->prepare($sql);

			$stmt->bindValue(':nomor', $nomor);
			$stmt->bindValue(':nama', $nama);
			$stmt->bindValue(':telpon', $telpon);
			$stmt->bindValue(':alamat', htmlspecialchars($alamat));
			$stmt->bindValue(':tujuan', $tujuan);
			$stmt->bindValue(':isi', htmlspecialchars($pengaduan));
            $stmt->bindValue(':foto', $foto);
            $stmt->bindValue(':lokasi', $lokasi);
            
			$stmt->bindValue(':status', "Menunggu");

			$stmt->execute();
			header("Location: ../index?status=success");
        } elseif (!$is_valid) {
            header("Location: ../lapor.php?nomor=$nomor&nama=$nama&namaError=$namaError&telpon=$telpon&telponError=$telponError&alamat=$alamat&alamatError=$alamatError&pengaduan=$pengaduan&pengaduanError=$pengaduanError&captcha=$captcha&captchaError=$captchaError&foto=$foto&fotoError=$fotoError&lokasi=$lokasi&lokasiError=$lokasiError");
        }
    }

    // Fungsi Untuk Melakukan Pengecekan Dari Setiap Inputan Di Masing - masing Fungsi
    function validate_input() {
        global $nama , $telpon , $alamat , $pengaduan , $captcha , $foto , $lokasi , $is_valid;
        cek_nama($nama);
        cek_telpon($telpon);
        cek_alamat($alamat);
		cek_pengaduan($pengaduan);
        cek_captcha($captcha);
        cek_foto($foto);
        cek_lokasi($lokasi);
    }

    // validasi nama
    function cek_nama ($nama) {
        global $nama, $is_valid, $namaError;
        echo "cek_nama      : ", $nama      , "<br>";
        if (!preg_match("/^[a-zA-Z ]*$/",$nama)) { // cek nama bukan huruf
            $namaError = "Nama Hanya Boleh Huruf dan Spasi";
            $is_valid = false;
        } else { // jika nama valid kosongkan error
            $namaError = "";
        }
    }

    // validasi email
    
    // validasi telpon
    function cek_telpon($telpon) {
        global $telpon, $telponError, $is_valid;
        echo "cek_telpon    : ", $telpon    , "<br>";
        if (!preg_match("/^[0-9]*$/",$telpon)) { // cek telpon hanya boleh angka
            $telponError = "Telpon Hanya Boleh Angka";
            $is_valid = false;
        } elseif (strlen($telpon) != 12) { // cek panjang telpon harus >= 6
            $telponError = "Panjang Telpon Harus 12 Digit";
            $is_valid = false;
        } else { // jika telpon valid kosongkan error
            $telponError = "";
        }
    }

    // validasi alamat
    function cek_alamat($alamat) {
        global $alamat, $is_valid, $alamatError;
        echo "cek_alamat    : ", $alamat    , "<br>";
        if (!preg_match("/^[a-zA-Z0-9 .,]*$/",$alamat)) { // cek fullname bukan huruf
            $alamatError = "Alamat Hanya Boleh Huruf dan Angka";
            $is_valid = false;
        } else { // jika fullname valid kosongkan error
            $alamatError = "";
        }
    }

    // validasi pengaduan
    function cek_pengaduan($pengaduan) {
        global $pengaduan, $is_valid, $pengaduanError;
        echo "cek_pengaduan : ", $pengaduan , "<br>";
        if (strlen($pengaduan) > 2048) { // cek fullname bukan huruf
            $pengaduanError = "Isi Pengaduan Tidak Boleh Huruf Lebih Dari 2048 Karakter";
            $is_valid = false;
        } else { // jika pengaduan valid kosongkan error
            $pengaduanError = "";
        }
    }

    // validasi captcha
    function cek_captcha($captcha) {
        global $captcha, $is_valid, $captchaError;
        echo "cek_captcha   : ", $captcha   , "<br>";
        if ($captcha != $_SESSION['bilangan']) { // cek fullname bukan huruf
            $captchaError = "Captcha Salah atau Silahkan Reload Browser Anda";
            $is_valid = false;
        } else { // jika pengaduan valid kosongkan error
            $captchaError = "";
        }
    }
    // Memeriksa apakah file gambar diunggah
    
    function cek_foto($foto) {
        global $is_valid, $fotoError;
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $jenis_gambar = $_FILES['foto']['type'];
            if ($jenis_gambar === "image/jpeg" || $jenis_gambar === "image/jpg" || $jenis_gambar === "image/gif" || $jenis_gambar === "image/png") {
                // Proses file gambar
            } else {
                $fotoError = "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
                $is_valid = false;
            }
        } else {
            $fotoError = "Terjadi kesalahan saat mengunggah foto";
            $is_valid = false;
        }
    }

    function cek_lokasi($lokasi) {
        global $lokasi, $is_valid, $lokasiError;
        // Hapus validasi huruf dan angka
        $lokasiError = "";
    }


?>