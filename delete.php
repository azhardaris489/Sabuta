<?php
    include 'koneksi.php';
    //echo "otw delete data:".$_POST['id'];

    if(isset($_POST['id_data']))
    {
        $query = "DELETE FROM tamu WHERE id = ".$_POST['id_data'];
        if (mysqli_query($koneksi,$query)) {
            echo "Data berhasil dihapus";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
        
        $target=$_POST['img_src'];
        if(file_exists($target)){
            unlink($target);
        }
    
    } else {
        echo "Data yang akan dihapus tidak ditemukan";
    }
?>