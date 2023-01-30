<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu BPS Kota Tasikmalaya</title>
    <script type="text/javascript" src="./js/jquery-3.6.3.min.js"></script>
    <script type="text/javascript" src="./js/webcam.min.js"></script>
    <script src="https://kit.fontawesome.com/aca8644bb6.js" crossorigin="anonymous"></script>
    <link href="./dist/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body class="font-lato">
    <!--Dialog Box Kamera-->
    <div class="hidden" id="dialogbox_kamera">
        <div class="fixed z-10 grid content-center w-screen h-screen bg-black bg-opacity-30 px-5">
            <div class="flex justify-center">
                <div class="relative overflow-hidden w-full sm:w-4/6 lg:w-3/6 xl:w-5/12 2xl:w-2/6 bg-white rounded-lg bg-opacity-100 px-2 sm:px-4 pt-10">
                    <button class="absolute top-0 right-0 px-4 sm:px-6 py-2" onclick="tutupKamera()">
                        <i class="fa-solid fa-xmark text-gray-200 hover:text-red-600 text-lg"></i> 
                    </button>
                    <div class="border-2 rounded-lg w-full h-80 md:h-96" id="kamera_popup"></div>
                    <canvas id="canvas" class="hidden object-cover w-full h-80"></canvas>
                    <div class="flex justify-center flex-row">
                        <button type="button" id="btn_ambil_gambar" onclick="ambilGambar()" class="bg-amber-400 text-white text-3xl font-semibold px-5 py-1 my-3 rounded-md hover:bg-amber-500">
                            <i class="fa-solid fa-camera"></i>
                        </button>
                        <button type="button" id="btn_simpan_gambar" onclick="simpanGambar()" class="hidden bg-green-500 text-white text-3xl w-14 font-semibold py-1 my-3 mx-1.5 rounded-md hover:bg-green-600">
                            <div class="flex justify-center">
                                <i class="fa-solid fa-check"></i>
                            </div>
                        </button>
                        <button type="button" id="btn_batal_gambar" onclick="batalGambar()" class="hidden bg-red-600 text-white text-3xl w-14 font-semibold px-5 py-1 my-3 mx-1.5 rounded-md hover:bg-red-700">
                            <div class="flex justify-center">
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Akhir Dialog Box Kamera-->

    <!--Dialog Box Delete Data Pengunjung-->
    <div class="hidden" id="dialogbox_hapus">
        <div class="fixed z-10 grid content-center w-screen h-screen bg-black bg-opacity-30 px-5">
            <div class="flex justify-center">
                <div class="bg-white rounded-lg w-auto px-2 sm:px-8 py-7">
                    <div class="block">
                        <p class="text-md text-center">Apakah anda yakin akan menghapus data ini?</p>
                    </div>
                    <div class="flex justify-center flex-row">
                        <button type="button" id="btn_hapus_data" class="bg-red-600 text-white font-semibold px-5 py-1 mt-6 mx-1 rounded-md hover:bg-red-700">Hapus</button>
                        <button type="button" id="btn_batal_hapus" class="bg-green-500 text-white font-semibold px-5 py-1 mt-6 mx-1 rounded-md hover:bg-green-600">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Akhir Dialog Box Delete Data Pengunjung-->
    
    <!--Container Isi-->
    <div class="bg-local bg-no-repeat bg-auto" style="background-image: url('./svg/BG Upper 1 Biggest.svg')">
        <!--Bagian Atas-->
        <div>
            <div class="grid grid-flow-row auto-rows-min gap-y-12 xl:grid-cols-5 xl:gap-12 pt-10 pb-10 lg:pb-24 px-5 sm:px-14">
                <div class="text-white xl:col-span-2">
                    <div class="flex flex-row">
                        <div class="w-auto bg-white px-14 py-2 -ml-5 sm:-ml-14 rounded-r-md">
                            <img src="./svg/BPS Kota Tasikmalaya  1.png" alt="Logo BPS Kota Tasikmalaya">
                        </div>
                    </div>
                    <h1 class="font-extrabold text-2xl sm:text-4xl font-montserrat py-5 sm:py-8">Sistem Informasi Buku Tamu</h1>
                    <p class="text-justify mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p class="text-justify mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <!--Form Pengisian Kunjungan-->
                <div class="text-slate-800 xl:col-span-3 sm:px-10 lg:px-36 xl:px-0">
                    <div class="bg-white rounded-xl drop-shadow-xl">
                        <div class="flex justify-center">
                            <h1 class="font-black text-2xl sm:text-4xl font-montserrat py-8">Formulir Kunjungan</h1>
                        </div>
                        <form id="form_tamu" name="form_tamu" method="post">
                            <div class="grid grid-flow-row auto-rows-min xl:grid-cols-2 xl:grid-rows-5 xl:gap-x-6 gap-y-4 px-6">
                                <div class="-order-3 xl:order-none xl:row-span-3"> 
                                    <div id="div_gbr_form" class="overflow-hidden rounded-lg border-2 border-gray-200 h-64 sm:h-80 xl:h-52 flex justify-center items-center">
                                        <i id="icon_gbr_form" class="fa-solid fa-image text-5xl text-gray-200"></i>
                                    </div>
                                    <div class="flex justify-center">
                                        <button type="button" onclick="bukaKamera()" class="bg-amber-400 text-white font-semibold px-5 py-1 my-3 rounded-md hover:bg-amber-500">Ambil Gambar</button>
                                    </div>
                                    <input type="hidden" id="foto" name="foto"></input>
                                    <p class="error hidden italic text-red-600 text-sm"></p>
                                </div>
                                <div>
                                    <label for="no_hp" class="block font-semibold mb-2">Nomor Handphone/Whatsapp</label>
                                    <input type="text" id="no_hp" name="no_hp" placeholder="no handphone" class="border-2 border-gray-200 rounded-md w-full py-1 px-3">
                                    <p class="error hidden italic text-red-600 text-sm"></p>
                                </div>    
                                <div>
                                    <label for="email" class="block font-semibold mb-2">Email</label>
                                    <input type="text" id="email" name="email" placeholder="email@example.com" class="border-2 border-gray-200 rounded-md w-full py-1 px-3">
                                    <p class="error hidden italic text-red-600 text-sm"></p>
                                </div>
                                <div>
                                    <label for="pekerjaan" class="block font-semibold mb-2">Pekerjaan</label>
                                    <select name="pekerjaan" id="pekerjaan" onchange="pekerjaanLain(event)" class="border-2 border-gray-200 rounded-md w-full py-1 px-3">
                                        <option disabled selected value="">pilih pekerjaan</option>
                                        <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                        <option value="Peneliti/Dosen">Peneliti/Dosen</option>
                                        <option value="ASN/PNS/TNI/POLRI">ASN/PNS/TNI/POLRI</option>
                                        <option value="Pegawai BUMN/D">Pegawai BUMN/D</option>
                                        <option value="Umum/Swasta">Umum/Swasta</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                    <div class="hidden" id="div_pekerjaan_lain">
                                        <div class="border-2 border-gray-200 flex flex-row rounded-md">
                                            <input type="text" name="pekerjaan_lain" id="pekerjaan_lain" placeholder="tulis pekerjaan anda" class="w-full py-1 px-3">
                                            <button type="button" onclick="backPekerjaanLain()">
                                                <i class="fa-solid fa-arrow-left text-gray-200 hover:text-slate-800 mx-3"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="error hidden italic text-red-600 text-sm"></p>                                    
                                </div>    
                                <div class="-order-2 xl:order-none">
                                    <label for="nama" class="block font-semibold mb-2">Nama Pengunjung</label>
                                    <input type="text" id="nama" name="nama" placeholder="nama pengunjung" class="border-2 border-gray-200 rounded-md w-full py-1 px-3">
                                    <p class="error hidden italic text-red-600 text-sm"></p>
                                </div>
                                <div class="order-3 xl:order-none">
                                    <label for="keperluan" class="block font-semibold mb-2">Keperluan</label>
                                    <select name="keperluan" id="keperluan" onchange="keperluanLain(event)" class="border-2 border-gray-200 rounded-md w-full py-1 px-3">
                                        <option disabled selected value="">pilih keperluan</option>
                                        <option value="Perpustakaan Tercetak">Perpustakaan Tercetak</option>
                                        <option value="Pembelian Publikasi">Pembelian Publikasi</option>
                                        <option value="Pembelian Data">Pembelian Data</option>
                                        <option value="Akses Produk Statistik (PST Online)">Akses Produk Statistik (PST Online)</option>
                                        <option value="Konsultasi Statistik">Konsultasi Statistik</option>
                                        <option value="Rekomendasi Statistik">Rekomendasi Statistik</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                    <div class="hidden" id="div_keperluan_lain">
                                        <div class="border-2 border-gray-200 flex flex-row rounded-md">
                                            <input type="text" name="keperluan_lain" id="keperluan_lain" placeholder="tulis keperluan anda" class="w-full py-1 px-3">
                                            <button type="button" onclick="backKeperluanLain()">
                                                <i class="fa-solid fa-arrow-left text-gray-200 hover:text-slate-800 mx-3"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="error hidden italic text-red-600 text-sm"></p>
                                </div>    
                                <div class="-order-1 xl:order-none">
                                    <label for="alamat" class="block font-semibold mb-2">Alamat Pengunjung</label>
                                    <input type="text" id="alamat" name="alamat" placeholder="alamat pengunjung" class="border-2 border-gray-200 rounded-md w-full py-1 px-3">
                                    <p class="error hidden italic text-red-600 text-sm"></p>
                                </div>
                                <div>
                                    <label for="instansi" class="block font-semibold mb-2">Instansi</label>
                                    <select name="instansi" id="instansi" onchange="instansiLain(event)" class="border-2 border-gray-200 rounded-md w-full py-1 px-3">
                                        <option disabled selected value="">pilih instansi</option>
                                        <option value="Lembaga Penelitan dan Pendidikan">Lembaga Penelitan dan Pendidikan</option>
                                        <option value="Pemerintah Kota Tasikmalaya">Pemerintah Kota Tasikmalaya</option>
                                        <option value="Pemerintah Kabupaten Kota">Pemerintah Kabupaten Kota</option>
                                        <option value="Pemerintah Provinsi/Pusat">Pemerintah Provinsi/Pusat</option>
                                        <option value="Instansi Vertikal">Instansi Vertikal</option>
                                        <option value="BUMN/BUMD">BUMN/BUMD</option>
                                        <option value="Swasta">Swasta</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                    <div class="hidden" id="div_instansi_lain">
                                        <div class="border-2 border-gray-200 flex flex-row rounded-md">
                                            <input type="text" name="instansi_lain" id="instansi_lain" placeholder="tulis instansi anda" class="w-full py-1 px-3">
                                            <button type="button" onclick="backInstansiLain()">
                                                <i class="fa-solid fa-arrow-left text-gray-200 hover:text-slate-800 mx-3"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="error hidden italic text-red-600 text-sm"></p>
                                </div> 
                            </div>
                            <div class="ml-5">
                                <button type="submit" id="btn_submit" class="bg-green-500 text-white font-semibold px-5 py-1 mt-7 mb-7 rounded-md hover:bg-green-600">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--Akhir Form Pengisian Kunjungan-->
            </div>
        </div>
        <!--Akhir dari Bagian Atas-->

        <!--Bagian Tabel Daftar Pengunjung-->
        <div class="w-full lg:px-5 xl:px-14 xl:mt-10 mb-10 text-slate-800">
            <div class="bg-white rounded-3xl lg:drop-shadow-2xl py-10 px-2 sm:px-7 xl:px-10">
                <div class="flex justify-center xl:justify-start">
                    <h1 class="font-black text-2xl sm:text-4xl font-montserrat mb-8">Daftar Pengunjung</h1>
                </div>
                <div class="hidden" id="div_takada_pengunjung">
                    <div class="flex justify-center">
                        <div class="w-40 h-auto">
                            <img class="object-cover" src="svg/no_visitors.png">
                            <p class="italic text-center">Tidak ada pengunjung</p>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap justify-center" id="container_daftar_pengunjung">
                    <?php include 'tampil.php';?>
                </div>
            </div>
        </div>
        <!--Akhir dari Tabel Daftar Pengunjung-->
    </div>
    <!--Akhir Container Isi-->

    <!--Footer-->
    <div class="bg-local bg-no-repeat bg-bottom bg-auto w-full text-white text-sm flex justify-center pt-20 pb-5" style="background-image: url('./svg/BG Bottom 1 Biggest.svg')">
        <span class="font-base font-semibold ml-2">© 2023 Badan Pusat Statistik Kota Tasikmalaya</span>
    </div>
    <!--Akhir Footer-->

    <!--Script Bagian Atas-->
    <script type="text/javascript" src="./js/tampilan.js"></script>
    <!--Akhir Script Bagian Atas-->
</body>
</html>