<?php
    require_once("private/database.php");
    $statement = $db->query("SELECT id FROM `laporan` ORDER BY id DESC LIMIT 1");
    // $cekk = $statement->fetch(PDO::FETCH_ASSOC);
    if ($statement->rowCount()>0) {
        foreach ($statement as $key ) {
            // get max id from tabel laporan
            $max_id = $key['id']+1;
        }
    }
    if ($statement->rowCount()<1) {
        $max_id = 100;
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-XXXXX" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>


</head>

<body>

    <div class="shadow">
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
                margin-bottom: 50px;
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
                margin-top: 30px; /* Contoh jarak atas 20px */
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
                        <li><a href="index">HOME</a></li>
                        <li class="active"><a href="">LAPOR</a></li>
                        <li><a href="lihat">LIHAT PENGADUAN</a></li>
                        <li><a href="cara">PANDUAN</a></li>
                        <li><a href="faq">ABOUT</a></li>
                        
                    </ul>
                </div>
            </div>
        </nav>


        <!-- content -->
        <div class="main-content">

            <h3>Buat Laporan</h3>
            <hr/>
            <div class="row">
                <div class="col-md-8 card-shadow-2 form-custom">
                    <form class="form-horizontal" role="form" method="post" action="private/validasi" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nomor" class="col-sm-3 control-label">Nomor Pengaduan</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-exclamation-sign"></span></div>
                                    <input type="text" class="form-control" id="nomor" name="nomor" value="<?php echo generateRandomNumber(); ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <?php
                            function generateRandomNumber() {
                                $min = 1000; // Nilai minimum nomor pengaduan
                                $max = 9999; // Nilai maksimum nomor pengaduan
                                return rand($min, $max);
                            }
                        ?>


                        <div class="form-group">
                            <label for="nama" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= @$_GET['nama'] ?>" required>
                                </div>
                                <p class="error"><?= @$_GET['namaError'] ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telpon" class="col-sm-3 control-label">Telpon</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></div>
                                    <input type="text" class="form-control" id="telpon" name="telpon" placeholder="087123456789" value="<?= @$_GET['telpon'] ?>" required>
                                </div>
                                <p class="error"><?= @$_GET['telponError'] ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-home"></span></div>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?= @$_GET['alamat'] ?>" required>
                                </div>
                                <p class="error"><?= @$_GET['alamatError'] ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tujuan" class="col-sm-3 control-label">Kategori</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-random"></span></div>
                                    <select class="form-control" name="tujuan">
                                        <option value="1">Pengemis</option>
                                        <option value="2">Tunawisma</option>
                                        <option value="3">Orang Terlantar</option>
                                        <option value="4">Gelandangan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pengaduan" class="col-sm-3 control-label">Isi Pengaduan</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></div>
                                    <textarea class="form-control" rows="4" name="pengaduan" placeholder="Tuliskan Isi Pengaduan" required><?= @$_GET['pengaduan'] ?></textarea>
                                </div>
                                <p class="error"><?= @$_GET['pengaduanError'] ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="foto" class="col-sm-3 control-label">Foto</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-camera"></span></div>
                                    <input type="file" class="form-control" id="foto" name="foto">
                                </div>
                                <p class="error"><?= @$_GET['fotoError'] ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lokasi" class="col-sm-3 control-label">Lokasi</label>
                            <div class="col-sm-9">
                                <div id="mapDiv" style="width: 650px; height: 400px;"></div>
                                <br>
                                <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi PGOT" value="<?= @$_GET['lokasi'] ?>" required>
                            </div>
                        </div>


                        <script>
                            var map = L.map('mapDiv').setView([-6.2088, 106.8456], 13); // Ganti koordinat dan level zoom sesuai kebutuhan
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                            }).addTo(map);
                            var marker;
                            map.on('click', function(e) {
                                if (marker) {
                                    map.removeLayer(marker);
                                }
                                marker = L.marker(e.latlng).addTo(map);
                                var lat = e.latlng.lat;
                                var lng = e.latlng.lng;

                                // Mengirim permintaan geocoding ke Nominatim API
                                var url = `https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`;
                                fetch(url)
                                .then(response => response.json())
                                .then(data => {
                                    var address = data.display_name;
                                    document.getElementById('lokasi').value = address; // Mengisi input dengan alamat
                                })
                                .catch(error => console.error('Error:', error));
                            });

                            if ("geolocation" in navigator) {
                                navigator.geolocation.getCurrentPosition(function(position) {
                                    var userLat = position.coords.latitude;
                                    var userLng = position.coords.longitude;
                                    map.setView([userLat, userLng], 13); // Atur peta ke lokasi pengguna
                                    marker = L.marker([userLat, userLng]).addTo(map); // Tambahkan marker pada lokasi pengguna
                                });
                            }

                        </script>

                        <div class="form-group">
                            <label for="captcha" class="col-sm-3 control-label">Captcha</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <!--menampilkan gambar captcha-->
                                    <img class="card-shadow-2" src="private/captcha.php"/> <br/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="captcha" class="col-sm-3 control-label"></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-open"></span></div>
                                    <input type="text" class="form-control" id="captcha" name="captcha" placeholder="Masukkan Captcha di Atas" value="<?= @$_GET['captcha'] ?>" required>
                                </div>
                                <p class="error"><?= @$_GET['captchaError'] ?></p>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-3">
                                <input id="submit" name="submit" type="submit" value="Kirim Pengaduan" class="btn btn-primary-custom form-shadow">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <p class="error"><em>* Catat Nomor Pengaduan Untuk Melihat Status Pengaduan</em></p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>

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


            <!-- /.section -->
            <hr>
        </div>

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

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="js/bootstrap.js"></script>

    <script type="text/javascript">
        // Pastikan ini ada di bagian bawah halaman, setelah semua elemen HTML
        document.addEventListener("DOMContentLoaded", function () {
            loadMapScenario();
        });
    </script>

</body>

</html>
