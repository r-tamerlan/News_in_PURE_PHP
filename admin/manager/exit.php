<?php
session_start();

if($_GET["get"]=="exit"):
session_destroy();
@setcookie("key", "x", time() - 10);
endif;

?>