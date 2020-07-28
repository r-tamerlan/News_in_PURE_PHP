<?php
require ("components/header.php");
require ("config/connection.php");
require ("manager/category.php");
?>
    <div class="row layout-top-spacing">
        <div class="col-lg-12 col-12  layout-spacing">
            <!-- **** -->
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 col-md-8 col-sm-8 col-8">
                                <h4 class="p-0 m-0">Categories List</h4>
                            </div>
                            <div class="col-xl-4 col-md-4 col-sm-4 col-4 text-right" >
                                <a href="category.php?page=create" type="button" class="btn btn-success small">+Add</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                            <thead>
                            <tr>

                                <th class="">#id</th>
                                <th class="">Icon</th>
                                <th class="">Name</th>
                                <th class="">Sort by</th>
                                <th class="">Enable/Disable</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php all($db); ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- **** -->
        </div>
    </div>

<?php require_once("components/footer.php"); ?>