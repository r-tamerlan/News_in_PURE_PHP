<?php
require_once ("components/header.php");
require_once ("connection/connection.php");
require_once ("manage/category.php");

$xid=$_GET["id"];
$xctname=$_GET["ctname"];
?>
    <!-- Main Content -->
    <div id="main-content" class="main-content clearfix" data-sidebar="right">
    <div class="container">
    <div class="row">
    <!-- Daxili -->
    <div class="col-md-8">
        <div class="blog-posts">
            <div class="grid-layout">

                <div class="post-grids">
                    <div class="row">
                        <!-- Posts Start -->
                        <div class="group-post clearfix">
                            <!-- ****** Post here start  ******* -->
                            <?php showselectedcategory($db); ?>
                            <!-- ****** Post here end ****** -->
                        </div>
                        <!-- Posts End -->
                    </div>
                </div>

            </div>
        </div>
        <!-- Pagination -->
        <div class="pagination-wrap clearfix" style="text-align: center;">
            <?php
            $sayfa = isset($_GET["hareket"]) ? (int) $_GET["hareket"] : 1;
            if ($sayfa < 1) $sayfa = 1;
            if ($sayfa > $GLOBALS["cemiseife"]) $sayfa = $GLOBALS["cemiseife"];
            echo '<a class="older-posts" href="categories.php?id=' . $xid . '&ctname=' . $xctname . '&hareket='.($sayfa-1).'">İrəli</a>';
            for ($i=1; $i<=$GLOBALS["cemiseife"]; $i++) :
                echo '    <a href="categories.php?id=' . $xid . '&ctname=' . $xctname . '&hareket='.$i.'">'.$i.'</a>    ';
            endfor;
            echo '<a class="newer-posts" href="categories.php?id=' . $xid . '&ctname=' . $xctname . '&hareket='.($sayfa+1).'">Geri</a>';
            ?>

        </div>
        <!-- End Pagination -->
    </div>

<?php require_once ("components/footer.php"); ?>