<?php
include "../koneksi.php";


$id = $_GET['id'];
$status =$_GET['status'];
$query = mysqli_query($koneksi, "UPDATE tb_transaksi SET status='$status'  WHERE id_transaksi='$id'");

echo"<script>window.location.href='../dashboard.php?page=laporan&status=".$status."'</script>";

?>
