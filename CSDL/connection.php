<?php 
define("host", "localhost:3307");
define("user", "root");
define("password","");
define("database","ql_ban_sua");

function connectToDB(){
    return new PDO("mysql:host=" . host . ";dbname=" . database, user, password);
}
?>