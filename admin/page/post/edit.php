<?php
require_once("components/header.php");
require_once ("./manager/post.php");
require_once ("./config/connection.php");

?>
    <div class="row layout-top-spacing">
        <div class="col-lg-12 col-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Edit Post</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                <?php editpost($db); ?>
                </div>
            </div>
        </div>
    </div>
<?php require_once("components/footer.php"); ?>