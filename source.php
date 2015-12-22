<?php

include "class-database.php";
include "koneksi.php";
 //instansiasi setting propertis database
 
 $db = new database($host, $user, $pass, $mydb);
 
 //koneksi mysql via method
 $db->koneksi();


$req = "SELECT judul FROM buku WHERE judul LIKE '%".$_REQUEST['term']."%' ";

$query = mysql_query($req);

while($row = mysql_fetch_array($query))
{
	$results[] = array('label' => $row['judul']);
}

echo json_encode($results);
?>