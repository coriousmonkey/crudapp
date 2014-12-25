<?php 
mysql_connect("localhost", "root", "");
mysql_select_db("ajax");

$sql = mysql_query("SELECT * FROM siswa ORDER BY nama ASC");
$result = array();

while($row = mysql_fetch_array($sql)){
      echo '{x: "'.$row['nama'].'", y :'.$row['nilai'].'},';
}

//echo json_encode($result);
?>