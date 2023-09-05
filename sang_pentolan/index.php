<?php
    require_once("private/database.php");
?>
<?php
// fungsi untuk merandom avatar profil
function RandomAvatar(){
    $photoAreas = array("avatar1.png", "avatar2.png", "avatar3.png", "avatar4.png", "avatar5.png", "avatar6.png", "avatar7.png", "avatar8.png", "avatar9.png", "avatar10.png", "avatar11.png");
    $randomNumber = array_rand($photoAreas);
    $randomImage = $photoAreas[$randomNumber];
    echo $randomImage;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>SANg PENTOLAN | DINSOSDALDUKKBP3A</title>
    <link rel="shortcut icon" href="images/Purbalingga.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- font Awesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Main Styles CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.js"></script>
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.min.css">

    <style type="text/css">
        .headline {
            text-align: center;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
            padding-top: 40px;
        }

        h1 {
            margin-top: 0;
            color: #333333;
        }

        .welcome {
            color: #666666;
        }
    </style>

</head>

<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.11';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <!--Success Modal Saved-->
    <div class="modal fade" id="successmodalclear" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm " role="document">
            <div class="modal-content bg-2">
                <div class="modal-header ">
                    <h4 class="modal-title text-center text-green">Sukses</h4>
                </div>
                <div class="modal-body">
                    <p class="text-center">Pengaduan Berhasil Di Kirim</p>
                    <p class="text-center">Untuk Mengetahui Status Pengaduan</p>
                    <p class="text-center">Silahkan Buka Menu <a href="lihat">Lihat Pengaduan</a> </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn button-green" onclick="location.href='index';" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <?php
        if(isset($_GET['status'])) {
    ?>
    <script type="text/javascript">
        $("#successmodalclear").modal();
    </script>
    <?php
        }
    ?>
    <!-- body -->
    <div class="shadow">
        <!-- navbar -->
        <style>
            /* CSS untuk mengatur ukuran logo */
            .navbar-brand img {
                width: 100px; /* Ubah lebar sesuai kebutuhan */
                height: auto; /* Tinggi akan disesuaikan secara proporsional */
                max-width: 100px;
                height: auto;
                transition: transform 0.3s; /* Efek transisi saat perubahan skala */
                padding-left: 50px;
                display: flex;
                align-items: center;
            }

            .logo-text {
                margin-left: 5px; /* Memberikan jarak antara teks dan logo */
                font-size: 18px; /* Atur ukuran teks sesuai kebutuhan */
                display: inline-block; /* Mengatur elemen teks agar inline dengan logo */
                padding-top: 10px;
                color: white;
            }
            .logo-text :hover{
                transform: scale(1.1); /* Skala gambar saat di-hover */
                transition: transform 0.3s; /* Efek transisi saat perubahan skala */
            }

            /* CSS untuk mengatur ukuran latar belakang navbar */
            .navbar {
                background-size: cover; /* Atur agar latar belakang menutupi area navbar */
                background-position: center; /* Posisikan latar belakang ke tengah */
                padding: 7.5px;
                margin-bottom: 35px;
                padding-right: 60px;

            }
            /* CSS untuk mengatur tampilan tautan navbar saat di-hover */
            .navbar-nav li a {
                color: white; /* Warna teks saat normal */
                transition: color 0.3s; /* Efek transisi saat perubahan warna */
                color: yellow; /* Warna teks saat di-hover */
            }

            /* CSS untuk mengatur tampilan logo saat di-hover */

            .navbar-brand img:hover {
                transform: scale(1.1); /* Skala gambar saat di-hover */

            }

            #mainCarousel {
                margin-top: 30px;

            }
            
        </style>

        <nav class="navbar navbar-inverse navbar-fixed form-shadow">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="">
                        <img alt="Brand" src="images/Purbalingga.png">
                        
                    </a>
                    <a class="logo-text" href="">SANg PENTOLAN</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="">HOME</a></li>
                        <li><a href="lapor">LAPOR</a></li>
                        <li><a href="lihat">LIHAT PENGADUAN</a></li>
                        <li><a href="cara">PANDUAN</a></li>
                        <li><a href="faq">ABOUT</a></li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <!-- end navbar -->

    <div class="headline">
        <h1>SANg PENTOLAN</h1>
        <h3>(Sistem Aplikasi Ngurusi Pengemis, Gelandangan, Orang Terlantar, dan Tunawisma)</h3>
        <p class="welcome">Laporkan jika anda menjumpai pengemis, gelandangan, orang terlantar, atau tunawisma. Agar penanganan pemerintah Kabupaten Purbalingga menjadi lebih efisien.</p>
    </div>

    <!-- content -->
    <div class="main-content">
        <!-- section -->
        <div class="section">
            <div class="row">
                <!-- laporan Terbaru -->
                <div class="col-md-8">
                    <br>
                    <h3 class="text-center h3-custom">Pengaduan Terbaru</h3>
                    <hr class="custom-line"/>
                    <hr>
                    <!-- scroll-laporan -->
                    <div class="scroll-laporan">
                        <?php
                        // Ambil semua record dari tabel laporan
                        $statement = $db->query("SELECT * FROM `laporan` ORDER BY id DESC");
                        foreach ($statement as $key ) {
                            $mysqldate = $key['tanggal'];
                            $phpdate = strtotime($mysqldate);
                            $tanggal = date( 'd F Y, H:i:s', $phpdate);
                            $foto    = $key['foto'];
                            $lokasi  = $key['lokasi'];
                            ?>
                            <div class="panel-body card-shadow-2">
                                <a class="media-left" href="#"><img class="img-circle img-sm form-shadow" src="images/avatar/<?php RandomAvatar(); ?>"></a>
                                <div class="media-body">
                                    <div>
                                        <h4 class="text-green profil-name" style="font-family: monospace;"><?php echo $key['nama']; ?></h4>
                                        <p class="text-muted text-sm"><i class="fa fa-th fa-fw"></i>  -  <?php echo $tanggal; ?></p>
                                    </div>
                                    <hr class="hr-nama">
                                    <p>
                                        <?php echo $key['isi']; ?>
                                    </p>
                                    
                                    <p>
                                        <?php echo "<img src='private/$key[foto]' width='100' />"; ?>
                                    </p>
                                    <p>
                                        <?php echo $key['lokasi']; ?>
                                    </p>
                                    <?php
                                        $status = $key['status'];
                                        if ($status == 'Ditanggapi') {
                                            echo '<span style="color: green;">✓ Ditanggapi</span>';
                                            // Ambil data tanggapan terkait
                                            $id_laporan = $key['id'];  // ID laporan saat ini
                                            $tanggapan_statement = $db->query("SELECT * FROM `tanggapan` WHERE id_laporan = $id_laporan");
                                            foreach ($tanggapan_statement as $tanggapan_key) {
                                                echo '<p>Tanggapan Admin: ' . $tanggapan_key['isi_tanggapan'] . '</p>';
                                            }
                                        } elseif ($status == 'Menunggu') {
                                            echo '<span style="color: orange;">- Pending</span>';
                                        // } elseif ($status == 'batal') {
                                        //     echo '<span style="color: red;">✗ Batal</span>';
                                        }
                                    ?>

                                </div>
                                <!-- media body -->
                            </div>
                            <!-- panel body -->

                            <?php
                        }
                        ?>

                    </div>
                    <!-- end scroll-laporan -->
                </div>
                <!-- End Laporan Terbaru -->

                <!-- Social Media Feed -->
                <div class="col-md-4">
                    <br>
                    <!-- header text social-feed -->
                    <h3 class="text-center h3-custom">Social Feed</h3>
                    <hr class="custom-line"/>
                    <!-- end header text social-feed -->
                    <div class="box">
                        <div class="box-icon shadow">
                            <span class="fa fa-2x fa-instagram"></span>
                        </div>
                        <div class="info">
                            <h3 class="text-center">instagram</h3>
                            <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/Cvw5cakPK4v/?hl=id" data-instgrm-version="13">Post by Dinsosdaldukkbp3a Purbalingga</blockquote>
                            <script async src="https://platform.instagram.com/en_US/embeds.js"></script>
                        </div>
                    </div>
                    <hr>
                    <div class="box">
                        <div class="box-icon shadow">
                            <span class="fa fa-2x fa-rss"></span>
                        </div>
                        <div class="info">
                            <h3 class="text-center">link</h3>
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-success"><a href="https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjwz-aDl_SAAxWUxjgGHZXXBLMQFnoECA8QAQ&url=https%3A%2F%2Fwww.purbalinggakab.go.id%2F&usg=AOvVaw3TPDJl_reeej_eWRSCv6HD&opi=89978449">Website Pemerintah Kabupaten Purbalingga</a></li>
                                <li class="list-group-item list-group-item-info"><a href="https://dinkominfo.purbalinggakab.go.id/">Website Dinkominfo Purbalingga</a></li>
                                <li class="list-group-item list-group-item-warning"><a href="https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwi_-cnT8fGAAxUZxzgGHejDA7AQFnoECA8QAQ&url=https%3A%2F%2Fdinsosdaldukkbp3a.purbalinggakab.go.id%2F&usg=AOvVaw34SI83PrGxnMSfE0OCJ-MF&opi=89978449">Website Dinsosdaldukkbp3a Purbalingga</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Social Media Feed -->
            </div>
            <!-- end row -->
        </div>
        <!-- /.section -->

        <!-- link to top -->
        <a id="top" href="#" onclick="topFunction()">
            <i class="fa fa-arrow-circle-up"></i>
        </a>
        <script>
        // When the user scrolls down 100px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};
        function scrollFunction() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                document.getElementById("top").style.display = "block";
            } else {
                document.getElementById("top").style.display = "none";
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
        </script>
        <!-- link to top -->

    </div>
    <!-- end main-content -->

    <!-- Footer -->
    <footer class="footer text-center">
        <div class="row">
            <div class="col-md-4 mb-5 mb-lg-0">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <i class="fa fa-top fa-map-marker"></i>
                    </li>
                    <li class="list-inline-item">
                        <h4 class="text-uppercase mb-4">Kantor</h4>
                    </li>
                </ul>
                <p class="mb-0">
                    Jl. Purbalingga - Klampok No.16a, Bancar, Kec. Purbalingga, Kabupaten Purbalingga
                    <br>Purbalingga, Jawa Tengah 53316
                </p>
            </div>
            <div class="col-md-4 mb-5 mb-lg-0">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <i class="fa fa-top fa-rss"></i>
                    </li>
                    <li class="list-inline-item">
                        <h4 class="text-uppercase mb-4">Sosial Media</h4>
                    </li>
                </ul>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <a class="btn btn-outline-light btn-social text-center rounded-circle" href="https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwi_-cnT8fGAAxUZxzgGHejDA7AQFnoECBkQAQ&url=https%3A%2F%2Fwww.instagram.com%2Fdinsosdaldukkbp3a.kab.pbg%2F%3Fhl%3Did&usg=AOvVaw1rz9D66G5T9mw9oK4RWbfO&opi=89978449">
                            <i class="fa fa-fw fa-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <i class="fa fa-top fa-envelope-o"></i>
                    </li>
                    <li class="list-inline-item">
                        <h4 class="text-uppercase mb-4">Kontak</h4>
                    </li>
                </ul>
                <p class="mb-0">
                    
                </p>
            </div>
        </div>
    </footer>
    <!-- /footer -->

    <div class="copyright py-4 text-center text-white">
        <small>&copy; | 2023 Dinsosdaldukkbp3a Purbalingga</small>
    </div>
    <!-- shadow -->
</div>

</body>
</html>
