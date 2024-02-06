<?php
    include_once('config.php');
    //hapus kelas
    $id = isset($_GET['id'])?$_GET['id']:"";
    if($id != ""){
        $del = mysqli_query($conn, "delete from tbkelas where idkelas=$id");
        if($del){
            ?>
                <script>
                    alert('hapus berhasil');
                    location.href='?hal=tampilkelas';
                </script>
            <?php 
        }
    }
    $query = mysqli_query($conn, "select * from tbkelas order by nama_kelas asc");

?>
<a href="?hal=tambahkelas">Tambah Data Kelas</a>
<br>
<br>
<table border="1" cellspacing=0 cellpadding=0 width="80%">
    <tr>
        <th>No</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Edit</th>
        <th>Hapus</th>
    </tr>
    <?php
        $no=1;
        while($baris = mysqli_fetch_array($query)){
            ?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=$baris['nama_kelas']?></td>
                    <td><?=$baris['jurusan']?></td>
                    <td>
                        <a href="?hal=editkelas&id=<?=$baris['idkelas']?>">Edit</a>
                    </td>
                    <td>
                        <a href="?hal=tampilkelas&id=<?=$baris['idkelas']?>" oncliks="return confirm('Yakin akan dihapus?');">Hapus</a>
                    </td>
                </tr>
            <?php   
        }
    ?>
</table>