<?php 
require '../connection.php';

$conn = connectToDB();

if (isset($_GET["ma_kh"])) {
    $query = "delete from khach_hang where ma_kh='" . $_GET["ma_kh"] . "'";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    
    header("Location: ../bai8.php");
}
?>