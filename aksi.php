<?php 
    include 'koneksi.php';
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $pekerjaan = $_POST['pekerjaan'];
    $pekerjaan_lain = $_POST['pekerjaan_lain'];
    if ($pekerjaan == "lainnya") {
        $pekerjaan = $pekerjaan_lain;
    };
    $keperluan = $_POST['keperluan'];
    $keperluan_lain = $_POST['keperluan_lain'];
    if ($keperluan == "lainnya") {
        $keperluan = $keperluan_lain;
    };
    $instansi = $_POST['instansi'];
    $instansi_lain = $_POST['instansi_lain'];
    if ($instansi == "lainnya") {
        $instansi = $instansi_lain;
    };
    $img = $_POST['img'];
    //$data_uri = $_POST['datauri'];

    if (strpos($img, 'data:image/png;base64') === 0) {

        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $img_name = date("YmdHis").'.png';
        $file = 'upload/'.$img_name;
    	$time=date('Y-m-d, H:i:s');
        if (file_put_contents($file, $data)) {
    		$sql="INSERT INTO tamu (tanggal,nama,alamat,no_hp,email,pekerjaan,keperluan,instansi,gambar) VALUES ('$time','$nama','$alamat','$no_hp','$email','$pekerjaan','$keperluan','$instansi','$img_name')";
    		if (mysqli_query($koneksi,$sql)) {
                echo "Data anda berhasil disimpan";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
            }
        } else {
            echo 'Data anda gagal disimpan';
        }   
    }
?>