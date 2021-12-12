<?php 
    session_start();
    $_SESSION["isLogin"] = false;

    header("Location: ./login.php?logout=true");
?>