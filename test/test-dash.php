<!doctype html>
<?php
include 'koneksi.php';
session_start();
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
   *,body{    padding:0px;
    margin:0px;
   }
    .nav-link:hover{
        background-color:black;
        
    }
</style>
</head>
  <body>
    <div class="container-fluid" id="content">
        <div class=" row flex-nowrap">
            <div class="  bg-dark col-auto col-md-4 col-lg-3 col-xl-2  min-vh-100 d-flex flex-column  justify-content-between">
                <div class=" sticky-top  bg-dark p-2">
                    <a href="" class="d-flex justify-content-center text-decoration-none  align-items-center">
                        <img class=" pt-4 d-none d-sm-block" src="./img/whit.png" style="width:150px;" alt="">
                    </a>
                <ul class="nav nav-pills flex-column mt-4">
                            <li class="nav-item ">
                                <a href="dashboard.php" class="nav-link text-white   ">
                                    <i class="fa-solid fa-house  "></i>
                                    <span class=" ms-2 d-none d-sm-inline "> Home </span>
                                </a>
                            </li>
                 <!-- Menu Admin -->       
                    <?php
                        if($_SESSION['role']=='admin'){
                    ?>        
                            <li class="nav-item dropdown  ">
                            <a class="nav-link text-white dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-shop"></i>    
                                <span class=" ms-2 d-none d-sm-inline" >Data Master</span>
                            </a>
                            <ul class="dropdown-menu  ">
                                <li><a class="dropdown-item " href="dashboard.php?page=outlet">Outlet</a></li>
                                <li><a class="dropdown-item " href="dashboard.php?page=paket">Paket</a></li>
                            
                                
                            </ul>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link text-white" href="dashboard.php?page=member ">
                                <i class="fa-solid fa-user-group"></i>
                                <span class=" ms-2 d-none d-sm-inline">Registrasi Pelanggan</span> 
                            </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link text-white " href="dashboard.php?page=tambah_transaksi" aria-disabled="true">
                               <i class="fa-solid fa-coins"></i>
                               <span class=" ms-2 d-none d-sm-inline"> Entri Transaksi</span>
                            </a>
                            </li>
                            <li class="nav-item ">
                            <a class="nav-link text-white " href="dashboard.php?page=laporan" aria-disabled="true">
                            <i class="fa-solid fa-clipboard"></i>   
                            <span class="ms-3 d-none d-sm-inline">Laporan</span>
                            </a>
                            </li>  
                 <!--Akhir Menu-->
                 <!-- Menu Kasir -->
                    <?php
                    }elseif(@$_SESSION['role']=='kasir'){
                    ?>   
                            <li class="nav-item">
                                    <a class="nav-link text-white" href="dashboard.php?page=member ">
                                        <i class="fa-solid fa-user-group"></i>
                                        <span class=" ms-2 d-none d-sm-inline">Registrasi Pelanggan</span> 
                                    </a>
                            </li>  
                <!--Akhir Kasir-->
                <!-- Menu Owner -->
                    <?php
                    }else{
                    ?>
                             <li class="nav-item ">
                                    <a class="nav-link text-white " href="dashboard.php?page=laporan" aria-disabled="true">
                                    <i class="fa-solid fa-clipboard"></i>   
                                    <span class="ms-3 d-none d-sm-inline">Laporan</span>
                                    </a>
                            </li>  
                     <?php
                        }
                     ?>
                </ul>
                <!--Akhir owner-->
                 <!--User Sidebar-->
                    <div class="dropdown open d-flex justify-content-center  pb-4 pt-3 border-top text-white  ">
                        <div class="nav-link px-5 py-2 btn btn-link dropdown-toggle  text-decoration-none " id="triggerId"  data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user"></i>
                            <!--nama user-->
                                <span class="m-2 fs-5 text-capitalize">
                                    <?php
                
                                        include 'koneksi.php';
                                        echo $_SESSION['username'];

                                    ?>
                                </span>
                        </div>
                        <div class="dropdown-menu  " aria-labelledby="triggerId">
                            <a class="dropdown-item" href="logout.php">Logout</a>          
                        </div>
                    </div>
                <!--end User Sidebar-->
                </div>
               
            </div>
           
            <!--Content-->
            <div class=" pt-4 px-3 col-md-4 col-xl-10  min-vh-100 ">

               <?php 
               

                $tampil = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT nama FROM tb_outlet WHERE id_outlet=' $_SESSION[id_outlet]' "));
                // var_dump($tampil['nama']);
               ?>
               
                        
                <?php
                //laundry_beni/dashboard.php?page=(nama page)
                switch(@$_GET['page']){
                case "outlet":
                    include_once 'view/view_outlet.php';
                break;
                case "tambah_outlet":
                    include_once 'tambah/tambah_outlet.php';
                break;
                case "edit_outlet":
                    include_once 'edit/edit_outlet.php';
                break;
                case "delete_outlet":
                    include_once 'tambah/delete_outlet.php';
                break;
                //CASE  MEMBER
                case"member";
                include_once 'view/view_member.php';
                break;
                case"edit_member";
                include_once 'edit/edit_member.php';
                break;
                //CASE PAKET
                case"paket";
                include_once 'view/view_paket.php';
                break;
                case"tambah_paket";
                include_once 'tambah/tambah_paket.php';
                break;
                case"edit_paket";
                include_once 'edit/edit_paket.php';
                break;
                //CASE TRANSAKSI
                case"tambah_transaksi";
                include_once 'tambah/tambah_transaksi.php';
                break;
                case"detail_transaksi";
                include_once 'tambah/detail_transaksi.php';
                break;
                //CASE LAPORAN
                case"laporan";
                include_once 'view/view_laporan.php';
                break;
               
                }
               
                ?>
                </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f143f4fbae.js" crossorigin="anonymous"></script>
</body>
</html>