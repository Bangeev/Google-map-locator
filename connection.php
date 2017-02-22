<?php
require("dbinfo.php");

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Opens a connection to a MySQL server
$link = mysqli_connect("localhost", $username, $password, $database);
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


// Select all the rows in the markers table
$sql = "SELECT * FROM markers";
if($result = mysqli_query($link, $sql)){
if(mysqli_num_rows($result) > 0){

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
 while($row = mysqli_fetch_array($result)){
  // Add to XML document node
  echo '<marker ';
  echo 'name="' . parseToXML($row['name']) . '" ';
  echo 'address="' . parseToXML($row['address']) . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo 'type="' . $row['type'] . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';
    
        mysqli_free_result($result);

    } else{

        echo "No records matching your query were found.";

    }

}
?>
