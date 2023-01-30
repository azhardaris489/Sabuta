<?php

    include "koneksi.php";
    $output = "";

    if (isset($_POST["records"])) {
        $records_per_page = (int)$_POST["records"];
    } else {
        $records_per_page = 6;
    };

    if (isset($_POST["page"])) {
        $page = (int)$_POST["page"];
    } else {
        $page = 1;
    };

    $start_from = ($page-1)*$records_per_page;
    $row = $start_from + 1;

    $query = "SELECT * FROM tamu ORDER BY id DESC LIMIT $start_from, $records_per_page";
    $selected_data = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

    while($data = mysqli_fetch_assoc($selected_data)) {
        $output .= '
        <div class="flex basis-1/2 sm:basis-1/3 lg:basis-full sm:px-2 lg:px-4 mt-7">
            <div class="hidden lg:block flex-none lg:w-10 lg:mr-3 xl:mr-8 lg:pb-7">
                <div class="h-full grid grid-cols-1 lg:content-center">
                    <h3 class="font-montserrat font-extrabold text-xl">'.$row.'</h3>
                </div>
            </div>
            <div class="flex-grow px-3 py-2 lg:pb-7 lg:pt-0 lg:mx-0 rounded-md lg:rounded-none border-2 lg:border-t-0 lg:border-l-0 lg:border-r-0 lg:border-b-2 border-gray-200">
                <div class="flex flex-col lg:flex-row">
                    <div class="overflow-hidden rounded-lg border-2 border-gray-200 h-28 w-full lg:w-64 md:h-36 flex justify-center items-center">
                        <img class="object-cover" src="upload/'.$data['gambar'].'" alt="Foto Nama Pengguna">
                    </div>
                    <div class="lg:ml-10">
                        <h2 class="font-semibold text-sm sm:text-base lg:text-xl mb-2 mt-3 lg:mt-0">'.$data['nama'].'</h2>
                        <div class="border-l-2 border-blue-700">
                            <p class="text-xs lg:text-sm px-1.5 py-0.5">'.$data['keperluan'].'</p>
                        </div>
                        <div class="mt-3 hidden lg:block">
                            <div class="flex flex-col lg:flex-row mb-0.5">
                                <div class="lg:w-64">
                                    <i class="fa-solid fa-user-tie text-xs lg:text-base"></i>
                                    <span class="text-xs md:text-sm ml-1 md:ml-2">'.$data['pekerjaan'].'</span>
                                </div>
                                <div class="lg:w-64">
                                    <i class="fa-solid fa-square-phone text-xs lg:text-base"></i>
                                    <span class="text-xs md:text-sm ml-1 md:ml-2">'.$data['no_hp'].'</span>
                                </div>
                            </div>
                            <div class="flex flex-col lg:flex-row mb-0.5">
                                <div class="lg:w-64">
                                    <i class="fa-solid fa-building text-xs lg:text-base"></i>
                                    <span class="text-xs md:text-sm ml-1 md:ml-2">'.$data['instansi'].'</span>
                                </div>
                                <div class="lg:w-64">
                                    <i class="fa-solid fa-envelope text-xs lg:text-base"></i>
                                    <span class="text-xs md:text-sm ml-1 md:ml-2">'.$data['email'].'</span>
                                </div>
                            </div>
                            <div class="lg:w-auto">
                                <i class="fa-solid fa-location-dot text-xs lg:text-base"></i>
                                <span class="text-xs md:text-sm ml-1 md:ml-2">'.$data['alamat'].'</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden lg:block flex-none w-10 ml-2 pb-7">
                <div class="h-full grid grid-cols-1 content-center">
                    <button type="button" class="btn_hapus">
                        <i class="fa-solid fa-trash-can text-xl text-gray-200 hover:text-red-600"></i>
                    </button>
                    <p class="hidden" id="id_data_'.$data['id'].'"></p>
                </div>
            </div>
        </div>
        ';
        $row += 1;
    };

    $output .= '
    <div class="flex justify-center mt-6">
        <ul class="list-none flex flex-row font-medium text-sm">
    ';

    $query = "SELECT * FROM tamu ORDER BY id DESC";
    $total_records = mysqli_num_rows(mysqli_query($koneksi, $query));
    $total_pages = ceil($total_records/$records_per_page);

    if ($page > 1) {
        $pg_link = $page-1;
        $output .= "
            <li class='mx-1 hover:bg-blue-600 px-1.5 py-0.5 border-2 rounded-md border-blue-600 text-blue-600 hover:text-white'><a href='javascript:void(0);' class='page_item' id='1_".$records_per_page."'>First</a></li>
            <li class='mx-1 px-1.5 py-0.5 text-base text-amber-400 hover:text-amber-500'><a href='javascript:void(0);' class='page_item' id='".$pg_link."_".$records_per_page."'><i class='fa-solid fa-angle-left'></i></a></li>
        ";
    };
    $output .= "<li class='mx-4 font-semibold text-base'>".$page."</li>";
    if ($page < $total_pages) {
        $pg_link = $page+1;
        $output .= "
            <li class='mx-1 px-1.5 py-0.5 text-base text-amber-400 hover:text-amber-500'><a href='javascript:void(0);' class='page_item' id='".$pg_link."_".$records_per_page."'><i class='fa-solid fa-angle-right'></i></a></li>
            <li class='mx-1 hover:bg-blue-600 px-1.5 py-0.5 border-2 rounded-md border-blue-600 text-blue-600 hover:text-white'><a href='javascript:void(0);' class='page_item' id='".$total_pages."_".$records_per_page."'>Last</a></li>
        ";
    };

    $output .= '
        </ul>
    </div>
    ';

    echo $output;

?>

<script src="js/tampilan.js"></script>