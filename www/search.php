<?php
require_once ("components/header.php");
require_once ("connection/connection.php");
require_once ("manage/search.php");
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
                            <?php  search($db);   ?>
                            <!-- ****** Post here end ****** -->
                        </div>
                        <!-- Posts End -->
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php require_once ("components/footer.php"); ?>