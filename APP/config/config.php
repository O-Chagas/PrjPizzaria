<?php
// ip:porta, nome do bd, login e senha
$db_host = "localhost";
$db_port = 3306;
$db_name = "jspizzaria_db";
$db_user = "Chagas48";
$db_pwd = "130491";
 
$pdo = new PDO("mysql:host=".$db_host.";port=".$db_port.";dbname=".$db_name, $db_user, $db_pwd);