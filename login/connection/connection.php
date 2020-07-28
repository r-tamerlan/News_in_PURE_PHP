<?php
require_once ("db.php");
try {
    $db=new PDO("mysql:host=".host.";dbname=".dbname.";charset=utf8","".username."","".password."");
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    echo "Connection failed: ".$exception->getMessage();
}

?>