<?php

class database
{
  // properties	
  private $dbHost = "localhost";
  private $dbUser = "root";
  private $dbPass = "";
  private $dbName = "oop";
  
  	//constructor adalah method atau fungsi yang otomatis dilakukan saat instansiasi dilakukan
	function __construct()
	{
	   $this->dbHost;
	   $this->dbUser;
	   $this->dbPass;
	   $this->dbName;
	   	
	}//end of function
	
	//mthod koneksi mysql
	function koneksi()
	{
	   mysql_connect($this->dbHost, $this->dbUser, $this->dbPass);
	   mysql_select_db($this->dbName);	
	}//end of function
	
	function addBuku($judul, $pengarang, $penerbit, $thnTerbit)
	{
	   $query = "INSERT INTO buku SET judul = '$judul',
	                                   pengarang = '$pengarang',
									    penerbit = '$penerbit',
										tahunTerbit = '$thnTerbit'";
										
		$hasil = mysql_query($query);
		if($hasil)echo "Data Buku sudah disimpan ke DB";
		else echo "Data Buku gagal disimpan ke DB";								
	}//end of function
	
	function tampilBuku()
	{
	   echo "<table border='1' align='center' cellpadding='0.5' cellspacing='0'>";	
	   echo "<tr><th align='center' colspan='5'>CRUD dengan OOP</th></tr>";
	   echo "<tr>
	           <th>Judul</th>
			   <th>Pengarang</th>
			   <th>Penerbit</th>
			   <th>Tahun Terbit</th>
   			   <th>Action</th>
	        </tr>";
			
		$sql = "SELECT * FROM buku";
		$hasil = mysql_query($sql);

        while($data=mysql_fetch_array($hasil))
		{
			echo "<tr>";
			echo "<td>$data[judul]</td>";
			echo "<td>$data[pengarang]</td>";
			echo "<td>$data[penerbit]</td>";
    		echo "<td>$data[tahunTerbit]</td>";
			echo "<td><a href='edit.php?ID=$data[id]'>Edit</a> | <a href='delete.php?ID=$data[id]'>Delete </a></td>";
			echo "</tr>";
			    
		}// end of while	
	  echo "</table>";	
			
	   
		
	}//end of function
	
	
	function hapusBuku($id)
	{
	  $sql = "DELETE FROM buku WHERE id = $id";
	  $hasil = mysql_query($sql);
	  echo "Data buku ID = ".$id."Sudah di hapus";
	  	
	}//end of function
	
	function bacaDataBuku($type, $id)
	{
		$sql = "SELECT * FROM buku WHERE id = '$id'";
		$hasil = mysql_query($sql);
		$data = mysql_fetch_array($hasil);
		
		if($type == "pengarang") return $data[pengarang];
		else if($type == "id") return $data[id];
		else if($type == "judul") return $data[judul];
		else if($type == "penerbit") return $data[penerbit];
		else if($type == "tahunTerbit") return $data[tahunTerbit];
		
	}//end of function
	
	function updateDataBuku($id, $judul, $pengarang, $penerbit, $thnTerbit)
	{
	    $sql = "UPDATE buku SET	judul = '$judul',
		                         pengarang = '$pengarang',
								 penerbit = '$penerbit',
								 tahunTerbit = '$thnTerbit'
								 WHERE id = '$id'";
								 
	    $hasil = mysql_query($sql);
		
		if($hasil)
		{
		 echo "Data buku sudah di Update";
		 echo "<script>window.location='index.php';</script>"; 						 
		}
								 
	}// end of function
	
	
	
	
	
}//end of class

class searching
{
	
   public $cari;
   
   
   function cari($x)
   {
	
	  $sql = "SELECT * FROM buku WHERE judul = '$x'";
	  $hasil = mysql_query($sql);
	  $data = mysql_fetch_array($hasil);
	  
	  
	      echo "<table border='1' align='center' cellpadding='0.5' cellspacing='0'>";	
	   echo "<tr><th align='center' colspan='5'>CRUD dengan OOP</th></tr>";
	   echo "<tr>
	           <th>Judul</th>
			   <th>Pengarang</th>
			   <th>Penerbit</th>
			   <th>Tahun Terbit</th>
   			   <th>Action</th>
	        </tr>";
		
		
			echo "<tr>";
			echo "<td>$data[judul]</td>";
			echo "<td>$data[pengarang]</td>";
			echo "<td>$data[penerbit]</td>";
    		echo "<td>$data[tahunTerbit]</td>";
			echo "<td><a href='edit.php?ID=$data[id]'>Edit</a> | <a href='delete.php?ID=$data[id]'>Delete </a></td>";
			echo "</tr>";
			    

	  echo "</table>";	
	   
   }
   	
	
}//end of class




  


?>