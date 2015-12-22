<?php
include "class-database.php";
//include "koneksi.php";
 $db = new database();
 
 //koneksi mysql via method
 $db->koneksi();
 
?>
<html>
   <head>
      <script src="json/js/jquery-1.9.1.js"></script>
      <script src="json/js/jquery-ui-1.10.3.js"></script>
      <link type="text/css" href="json/css/jquery-ui.css" rel="stylesheet" />
      <script>
  $(function() 
  {

   $( "#tags" ).autocomplete({
   	
   source: 'source.php'
   
   
  });
  });
</script>
   </head>
 <body>
 
 <?php
 
 
 if(isset($_POST['CARI']))
 {

   $kunci = $_POST['KUNCI'];	 
   
   $db2= new searching();
   $db2->cari($kunci);
   
	 
 }
 
 
 
 ?>
 
 
 
<form method="post" action="index.php">

  <div class="ui-widget">
        <input type ='text' name = 'KUNCI' placeholder="Inputkan Nama Disini" id="tags">
       </div><!--end of ui widget--> 
        <input type ='submit' name = 'CARI' value='CARI'>

</form>
 </body>
</html> 
 <?php
 
 $db->tampilBuku();



?>

