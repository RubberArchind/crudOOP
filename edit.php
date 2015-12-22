<?php
include "class-database.php";
 
 $db = new database();
 
 //koneksi mysql via method
 $db->koneksi();
 
 
 if(isset($_POST[EDIT]))
 {
	$id        = $_POST[ID]; 
    $judul     = $_POST[JUDUL];
	$pengarang = $_POST[PENGARANG];
	$penerbit  = $_POST[PENERBIT];
	$thn       = $_POST[TAHUN_TERBIT];
	
	$db->updateDataBuku($id,$judul,$pengarang,$penerbit, $thn);
		 


 }
 
  
 //$db->bacaDataBuku($type, $id);
 
 $id = $_GET[ID];
 //echo $id;


?>

<form method="post" action="edit.php">
   <input type="text" name="JUDUL" value="<?php echo $db->bacaDataBuku('judul',$id); ?>"><br>
   <input type="text" name="PENGARANG" value="<?php echo $db->bacaDataBuku('pengarang',$id); ?>"><br>
   <input type="text" name="PENERBIT" value="<?php echo $db->bacaDataBuku('penerbit',$id); ?>"><br>
   <input type="text" name="TAHUN_TERBIT" value="<?php echo $db->bacaDataBuku('tahunTerbit',$id); ?>"><br>
   <input type="hidden" name="ID" value="<?php echo $db->bacaDataBuku('id',$id);?>">
   <input type="submit" name="EDIT" Value="EDIT"><br>
</form>