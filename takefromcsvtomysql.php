<?php 
$con = mysqli_connect("localhost", "bangeev", "bangeev", "wordpressdb") or die(mysql_error());
$filePath = "/var/www/html/test/testtt.csv";
$tableName = "markers";
$fieldDelimiter = ",";
$lineDelimiter = "\n";
mysqli_query($con, '
    LOAD DATA LOCAL INFILE "'.$filePath.'"
    INTO TABLE '.$tableName.'
    FIELDS TERMINATED by \'' . $fieldDelimiter . '\'
    LINES TERMINATED BY \'' . $lineDelimiter . '\'
    IGNORE 1 LINES
') or die(mysql_error());
$query = mysqli_query($con, "SELECT COUNT(*) AS total_rows FROM " . $tableName);
$result = mysqli_fetch_array($query);
$total_rows = $result['total_rows'];
echo $total_rows . " rows have been added to the table " . $tableName;
?>