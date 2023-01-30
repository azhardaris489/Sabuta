<?php 
$koneksi = mysqli_connect("localhost","root","","bps3278_sabuta");
// Check connection
if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>