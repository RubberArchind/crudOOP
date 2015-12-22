<?php
include "class-database.php";
 //instansiasi setting propertis database
 
 $db = new database($host, $user, $pass, $mydb);
 
 //koneksi mysql via method
 $db->koneksi();
 
 //proses hapus data
 if(isset($_GET[ID]))
 {
   $id = $_GET[ID];
   echo "Apakah yakin buku dengan id = ".$id."akan Dihapus?<br>";
   echo "<a href='delete.php?ANS=Y&ID=$id'>Yes</a> | <a href='delete.php?ANS=N'>No</a> ";
   	 
 }
 
 if(isset($_GET[ANS]))
 {
    $ans = $_GET[ANS];
	if($ans == "Y")
	{
	   	$db->hapusBuku($id);
    	echo "<script>window.location='index.php';</script>";
	}
	else if($ans == "N")
	{
	   echo "Data tidak  jadi dihapus";	
	   echo "<script>window.location='index.php';</script>";
	}	 
 }
 

 


?>