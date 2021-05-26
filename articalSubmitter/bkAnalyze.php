<?php 
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
    // getting value for setting status 
    $statuss = (isset($_GET['typ'])) ? $_GET['typ'] : '';
    $artclId = (isset($_GET['artclId'])) ? $_GET['artclId']: '';
    // setting status approved/rejected
    if($statuss == 1){
        $statusss = "approved";
    }else if($statuss == 2){
        $statusss = "rejected";
    }
    // executing query
    $stmt = $conn->prepare("UPDATE `artical` SET `status` = :statuss WHERE `id` = :atrclId");
    $stmt->bindParam(':statuss',$statusss);
    $stmt->bindParam(':atrclId',$artclId); 
    try {
        $stmt->execute();
        if($statuss == 1){
            echo "Application Approved";
        }else if($statuss == 2){
            echo "Application Rejected";
        }
    } catch (Exception $e) {
        $errMsg = $e->getMessage();
        echo $errMsg;
    } 
?>