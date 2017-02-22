<?php
$username = "bangeev";
$host = "localhost";
$dbname = "wordpressdb";
$pass = "bangeev";


$conn = mysqli_connect($host, $username, $pass, $dbname);
if (!$conn){
die("FAIL" . mysqli_connect_error());
}


$sql = "INSERT INTO `markers` (`name`, `lat`, `lng`) VALUES
('Sofia','42.697708',      '23.321868'),
('StaraZagora','42.425777',      '25.634464'),
('Burgas','42.504793',      '27.462636'),
('Varna','43.214050',      '27.914733')";



if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>