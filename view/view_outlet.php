
<body>
  <div class="container d-flex  justify-content-between">
    
      <a class="btn btn-success my-4" href="dashboard.php?page=tambah_outlet">+ Tambah</a>
      
  </div>


<div class="container">
    <table class="table table-striped table-hover text-center">
        <thead >
            <tr>
                <th>No Outlet</th>
                <th class="text-start">Nama Outlet</th>
                <th class="text-start">Alamat</th>
                <th class="text-start">No telepon</th>
               
                <th colspan="2">AKSI</th>
            </tr>
        </thead>
        <tbody >
        <?php
        $no = 1;

        $data = mysqli_query($koneksi, "SELECT * FROM tb_outlet ");  //ASCENDING  DESCENDING
        while($baris = mysqli_fetch_assoc($data)){
            // var_dump($baris);
        ?>
            <tr>
                <td ><?=$no++?></td>
                <td class="text-start" ><?=$baris['nama']?></td>
                <td class="text-start"><?=$baris['alamat']?></td>
                <td class="text-start"><?=$baris['tlp']?></td>
                <td>  <a class="btn btn-warning" href="dashboard.php?page=edit_outlet&id=<?=$baris['id_outlet']?>">Edit</a></td>
                <?php
                $id = $baris['id_outlet'];
               
                $sql_delete = mysqli_fetch_row( mysqli_query($koneksi, "SELECT COUNT(*)  as total FROM tb_outlet INNER JOIN tb_user ON tb_outlet.id_outlet = tb_user.id_outlet WHERE tb_outlet.id_outlet='$id'"));
                $sql_delete2 = mysqli_fetch_row( mysqli_query($koneksi,"SELECT COUNT(*)  as total FROM tb_outlet INNER JOIN tb_paket ON tb_outlet.id_outlet = tb_paket.id_outlet WHERE tb_outlet.id_outlet='$id'"));
                $sql_delete3 = mysqli_fetch_row( mysqli_query($koneksi, "SELECT COUNT(*)  as total FROM tb_outlet INNER JOIN tb_transaksi ON tb_outlet.id_outlet = tb_transaksi.id_outlet WHERE tb_outlet.id_outlet='$id'"));
                if($sql_delete[0]=='0' && $sql_delete2[0]=='0' && $sql_delete3[0]=='0'){
                ?>
                <td>            
                    <a class="btn btn-danger" onclick="return confirm('Apakah ingin menghapus data')" href="./delete/delete_outlet.php?id_outlet=<?=$baris['id_outlet']?>">Delete</a>
                </td>

            </tr>
            <?php }else{
                echo"<td></td>";
            }
            ?>
        <?php      
          }
        ?>
        </tbody>
    </table>
</div>

</table>
<script>

</script>
</body>
