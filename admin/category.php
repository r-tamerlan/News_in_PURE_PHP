<?php
switch ($_GET['page']) :
    case "list":
        return require "page/category/index.php";
        break;

    case "edit":
        return require "page/category/edit.php";
        break;

    case "create":
        return require "page/category/create.php";
        break;

endswitch;
?>