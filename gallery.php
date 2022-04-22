<?php
$mysqli = new mysqli("localhost","root","","demo");

// Check connection
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}
$db=$mysqli; // Enter your Connection variable;
$tableName='gallery'; // Enter your table Name;
$fetchImage= fetch_image($tableName);
      // fetching padination data
function fetch_image($tableName){
   global $db;
   $tableName= trim($tableName);
   if(!empty($tableName)){
  $query = "SELECT * FROM ".$tableName." ORDER BY id DESC";
  $result = $db->query($query);
if ($result->num_rows > 0) {
    $row= $result->fetch_all(MYSQLI_ASSOC);
    return $row;       
  }else{
    
    echo "No Image is stored in the database";
  }
}else{
  echo "you must declare table name to fetch Image";
}
}  
?>