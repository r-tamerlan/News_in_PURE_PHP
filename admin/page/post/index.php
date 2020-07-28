<?php
require_once("components/header.php");
require_once ("config/connection.php");
require_once ("manager/post.php");


?>
<!--<script>-->
<!--    $(document).ready(function(e) {-->
<!---->
<!--        $("#sayi").on('change',function(e) {-->
<!---->
<!--            var gelendeger=$("#sayi option:selected").val();-->
<!---->
<!--                window.location.reload();-->
<!--         -->
<!--        });-->
<!--    });-->
<!---->
<!--</script>-->
<div class="row layout-top-spacing">
    <div class="col-lg-12 col-12  layout-spacing">
        <!-- **** -->
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-md-8 col-sm-8 col-8">
                            <h4 class="p-0 m-0">Posts List</h4>
                        </div>


                        <div class="col-xl-4 col-md-4 col-sm-4 col-4 text-right" >
                            <a href="post.php?page=create" type="button" class="btn btn-success small">+Add</a>
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
                            <th class="">Picture</th>
                            <th class="">Title</th>
                            <th class="">Content</th>
                            <th class="">Category</th>
                            <th class="">Show/Hide in Slide</th>
                            <th class="">Post Enable/Disable</th>
                            <th class="">Author</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                     <?php allpost($db); ?>
                        </tbody>
                    </table>
                </div>
                <!-- ***XXX*** -->
                <nav aria-label="Page navigation example" >
                    <ul class="pagination mx-auto" >
                        <?php
                        $sayfa = isset($_GET["hareket"]) ? (int) $_GET["hareket"] : 1;
                        if ($sayfa < 1) $sayfa = 1;
                        if ($sayfa > $GLOBALS["cemiseife"]) $sayfa = $GLOBALS["cemiseife"];
                        echo '<a class="page-link" href="post.php?page=list&hareket='.($sayfa+1).'"> < </a>';
                        for ($i=1; $i<=$GLOBALS["cemiseife"]; $i++) :
                            echo '<li class="page-item">
					<a class="page-link" href="post.php?page=list&hareket='.$i.'">'.$i.'</a>
								  </li>';
                        endfor;
                        echo '<a class="page-link" href="post.php?page=list&hareket='.($sayfa-1).'"> > </a>';
                        ?>
                    </ul>
                </nav>
                <!-- ***XXX*** -->

            </div>
        </div>
        <!-- **** -->
    </div>
</div>
<?php require_once("components/footer.php"); ?>
