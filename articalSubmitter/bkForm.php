<?php 
// $servername = "localhost";
// $username = "";
// $password = "";
// $database = "";
$servername = "cmslamp14.aut.ac.nz";
$username = "ggh9947";
$password = "@Peniamina349";
$database = "ggh9947";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
// check weather the values are submitted byuser or not 
$author = (isset($_POST['author'])) ? $_POST['author'] : '';
$title = (isset($_POST['title'])) ? $_POST['title']: '';
$journal = (isset($_POST['journal'])) ? $_POST['journal']: '';
$year= (isset($_POST['year'])) ? $_POST['year']: '';
$month= (isset($_POST['month'])) ? $_POST['month'] : '';
$volume= (isset($_POST['volume'])) ? $_POST['volume']: '';
$number= (isset($_POST['number'])) ? $_POST['number']: '';
$pages= (isset($_POST['pages'])) ? $_POST['pages']: '';
$annote= (isset($_POST['annote'])) ? $_POST['annote']: '';
$publisher= (isset($_POST['publisher'])) ? $_POST['publisher']: '';
// status weather the paper is excpeted for future use
$status= 'Pending';
// changing timezone from default to NewZealand
date_default_timezone_set('NZ');
$regisTime= date('H:i d:m:Y');
// preparing querry
$stmt = $conn->prepare("INSERT INTO `artical` (`author`, `title`, `journal`, `year`, `month`, `volume`, `number`, `pages`, `annote`, `publisher`, `status`,`registerDate`) VALUES (:author, :title, :journal, :year, :month, :volume, :numberr, :pages, :annote, :publisher, :status, :regisTime)");
// binding parameter for insertion
$stmt->bindParam(':author',$author);
$stmt->bindParam(':title',$title);
$stmt->bindParam(':journal',$journal);
$stmt->bindParam(':year',$year);
$stmt->bindParam(':month',$month);
$stmt->bindParam(':volume',$volume);
$stmt->bindParam(':numberr',$number);
$stmt->bindParam(':pages',$pages);
$stmt->bindParam(':annote',$annote);
$stmt->bindParam(':publisher',$publisher);
$stmt->bindParam(':status',$status);
$stmt->bindParam(':regisTime',$regisTime);
// try catch block to check weather querry executes or not 
try {
	$stmt->execute();
	header("Location:index.php?msg=Application successfully submitted!&errCode=200");
} catch (Exception $e) {
	$errMsg = $e->getMessage();
	header("Location:index.php?msg=$errMsg&errCode=400");
}
?>
