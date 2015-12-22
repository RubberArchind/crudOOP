<?php
include "class-database.php";
//include "koneksi.php";
//instansiasi setting propertis database
 
 //$db = new database($host, $user, $pass, $mydb);
 
 //koneksi mysql via method
 //$db->koneksi();
 
 if(isset($_POST['SAVE']))
 {
    $judul     = $_POST['JUDUL'];
	$pengarang = $_POST['PENGARANG'];
	$penerbit  = $_POST['PENERBIT'];
	$thn       = $_POST['TAHUN_TERBIT'];
	
      //insert data buku via method
     $db->addBuku($judul,$pengarang,$penerbit,$thn);
 
 	 
 }
 
 


?>
<form method="post" action="insert.php">
   <input type="text" name="JUDUL" placeholder="Judul"><br>
   <input type="text" name="PENGARANG" placeholder="Pengarang"><br>
   <input type="text" name="PENERBIT" placeholder="Penerbit"><br>
   <input type="text" name="TAHUN_TERBIT" placeholder="Tahun Terbit"><br>
   <input type="submit" name="SAVE" Value="SAVE"><br>
</form>