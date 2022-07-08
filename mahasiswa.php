| <a href="index.php">home</a> |
<h1>mahasiswa</h1>
<!-- 2. KONEKSI -->
<?php
    $connect=mysqli_connect("localhost","root","","ipmap_2");
?>

<!-- 3. TAMPIL DATA / SELECT-->
<?php
    $query=mysqli_query($connect,"
        select *
        from mahasiswa
    ");
    while($array=mysqli_fetch_array($query)){
        echo"
            <br>
            <br>nama= $array[nama]   
            <br>nim= $array[nim]
            <br>tahun_angkatan= $array[tahun_angkatan]
            <br>semester= $array[semester]
            <br><a href='?nim_hapus=$array[nim]'> hapus </a>
        ";
    }
?>

<!-- 4.a. FORM INSERT / TAMBAH DATA-->
<form action="" method="post">
    <br>nama= <input type="text" name="nama">
    <br>nim= <input type="text" name="nim">
    <br>jurusan= <input type="text" name="jurusan">
    <br>tahun_angkatan= <input type="text" name="tahun_angkatan">
    <br><input type="submit" value="insert" name="insert">
</form>

<!-- 4.b. PROSES INSERT / TAMBAH DATA-->
<?php
    if(isset($_POST['insert'])){
        $query=mysqli_query($connect,"
            insert into mahasiswa
            (nama,nim,jurusan,tahun_angkatan)
            values
            ('$_POST[nama]','$_POST[nim]','$_POST[jurusan]','$_POST[tahun_angkatan]')
        ");
        header("location:mahasiswa.php");
    }
?>

<!-- 5.b. PROSES HAPUS DATA / DELETE -->
<?php
    if(isset($_GET['nim_hapus'])){
        $query=mysqli_query($connect,"
            delete from mahasiswa
            where nim='$_GET[nim_hapus]'
        ");
        header("location:mahasiswa.php");
    }
?>