<?php
switch ($_GET['page']) :
    case "list":
        return require "page/post/index.php";
        break;

    case "edit":
        return require "page/post/edit.php";
        break;

    case "create":
        return require "page/post/create.php";
        break;
endswitch;
?>